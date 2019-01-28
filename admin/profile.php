<?php include 'includes/header.php';?>
  
  
<!--  updating user data query-->
 <?php
        
    if(isset($_POST['update_user'])){
            $user_id = $_POST['user_id'];
            $username = $_POST['username'];
            $user_firstname = $_POST['user_firstname'];
            $user_lastname = $_POST['user_lastname'];
            $user_email = $_POST['user_email'];
            $user_role = $_POST['user_role'];
            $user_password = $_POST['user_password'];
          
          $user_image = $_FILES['user_image']['name'];
          $user_image_temp = $_FILES['user_image']['tmp_name'];
        
        move_uploaded_file($user_image_temp,"../images/$user_image");
            
            
    //checking uploaded images is emptly or not
            
            if(empty($user_image)){
                
                $sql = "SELECT * FROM `users` WHERE 'username` = '$username'";
                $select_image = mysqli_query($connection, $sql);
                
                 while($row = mysqli_fetch_array($select_image)){
                    
                     $user_image = $row['user_image'];
                 }
            }
         //update query   
            
        $sql = "UPDATE `users` SET `username`='$username',`user_firstname`='$user_firstname',`user_lastname`='$user_lastname',`user_email`='$user_email',`user_image`='$user_image',`user_role`='$user_role ',`user_password`=$user_password,`randSalt`= 0 WHERE `users`.`user_id` = $user_id";
         
         $update_result = mysqli_query($connection, $sql);
            
      //cheking for error function    
            
        if(!$update_result){
            
            die("query failed".mysqli_error($connection));
        }    
        else {  
            ?>
            
         <div class="alert alert-success text-center">
            <strong>Data successfully updated.</strong>
         </div>
         
          <?php  
          }
    }

 ?>
  
   
  <?php


//feteching user data from profile button
            
    if(isset($_SESSION['username'])){

        $username = $_SESSION['username'];
        
        $sql = "SELECT * FROM `users` WHERE `username` = '$username'";
        
        $select_profile_query = mysqli_query($connection, $sql);
        
        while($row = mysqli_fetch_assoc($select_profile_query)){
            
            $user_id = $row['user_id'];
            $username = $row['username'];
            $user_firstname = $row['user_firstname'];
            $user_lastname = $row['user_lastname'];
            $user_email = $row['user_email'];
            $user_image = $row['user_image'];
            $user_role = $row['user_role'];
            $user_password = $row['user_password'];
            
            
        }
    }


        ?>  
          
              
   
   
    

    <div id="wrapper">

        <!-- Navigation -->
       
<?php include 'includes/navigation.php';?>
       
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
               <h1>Welcome To Admin
                   <small>Author</small>
               </h1> 
               <hr>
                <!-- /.row -->
           
                
    <form action="" method="post" enctype="multipart/form-data">
    
        <div class="form-group">
            <label for="">User Name</label>
            <input type="text" class="form-control" name="username" value="<?php echo $username;?> " required>
        </div>



        <div class="form-group">
            <label for="">First Name</label>
            <input type="text" class="form-control" name="user_firstname" value="<?php echo $user_firstname;?> " required>
        </div>

        <div class="form-group">
            <label for="">Last Name</label>
            <input type="text" class="form-control" name="user_lastname" value="<?php echo $user_lastname;?> "  required>
        </div>

        <div class="form-group">
            <label for="">Email</label>
            <input type="email" class="form-control" name="user_email" value="<?php echo $user_email;?>" required>
        </div>

        <div class="form-group">
            <label for="">Password</label>
            <input type="password" class="form-control" name="user_password" value="<?php echo $user_password;?>" required>
        </div>

         <div class="form-group">
            <label for="">Upload Image</label>
            <input type="file" name="user_image" class="form-control-file">
            
            <br>
           <!-- Trigger the modal with a button -->

            <a data-toggle="modal" data-target="#myModal">
                <img src="../images/<?php echo $user_image;?>" alt="..." title="view image" class="img-rounded" width="150px">
            </a>
            
        </div>

        <div class="form-group">
            <label for="">User Role</label>
                <select name="user_role" id="" class="form-control" required>
                    <option value="subscriber">Subscriber</option>
                    <option value="admin">Admin</option>
                </select>
        </div>



        <div class="form-group">
            <input type="hidden"  value="<?php echo $user_id;?>" name="user_id">
            <input type="submit" class=" btn btn-primary" name="update_user" value="Update User">
        </div>

    </form>

                 
            </div> 
            
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

 
    <!-- /#wrapper -->
<?php include 'includes/footer.php';?>

 </div> 