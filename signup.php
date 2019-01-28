<?php  include "includes/db.php"; ?>
<?php  include "includes/header.php"; ?>


    <!-- Navigation -->
    
    <?php  include "includes/navigation.php"; ?>
    
    <!-- Page Content -->
    <div class="container">
    
    
    <?php 
        
        if(isset($_POST['submit'])){
            //echo strlen('iusesomecrazystrings22');
            
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            
            if(!empty($username) && !empty($email) && !empty($password)){
            
            $username = mysqli_real_escape_string($connection, $username);
            $email = mysqli_real_escape_string($connection, $email);
            $password = mysqli_real_escape_string($connection, $password);
                
            $password = password_hash($password, PASSWORD_BCRYPT, array('cost'=>10));  
                
                
        //checking user existence 
                
        $sql = "SELECT * FROM users WHERE username='$username' OR user_email='$email' ";
        $result = mysqli_query($connection,$sql);
        
        if(!$result){
            
            die('Query failed'.mysqli_error($connection));
        }        
        
        $count_user = mysqli_num_rows($result);
        
        if($count_user>0){
            
            $message ="<div class='alert alert-danger text-center'>
                          <strong>username or email name exists. Try with differnt name</strong> 
                        </div>";
        }  
        else{        
      
        $sql = "INSERT INTO `users` (`username`,`user_email`,`user_password`) VALUES ('$username', '$email', '$password');";
            
          $register_user_query = mysqli_query($connection,$sql);
     
               if(!$register_user_query){
                   
                   die("Query failed". mysqli_error($connection).' '.mysqli_errno($connection));
               }
               else
               {
                   
                   $message = "<div class='alert alert-success text-center'>
                          <strong>Congrat! Now you're resgistered user.</strong> 
                        </div>";
            
               }
            }//user exit else close
               
                }//empty checking if close
            else{
                
                $message = "<div class='alert alert-danger text-center'>
                          <strong>Field can't be empty</strong> 
                        </div>";
                
                }
        
            
           
            
            }//isset div or main if bracket close
            
        else
            {
        
                $message = "";
            }
        ?>
        
        
        

    
    
    
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1 class="text-center">Register</h1>
                      
                       
                    <form role="form" action="" method="post" id="login-form" autocomplete="off">
                        
                     <?php echo $message;?>  
                    <div class="form-group"> 
                        <div class="input-group">
                         <label for="username" class="sr-only">username</label>
                          <span class="input-group-addon"><i class="fa fa-user"></i></span>
                              <input type="text" class="form-control" placeholder="Enter Desired Username" name="username" id="username" >
                        </div>
                    </div>
                       
                      <div class="form-group"> 
                            <div class="input-group">
                             <label for="email" class="sr-only">email</label>
                              <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                  <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com" >
                            </div>
                       </div>
                       
                       <div class="form-group"> 
                            <div class="input-group">
                             <label for="password" class="sr-only">password</label>
                              <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                  <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                            </div>
                       </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-primary btn-lg btn-block" value="Register">
                        
                        

                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
