
    <?php
     
     session_start();

      $con=mysqli_connect("localhost","root","","vendorsnearyou");

      $fn=$_SESSION['fname']; 
      $ln=$_SESSION['lname']; 
      $email=$_SESSION['email']; 
      $phone=$_SESSION['phone']; 
      $pass=$_SESSION['password']; 
      
     $r=mysqli_query($con,"insert into customerregister(firstname,lastname,email,phonenumber,password)values('$fn','$ln','$email','$phone','$pass') ");
         if($r)
            header("Location:loginform.php?register=true");

     unset($_SESSION['fname']);
     unset($_SESSion['lname']);
     unset($_SESSION['email']);
     unset($_SESSion['phone']);
     unset($_SESSION['password']);       
       
    ?>

