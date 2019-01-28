
   <?php
    //updating and inserting data into datbase.
        
        if(isset($_POST['update_post'])){
          
          $post_id = $_POST['post_id'];
          $post_cat = $_POST['post_category'];
          $post_title = $_POST['post_title'];
          $post_user = $_POST['post_user'];
          $post_content = $_POST['post_content'];
          $post_tags= $_POST['post_tags'];
          $post_status = $_POST['post_status'];
          
          $post_image = $_FILES['post_image']['name'];
          $post_image_temp = $_FILES['post_image']['tmp_name'];
        
        move_uploaded_file($post_image_temp,"../images/$post_image");
            
            
    //checking uploaded images is emptly or not
            
            if(empty($post_image)){
                
                $sql = "SELECT * FROM `posts` WHERE `post_id` = $post_id";
                $select_image = mysqli_query($connection, $sql);
                
                 while($row = mysqli_fetch_array($select_image)){
                    
                     $post_image = $row['post_image'];
                 }
            }
         //update query   
            
        $sql = "UPDATE `posts` SET `post_cat_id`='$post_cat', `post_title`='$post_title', `post_user`='$post_user', `post_date`= now(), `post_image`='$post_image', `post_content`='$post_content', `post_tags`='$post_tags', `post_status` = '$post_status' WHERE `posts`.`post_id` = $post_id";
         
         $update_result = mysqli_query($connection, $sql);
            
      //cheking for error function    
            
        if(!$update_result){
            
            die("query failed".mysqli_error($connection));
        }    
        else {  
            ?>
            
         <div class="alert alert-success text-center">
            <strong>Post successfully updated.</strong>
         </div>
         <p class="text-center">
             <a href="../post.php?p_id=<?php echo $post_id;?>">View Post <i class="fa fa-chevron-right"  style="color:green;"></i>

            </a>------------
            <a href="posts.php">Edit Post <i class="fa fa-chevron-right" style="color:green;"></i>

            </a>
         </p>
          <?php  
          }
        }

        
    ?>

   
    <?php
     //getting and displaying information from database.

    if(isset($_GET['edit_id'])){
        
       $edit_id = $_GET['edit_id'];

       $sql= "SELECT * FROM `posts` WHERE `post_id`= $edit_id";
    
       $get_edit_id = mysqli_query($connection, $sql);
    
    while($row = mysqli_fetch_assoc($get_edit_id)){
            
            $post_id = $row['post_id'];
            $post_cat_id = $row['post_cat_id'];
            $post_title = $row['post_title'];
            $post_user = $row['post_user'];
            $post_date = $row['post_date'];
            $post_image = $row['post_image'];
            $post_content = $row['post_content'];
            $post_tags= $row['post_tags'];
            $post_status = $row['post_status'];
        
      }
    }
?>
   
   
   <form action="" method="post" enctype="multipart/form-data">
    
    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" name="post_title" value="<?php echo $post_title;?>">
    </div>
    
    <div class="form-group">
        <label for="">Post Category</label>
            <select name="post_category" id="" class="form-control">
                   
               <?php
                
                    $sql = "SELECT * FROM `categories`";
                    $select_categories = mysqli_query($connection, $sql);
                    
                     while($row = mysqli_fetch_assoc($select_categories)){
                      
                           $categories = $row['cat_title'];
                         
                            if( $categories == $post_cat_id)

                            echo "<option selected value='{$post_cat_id}'>{$post_cat_id}</option>";

                            else{
                                
                                echo "<option value='{$categories}'>{$categories}</option>";
                            }


                      
                     
                    }
                    
             ?>
               
               
            </select>
    </div>
    
    <div class="form-group">
        <label for="">Post user</label>
        
        <select class="form-control" name="post_user" value="<?php echo $post_user;?>" id="">
            
            <option value="<?php echo $post_user;?>"><?php echo $post_user;?></option>
            
        <!--    fetching all users data from user's table    -->
            
         <?php
            
                $users_query = "SELECT * FROM `users`";
                $users_query_result = mysqli_query($connection,$users_query);

                if(!$users_query_result){

                    die('query failed'.mysqli_error($connection));
                }

                    while($row = mysqli_fetch_assoc($users_query_result)){
                        
                        $user_id = $row['user_id'];
                        $user_name = $row['username'];
                        
                        if($post_user == $user_name){
                            
                           echo "<option selected value='{$post_user}'>{$post_user}</option>"; 
                        }
                        else{
                             echo "<option value='{$user_name}'>{$user_name}</option>";
                        } 
           
            }
        ?>
        
        </select> 
        
        
    </div>
    
    
    <div class="form-group">
        <label for="">Post Status</label>
            <select name="post_status" id="" class="form-control" required>
                <option value="<?php echo $post_status;?>"><?php echo ucfirst($post_status);?></option>
                <option value="draft">Draft</option>
                <option value="published">Publish</option>
            </select>
    </div>
    
    <div class="form-group">
        <label for="">Post Tags</label>
        <input type="text" class="form-control" name="post_tags" value="<?php echo $post_tags;?>">
    </div>
    
     <div class="form-group">
        <label for="">Post Image</label>
           <input type="file" name="post_image" class="form-control-file">
        <br>
           <!-- Trigger the modal with a button -->

            <a data-toggle="modal" data-target="#myModal">
                <img src="../images/<?php echo $post_image;?>" alt="..." title="view image" class="img-rounded" width="150px">
            </a>

    </div>
    
    <div class="form-group">
        <label for="">Post Content</label>
        <textarea class="form-control" name="post_content"  cols="30" rows="10" id="editor" ><?php echo $post_content;?></textarea>
    </div>
    
    <div class="form-group">
        <input type="hidden" class="form-control" name="post_id" value="<?php echo $post_id;?>">
        <input type="submit" class=" btn btn-primary" name="update_post" value="Update Post">
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
        <p><img src="../images/<?php echo $post_image;?>" class="img-responsive"></p>
      </div>
      
    </div>

  </div>
</div>