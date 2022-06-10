<?php
     
     $con=mysqli_connect("localhost","root","","vendorsnearyou");

     $pn=$_POST["pname"];
     $pc=$_POST["food"];
     $desc=$_POST["desc"];
     $price=$_POST["price"];
     move_uploaded_file($_FILES["pimg"]["tmp_name"],"../seller/img/".$_FILES["pimg"]["name"]);
      $pic=$_FILES["pimg"]["name"];
     

     

       $r=mysqli_query($con,"insert into products(p_name,pcategory,p_desc,price,image) values('$pn','$pc','$desc','$price','$pic') ");
       if($r)
       header("location:addproduct.php");
   
    


   ?>