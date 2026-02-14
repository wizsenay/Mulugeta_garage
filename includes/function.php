<?php

require_once 'config/database.php';

function get_section($file, $section_name) {
    
    if (!file_exists($file)) {
        return "<!-- Error: File '$file' not found -->";
    }

    $content = file_get_contents($file);
    if ($content === false) {
        return "<!-- Error: Could not read file '$file' -->";
    }

    // Escape special regex characters in section name
    $escaped_section = preg_quote($section_name, '/');

    $pattern = '/<!-- START ' . $escaped_section . ' -->(.*?)<!-- END ' . $escaped_section . ' -->/s';
    
    // Match the pattern
    if (preg_match($pattern, $content, $matches)) {
        return trim($matches[1]);
    } else {
        // Debug: Show what we're looking for
        $debug_content = htmlspecialchars(substr($content, 0, 500));
        return "<!-- Section '$section_name' not found in '$file'. First 500 chars: $debug_content -->";
    } 
}

function getAllData($tableName, $orderBy = '', $limit = null, $offset = null) {
    // Validate table name to prevent SQL injection
    if (!preg_match('/^[a-zA-Z0-9_]+$/', $tableName)) {
        return [
            'success' => false,
            'message' => 'Invalid table name'
        ];
    }
    

    $database = new Database();
    $conn = $database->getConnection();
    
    // Build the query
    $sql = "SELECT * FROM `$tableName`";
    
    // Add ORDER BY clause if provided
    if (!empty($orderBy)) {
        // Simple validation for orderBy to prevent SQL injection
        if (preg_match('/^[a-zA-Z0-9_,\s]+$/', $orderBy)) {
            $sql .= " ORDER BY $orderBy";
        }
    }

    if ($limit !== null && is_numeric($limit)) {
        $sql .= " LIMIT " . (int)$limit;
        
        if ($offset !== null && is_numeric($offset)) {
            $sql .= " OFFSET " . (int)$offset;
        }
    }
    
    $result = $conn->query($sql);
    
    if ($result === false) {
        // Log error and return failure
        error_log("Query Error: " . $conn->error . " | SQL: " . $sql);
        return [
            'success' => false,
            'message' => 'Failed to fetch data',
            'error' => $conn->error
        ];
    }
    
    $data = [];
    
    if ($result->num_rows > 0) {
        // Fetch associative array
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        
        $result->free();
        
        return [
            'success' => true,
            'data' => $data,
            'count' => count($data)
        ];
    } else {
        return [
            'success' => true,
            'data' => [],
            'count' => 0,
            'message' => 'No records found'
        ];
    }
    
}


function getDataWithConditions($tableName, $conditions = [], $orderBy = '', $limit = null, $offset = null) {
    // Validate table name
    if (!preg_match('/^[a-zA-Z0-9_]+$/', $tableName)) {
        return [
            'success' => false,
            'message' => 'Invalid table name'
        ];
    }
    
    // Create database connection
    $database = new Database();
    $conn = $database->getConnection();
    
    // Prepare base query
    $sql = "SELECT * FROM `$tableName`";
    $params = [];
    $types = '';
    
    // Add WHERE clause if conditions exist
    if (!empty($conditions)) {
        $whereClauses = [];
        foreach ($conditions as $column => $value) {
            // Validate column name
            if (preg_match('/^[a-zA-Z0-9_]+$/', $column)) {
                $whereClauses[] = "`$column` = ?";
                $params[] = $value;
                $types .= 's'; // Default to string type
            }
        }
        
        if (!empty($whereClauses)) {
            $sql .= " WHERE " . implode(" AND ", $whereClauses);
        }
    }
    
    // Add ORDER BY
    if (!empty($orderBy) && preg_match('/^[a-zA-Z0-9_,\s]+$/', $orderBy)) {
        $sql .= " ORDER BY $orderBy";
    }
    
    // Add LIMIT and OFFSET
    if ($limit !== null && is_numeric($limit)) {
        $sql .= " LIMIT ?";
        $params[] = (int)$limit;
        $types .= 'i';
        
        if ($offset !== null && is_numeric($offset)) {
            $sql .= " OFFSET ?";
            $params[] = (int)$offset;
            $types .= 'i';
        }
    }
    
    // Prepare and execute with parameters (prevent SQL injection)
    $stmt = $conn->prepare($sql);
    
    if ($stmt === false) {
        error_log("Prepare Error: " . $conn->error);
        return [
            'success' => false,
            'message' => 'Failed to prepare query'
        ];
    }
    
    // Bind parameters if any
    if (!empty($params)) {
        $stmt->bind_param($types, ...$params);
    }
    
    // Execute query
    $executed = $stmt->execute();
    
    if ($executed === false) {
        error_log("Execute Error: " . $stmt->error);
        return [
            'success' => false,
            'message' => 'Failed to execute query'
        ];
    }
    
    // Get result
    $result = $stmt->get_result();
    $data = [];
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }
    
    $stmt->close();
    
    return [
        'success' => true,
        'data' => $data,
        'count' => count($data)
    ];
}


function getSpecificColumns($tableName, $columns = [], $conditions = []) {
    // Validate inputs
    if (!preg_match('/^[a-zA-Z0-9_]+$/', $tableName)) {
        return ['success' => false, 'message' => 'Invalid table name'];
    }
    
    if (empty($columns)) {
        $columns = ['*'];
    }
    
    // Validate column names
    $validColumns = [];
    foreach ($columns as $column) {
        if ($column === '*' || preg_match('/^[a-zA-Z0-9_]+$/', $column)) {
            $validColumns[] = "`$column`";
        }
    }
    
    if (empty($validColumns)) {
        return ['success' => false, 'message' => 'No valid columns specified'];
    }
    
    // Create database connection
    $database = new Database();
    $conn = $database->getConnection();
    
    // Prepare query
    $columnList = implode(', ', $validColumns);
    $sql = "SELECT $columnList FROM `$tableName`";
    
    // Add WHERE clause if needed
    $params = [];
    $types = '';
    
    if (!empty($conditions)) {
        $whereClauses = [];
        foreach ($conditions as $column => $value) {
            if (preg_match('/^[a-zA-Z0-9_]+$/', $column)) {
                $whereClauses[] = "`$column` = ?";
                $params[] = $value;
                $types .= 's';
            }
        }
        
        if (!empty($whereClauses)) {
            $sql .= " WHERE " . implode(" AND ", $whereClauses);
        }
    }
    
    // Execute query
    $stmt = $conn->prepare($sql);
    
    if ($stmt === false) {
        return ['success' => false, 'message' => 'Failed to prepare query'];
    }
    
    if (!empty($params)) {
        $stmt->bind_param($types, ...$params);
    }
    
    if (!$stmt->execute()) {
        return ['success' => false, 'message' => 'Failed to execute query'];
    }
    
    $result = $stmt->get_result();
    $data = [];
    
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    
    $stmt->close();
    
    return [
        'success' => true,
        'data' => $data,
        'count' => count($data)
    ];
}

?>