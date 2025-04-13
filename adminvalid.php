<?php
    session_start();
    require_once 'db_connect.php';
    $con = get_db_connection();

    // Get sanitized inputs
    $un = mysqli_real_escape_string($con, $_POST["username"]);
    $pp = $_POST["password"];

    // Query with prepared statement (using correct column names)
    $stmt = mysqli_prepare($con, "SELECT password FROM admin WHERE adminid = ? OR email = ? LIMIT 1");
    mysqli_stmt_bind_param($stmt, "ss", $un, $un);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($result)) {
        if($pp === $row['password']) {
            $_SESSION["alog"] = "yes";
            header("location:Admin.php");
            exit();
        }
    }
    
    // Login failed
    header("Location:adminlogin.php?invalid_login=true");
    exit();

?>