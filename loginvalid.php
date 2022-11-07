<?php
    session_start();
      $con=mysqli_connect("localhost","root","","vendorsnearyou");

      $un=$_POST["username"];
      $pp=$_POST["password"];

      $r=mysqli_query($con,"select * from customerregister");

      while($row=mysqli_fetch_array($r))
      {
        if($row[3]==$un)
        {
            if($row[5]==$pp)
            { 
                $_SESSION["clog"]="yes";
                $_SESSION["un"]=$un;
                header("location:index.php");
            }
            else{
              header("location:loginform.php?invalid_login=true");

            }
        }
        else
        {
          header("location:loginform.php?invalid_login=true");
        }
      }

      
?>