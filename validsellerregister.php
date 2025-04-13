<?php
     
     require_once('db_connect.php');
     $con = get_db_connection();

     $fn=$_POST["fname"];
     $ln=$_POST["lname"];
     $un=$_POST["username"];
     $email=$_POST["email"];
     $phone=$_POST["phone"];
     $shop=$_POST["shopname"];
     $shopno=$_POST["food"];
     $street=$_POST["street"];
     $city=$_POST["city"];
     $state=$_POST["state"];
     $country=$_POST["country"];
     $pin=$_POST["pin"];
     $pass=$_POST["password"];
     

     

       $hashed_password = password_hash($pass, PASSWORD_DEFAULT);
       $r=mysqli_query($con,"insert into seller(sfname,slname,susername,semail,sphone,sshopname,sshopcategory,sstreet,scity,sstate,scountry,spincode,spassword) values('$fn','$ln','$un','$email','$phone','$shop','$shopno','$street','$city','$state','$country','$pin','$hashed_password') ");
       if($r)
       header("location:sellerlogin.php?register=true");
   
    


   ?>