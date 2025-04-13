<?php
require_once('db_connect.php');
$con = get_db_connection();

// Get all sellers with plaintext passwords
$result = mysqli_query($con, "SELECT sellerid, spassword FROM seller WHERE spassword NOT LIKE '$2y$%'");

while ($row = mysqli_fetch_assoc($result)) {
    $hashed_password = password_hash($row['spassword'], PASSWORD_DEFAULT);
    mysqli_query($con, "UPDATE seller SET spassword = '$hashed_password' WHERE sellerid = {$row['sellerid']}");
}

echo "Password migration completed successfully!";
?>
