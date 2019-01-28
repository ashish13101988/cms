<?php
    if(isset($_POST['creat_post'])){
        
        $post_title = $_POST['post_title'];
        $post_category = $_POST['post_category'];
        $post_user = $_POST['post_user'];
        $post_status = $_POST['post_status'];
        $post_tags = $_POST['post_tags'];
        $post_content = $_POST['post_content'];
        
        $post_image = $_FILES['post_image']['name'];
        $post_image_temp = $_FILES['post_image']['tmp_name'];
        
        move_uploaded_file($post_image_temp,"../images/$post_image");
        
        $sql = "INSERT INTO `posts`(`post_cat_id`, `post_title`, `post_user`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`) VALUES ('$post_category','$post_title','$post_user',now(),'$post_image','$post_content','$post_tags',0,'$post_status')";
        
       $result = mysqli_query($connection,$sql);
        
        if(!$result){
            die("query failed".mysqli_error($connection));
        }
        
        else {  
            ?>
            
         <div class="alert alert-success text-center">
            <strong>Post added successfully.</strong>
         </div>
         
         <?php
                
            $post_id = mysqli_insert_id($connection);
         ?>
         <p class="text-center">
             <a href="../post.php?p_id=<?php echo $post_id;?>">View Post <i class="fa fa-chevron-right"  style="color:green;"></i>

            </a>------------
            <a href="posts.php">View all Post <i class="fa fa-chevron-right" style="color:green;"></i>

            </a>
         </p>
         
          <?php  
          }
    }

?>
   

   
   
   <form action="" method="post" enctype="multipart/form-data">
    
    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" name="post_title" required>
    </div>
    
    <div class="form-group">
        <label for="">Post Category</label>
           
            <select name="post_category" id="" class="form-control" required>
                   
               <?php
                
                    $sql = "SELECT * FROM categories ORDER BY `cat_title` ASC";
                    $select_categories = mysqli_query($connection, $sql);
                    
                    while($row = mysqli_fetch_assoc($select_categories)){
                      
                        $categories = $row['cat_title'];
                           
                      echo "<option value='{$categories}'>{$categories}</option>";
                     
                    }
                    
             ?>
               
               
            </select>
    </div>
    
    <div class="form-group">
        <label for="">Post Author</label>
             <select id="" class="form-control" name="post_user" required>
                 <option value="">select user</option>
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
                        
                ?>        

                            
                            <option value="<?php echo $user_name ;?>"><?php echo $user_name ;?></option>
              
          <?php       
            }
        ?>
        <option value=""></option>
        </select> 
       
    </div>
    
    <div class="form-group">
        <label for="">Post Status</label>
            <select name="post_status" id="" class="form-control" required>
                <option value="draft">Draft</option>
                <option value="published">Publish</option>
            </select>
    </div>
    
    <div class="form-group">
        <label for="">Post Tags</label>
        <input type="text" class="form-control" name="post_tags" required>
    </div>
    
     <div class="form-group">
        <label for="">Post Image</label>
        <input type="file" name="post_image" class="form-control-file">
    </div>
    
    <div class="form-group">
        <label for="">Post Content</label>
        <textarea  class="form-control" name="post_content" id="editor" cols="10" rows="10"></textarea>
    </div>
    
    <div class="form-group">
        <input type="submit" class=" btn btn-primary" name="creat_post" value="Publish">
    </div>
    
</form>