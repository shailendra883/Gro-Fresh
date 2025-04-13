<?php
function get_db_connection() {
    static $connection = null;
    
    if ($connection === null) {
        // Try container hostname first, then fallback to localhost
        $hosts = ['db', 'localhost'];
        $user = getenv('DB_USER') ?: 'app_user';
        $pass = getenv('DB_PASSWORD') ?: 'securepassword123';
        $name = getenv('DB_NAME') ?: 'vendorsnearyou';
        
        $last_error = null;
        
        foreach ($hosts as $host) {
            try {
                $connection = mysqli_connect($host, $user, $pass, $name);
                if ($connection) break;
            } catch (Exception $e) {
                $last_error = $e;
                continue;
            }
        }
        
        if (!$connection) {
            error_log("Failed to connect to database: " . ($last_error ? $last_error->getMessage() : 'Unknown error'));
            throw new RuntimeException("Database connection failed");
        }
        
        // Set charset to utf8
        mysqli_set_charset($connection, 'utf8mb4');
    }
    
    return $connection;
}
