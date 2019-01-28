<?php include 'db.php';?>

<?php session_start();?>


<?php
    
        if(isset($_POST['login'])){
            
             
            
          $username = $_POST['username'];
          $password = $_POST['user_password'];
            
          $username = mysqli_real_escape_string($connection, $username);
          $password = mysqli_real_escape_string($connection, $password);
            
          $sql = "SELECT * FROM `users` WHERE `username` = '$username'";
          $select_query = mysqli_query($connection, $sql);
            
            if(!$select_query){
                
                die("Query failed ". mysqli_error($connection));
                    
            }
            
            while($row = mysqli_fetch_assoc($select_query)){
                
                $db_userid = $row['user_id'];
                $db_username = $row['username'];
                $db_password = $row['user_password'];
                $db_firstname = $row['user_firstname'];
                $db_lastname = $row['user_lastname'];
                $db_role = $row['user_role'];
               
            }
            
            
            //$password = crypt($password,$db_password);
            
           if(password_verify($password,$db_password)){
               
               $_SESSION['username'] = $db_username;
               $_SESSION['user_role'] = $db_role;
               $_SESSION['firstname'] = $db_firstname;
               $_SESSION['lastname'] = $db_lastname;
               
               
               header('location: ../admin');
               
           }else{
               
               header('location: ../index.php');
               
            }
                
             
            
        }
        
?>




