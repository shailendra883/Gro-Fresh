
    <?php
     
     session_start();

      require_once('db_connect.php');
      $con = get_db_connection();

      $fn=$_SESSION['fname']; 
      $ln=$_SESSION['lname']; 
      $email=$_SESSION['email']; 
      $phone=$_SESSION['phone']; 
      $pass=$_SESSION['password']; 
      
     $hashed_password = password_hash($pass, PASSWORD_DEFAULT);
     $r=mysqli_query($con,"insert into customerregister(firstname,lastname,email,phonenumber,password)values('$fn','$ln','$email','$phone','$hashed_password') ");
         if($r)
            header("Location:loginform.php?register=true");

     unset($_SESSION['fname']);
     unset($_SESSion['lname']);
     unset($_SESSION['email']);
     unset($_SESSion['phone']);
     unset($_SESSION['password']);       
       
    ?>

