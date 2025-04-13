<?php
    session_start();
      require_once('db_connect.php');
      $con = get_db_connection();
      if (!$con) {
          die("Connection failed: " . mysqli_connect_error());
      }
      // Get sanitized inputs
      $un = mysqli_real_escape_string($con, $_POST["username"]);
      $pp = $_POST["password"]; // Password will be verified using password_verify()
      
      // Query with prepared statement
      $stmt = mysqli_prepare($con, "SELECT password FROM customerregister WHERE email = ? LIMIT 1");
      mysqli_stmt_bind_param($stmt, "s", $un);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      
    if($row = mysqli_fetch_assoc($result)) {
        if($pp === $row['password']) {
            $_SESSION["clog"] = "yes";
            $_SESSION["un"] = $un;
            header("location:index.php");
            exit();
        }
    }
      
      // Login failed
      header("location:loginform.php?invalid_login=true");
      exit();

?>