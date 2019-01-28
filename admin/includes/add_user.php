<?php
    if(isset($_POST['create_user'])){
        
        $username = trim($_POST['username']);
        $user_firsname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $user_email = $_POST['user_email'];
        $user_password = trim($_POST['user_password']);
        $user_role = $_POST['user_role'];
        
        $user_image = $_FILES['user_image']['name'];
        $user_image_temp = $_FILES['user_image']['tmp_name'];
        
        move_uploaded_file($user_image_temp,"../images/$user_image");
        
        
              
        $hashed_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 10));    
            
        
        $sql = "INSERT INTO `users` (`username`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`, `user_password`) VALUES ('$username', '$user_firsname', '$user_lastname', '$user_email', '$user_image ', '$user_role', '$hashed_password')";
        
       $result = mysqli_query($connection,$sql);
        
        if(!$result){
            die("query failed".mysqli_error($connection));
        }
        
        else {  
            ?>
            
         <div class="alert alert-success text-center">
            <strong>User added successfully.</strong>
         </div>
         
          <?php  
          }
    }

?>
   

   
   
   <form action="" method="post" enctype="multipart/form-data">
    
    <div class="form-group">
        <label for="">User Name</label>
        <input type="text" class="form-control" name="username" required>
    </div>
    
    
    
    <div class="form-group">
        <label for="">First Name</label>
        <input type="text" class="form-control" name="user_firstname" required>
    </div>
    
    <div class="form-group">
        <label for="">Last Name</label>
        <input type="text" class="form-control" name="user_lastname" required>
    </div>
    
    <div class="form-group">
        <label for="">Email</label>
        <input type="email" class="form-control" name="user_email" required>
    </div>
    
    <div class="form-group">
        <label for="">Password</label>
        <input type="password" class="form-control" name="user_password" required>
    </div>
    
     <div class="form-group">
        <label for="">Upload Image</label>
        <input type="file" name="user_image" class="form-control-file">
    </div>
    
    <div class="form-group">
        <label for="">User Role</label>
            <select name="user_role" id="" class="form-control" required>
                <option value="subscriber">Subscriber</option>
                <option value="admin">Admin</option>
            </select>
    </div>
    
    
    
    <div class="form-group">
        <input type="submit" class=" btn btn-primary" name="create_user" value="Create User">
    </div>
    
</form>