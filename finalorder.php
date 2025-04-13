<?php
session_start();
            $total= $_SESSION["total"];
            $unm=$_SESSION["unm"];
            $dt=$_POST["dt"];


              require_once 'db_connect.php';
              $con = get_db_connection();
              $rr=mysqli_query($con,"insert into orders(orderdate,amount,username) values('$dt','$total','$unm')");

              if($rr)
              {
                unset($_SESSION["shopping_cart"]);
                header("location:grocery.php"); 
                
             }
?>



            