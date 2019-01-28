
   <?php
    //updating and inserting data into datbase.
        
        if(isset($_POST['Edit_user'])){
            
            
            $user_id = $_GET['edit_id'];
            $username = trim($_POST['username']);
            $user_firstname = trim($_POST['user_firstname']);
            $user_lastname = trim($_POST['user_lastname']);
            $user_email = trim($_POST['user_email']);
            $user_role = trim($_POST['user_role']);
            $user_password = $_POST['user_password'];
          
          $user_image = $_FILES['user_image']['name'];
          $user_image_temp = $_FILES['user_image']['tmp_name'];
        
        move_uploaded_file($user_image_temp,"../images/$user_image");
            
            
    //checking uploaded images is emptly or not
            
            if(empty($user_image)){
                
                $sql = "SELECT * FROM `users` WHERE `user_id` = $user_id";
                $select_image = mysqli_query($connection, $sql);
                
                 while($row = mysqli_fetch_array($select_image)){
                    
                     $user_image = $row['user_image'];
                     
                     
                 }
            }
            
        if(!empty($user_password)){
            
            $query_password = "SELECT `user_password` FROM `users` WHERE `user_id` = $user_id";
            $get_user_query = mysqli_query($connection,$query_password);
            
            if(!$get_user_query){
                
                die("Query Failed". mysqli_error($connection));
            }
            
            $row = mysqli_fetch_array($get_user_query);
            $db_user_password = $row['user_password'];
            
            //encrypting password   
            if($db_user_password !== $user_password){
             
             $hashed_password = password_hash($user_password,PASSWORD_BCRYPT,array('cost'=>10));
              
            } 
            else{
                
             $hashed_password = $db_user_password;
            }  
         } 
            
            
         //update query   
            
        $sql = "UPDATE `users` SET `username`='$username',`user_firstname`='$user_firstname',`user_lastname`='$user_lastname',`user_email`='$user_email',`user_image`='$user_image',`user_role`='$user_role',`user_password`='$hashed_password' WHERE `users`.`user_id` = $user_id";
         
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
     //getting and displaying information from database.

    if(isset($_GET['edit_id'])){
        
      $edit_id = $_GET['edit_id'];

    $sql= "SELECT * FROM `users` WHERE `user_id`= $edit_id";
    
    $get_edit_id = mysqli_query($connection, $sql);
    
    while($row = mysqli_fetch_assoc($get_edit_id)){
            
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
    else{
            
            header('location: index.php');
        }    

?>
   

   
   
   
   
   
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
                    <option value="<?php echo $user_role;?>"><?php echo ucfirst($user_role);?></option>
                    <option value="subscriber">Subscriber</option>
                    <option value='admin'>Admin</option>
                </select>
        </div>



        <div class="form-group">
            <input type="submit" class=" btn btn-primary" name="Edit_user" value="Edit User">
        </div>

  </form>




<!-- Displaying image into modal-->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <p><img src="../images/<?php echo $user_image;?>" class="img-responsive"></p>
      </div>
      
    </div>

  </div>
</div>