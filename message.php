<?php
    session_start();
      require_once('db_connect.php');
      $con = get_db_connection();

      
      $nm=$_POST["name"];
      $em=$_POST["email"];
      $sb=$_POST["subject"];
      $msg=$_POST["message"];


      $r=mysqli_query($con,"insert into contact(name,email,subject,message) values('$nm','$em','$sb','$msg')");
      if($r)
      {
        ?>
              <script>
                  
                  alert("Your Message has been posted succesfully!!");
                </script>
        
    <?php
     header("location:contact.php");
      }
        
        else
        {
            ?>
              <script>
                  
                  alert("Your message is not sent. Please retry again!!");
                </script>
        
    <?php
          header("location:contact.php");
        }
      
?>