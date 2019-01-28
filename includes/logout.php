<?php include 'db.php';?>

<?php session_start();?>


<?php
    
        
               $_SESSION['username'] = null;
               $_SESSION['user_role'] = null;
               $_SESSION['firstname'] = null;
               $_SESSION['lastname'] = null;
               
               
           header('location: ../index.php'); 
          
?>




