<?php
    session_start();
    require_once('db_connect.php');
    $con = get_db_connection();

    // Get sanitized inputs
    $un = mysqli_real_escape_string($con, $_POST["username"]);
    $pp = $_POST["password"];

    // Query with prepared statement
    $stmt = mysqli_prepare($con, "SELECT spassword FROM seller WHERE susername = ? OR semail = ? LIMIT 1");
    mysqli_stmt_bind_param($stmt, "ss", $un, $un);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($result)) {
        if(password_verify($pp, $row['spassword'])) {
            $_SESSION["log"] = "yes";
            $_SESSION["sellerusername"] = $un;
            header("location:seller/sellerhome.php");
            exit();
        }
    }
    
    // Login failed
    header("location:sellerlogin.php?invalid_login=true");
    exit();

?>