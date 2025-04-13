<?php
require_once('db_connect.php');
try {
    $con = get_db_connection();
    if ($con) {
        echo "Database connection successful!\n";
        
        // Test query
        $result = mysqli_query($con, "SELECT 1 FROM seller LIMIT 1");
        if ($result) {
            echo "Seller table access successful!\n";
        } else {
            echo "Seller table access failed: " . mysqli_error($con) . "\n";
        }
    } else {
        echo "Database connection failed\n";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
?>
