 <?php include 'delete_modal.php';?>
       
 <?php
    
    if(isset($_GET['reset'])){
        
       $reset_post = $_GET['reset'];
       
       $sql = "UPDATE `posts` SET `post_views_count` = 0 WHERE `posts`.`post_id` = $reset_post";
        
        $reset_post = mysqli_query($connection,$sql);
        
        if(!$reset_post){
            
            die("Query failed".mysqli_error($connection));
           }
        
        }

    

    if(isset($_GET['delete'])){
        $delete_post = $_GET['delete'];
       
        
       $sql = "DELETE FROM `posts` WHERE `posts`.`post_id` = $delete_post";
        
        $delete_result = mysqli_query($connection,$sql);
        
        if(!$delete_result){
            
            die("Query failed".mysqli_error($connection));
        }else{
            
            echo "<script>alert('Post has been remove successfully.')</script>";
        }
        
        }
?>      
                
<!--                bulk option queries                -->
                
    
        <?php 
                
                if(isset($_POST['checkBoxArray'])){
                    
                    $checkBoxArray = $_POST['checkBoxArray'];
                    
                    foreach($checkBoxArray as $arrayId){
                       
                        $bulkOptions = $_POST['bulkOptions'];
                        
                            switch ($bulkOptions){
                                    
                                case 'published':
                                    
                                    $sql = "UPDATE `posts` SET `post_status` = '$bulkOptions' WHERE `posts`.`post_id` = $arrayId";
                                    
                                    $Bulk_publish_result = mysqli_query($connection,$sql);
                                 
                                break; 
                                    
                                case 'draft':
                                    
                                    $sql = "UPDATE `posts` SET `post_status` = '$bulkOptions' WHERE `posts`.`post_id` = $arrayId";
                                    
                                    $Bulk_publish_result = mysqli_query($connection,$sql);
                                   
                                break;  
                                
                                case 'delete':
                                    
                                    $sql = "DELETE FROM `posts` WHERE `posts`.`post_id` = $arrayId";
                                    
                                    $Bulk_publish_result = mysqli_query($connection,$sql);
                            
                                break;
                                    
                                case 'clone':
                                    
                                    
                               $sql= "SELECT * FROM `posts` WHERE `posts`.`post_id` = $arrayId";
                 
                               $select_clone_posts = mysqli_query($connection, $sql);
          
                  
                 
         
                                while($row = mysqli_fetch_assoc($select_clone_posts)){

                                    $post_id = $row['post_id'];
                                    $post_cat_id = $row['post_cat_id'];
                                    $post_title = $row['post_title'];
                                    $post_user = $row['post_user'];
                                    $post_date = $row['post_date'];
                                    $post_image = $row['post_image'];
                                    $post_content = $row['post_content'];
                                    $post_tags= $row['post_tags'];
                                    $post_comment_count = $row['post_comment_count'];
                                    
                                    $post_status = $row['post_status'];

                                    
                                   
        $sql = "INSERT INTO `posts`(`post_cat_id`, `post_title`, `post_user`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`) VALUES ('$post_cat_id','$post_title','$post_user',now(),'$post_image','$post_content','$post_tags',0,'$post_status')";
                                    
                                
                                    
                                    $Bulk_clone_result = mysqli_query($connection,$sql);
        }//while bracket close here                              
                                    
                                    if(!$Bulk_clone_result){
                                        
                                        die('Query Failed'.mysqli_error($connection));
                                    }
                            
                                break;       
                            }//switch bracket close here
                       
                    }//foreach bracket close here
                }//isset bracket close here.
                    
        
       ?>  
                  
    <form action="" method="post">            
                    
          <table class="table table-hover table-bordered table-condensed table-striped">
              
<!--       bulk options        -->
            <div id="bulk_option_container" class="col-sm-4 form-group" style="padding:0;">
                     
                <select name="bulkOptions" id="" class="form-control" >
                      <option value="">Select option</option>
                      <option value="published">Publish</option>
                      <option value="draft">Draft</option>
                      <option value="delete">Delete</option>
                      <option value="clone">Clone Post</option>
                  </select>
            </div>
            <div class="col-sm-4 form-group">
                <input type="submit" name="submit" class="btn btn-success" value="Apply" onclick="javascript: return confirm('Do you want to apply the change?');">
                <a href="posts.php?source=add_post" class="btn btn-primary">Add new</a>
            </div>
            
    <!--     ends bulk options        -->
              
               <thead>
                  
                   <tr>
                       <th><input type="checkbox" id="selectAllBoxes" ></th>     
                       <th>Id</th>
                       <th>Title</th>
                       <th>Author</th>
                       <th>Category</th>
                       <th>Status</th>
                       <th>Image</th>
                       <th>Tags</th>
                       <th>Comments</th>
                       <th>Date</th>
                       <th>Comments Counts</th>
                       <th>Post views Counts</th>
                       <th><i class="fa fa-eye"></i></th>
                       <th><i class="fa fa-pencil" ></i></th>
                       <th><i class="fa fa-trash" ></i></th>
                   </tr>
               </thead>
               <tbody>
        <?php
         $sql= "SELECT * FROM `posts` ORDER BY `post_id` DESC ";
                 
         $select_posts = mysqli_query($connection, $sql);
          
                  
                 
         
        while($row = mysqli_fetch_assoc($select_posts)){
            
            $post_id = $row['post_id'];
            $post_cat_id = $row['post_cat_id'];
            $post_title = $row['post_title'];
            $post_user = $row['post_user'];
            $post_date = $row['post_date'];
            $post_image = $row['post_image'];
            $post_content = $row['post_content'];
            $post_tags= $row['post_tags'];
            $post_comment_count = $row['post_comment_count'];
            $post_views_count = $row['post_views_count'];
            $post_status = $row['post_status'];
                
        ?>          
                  
                  
                   <tr>
                      
                       <td >
                          <input type="checkbox" class="checkBoxes" name="checkBoxArray[]" value="<?php echo $post_id ;?>">
                       </td>  
                            
                       <td><?php echo $post_id ;?></td>
                       <td><?php echo $post_title ;?></td>
                 
                      <td><?php echo $post_user;?></td>
                       <td class="text-center"><?php echo $post_cat_id ;?></td>
                       <td><?php echo $post_status;?></td>
                       <td>
                       
                       <!-- Trigger the modal with a button -->

                     <a href="" data-toggle="modal" data-target="#myModal<?php echo $post_id;?>">
                       <img src="../images/<?php echo $post_image ;?>" alt="" class="img-responsive" width="150px">
                     </a> 
                       </td>
                       <td><?php echo $post_tags ;?></td>
            
                       <td><?php echo $post_content ;?></td>
                       <td><?php echo $post_date ;?></td>
                       
                       
                       <?php
                            
                            $comment_count_query = "SELECT * FROM comments WHERE comment_post_id = $post_id";
                            $send_comment_query = mysqli_query($connection,$comment_count_query);
                            $row = mysqli_fetch_assoc($send_comment_query);
                            $comment_id =$row['comment_id'];
                            $count_comments = mysqli_num_rows($send_comment_query);                       
                       ?>           
                       
                       <td class="text-center"><a href="post_comment.php?id=<?php echo $post_id;?>"><?php echo $count_comments;?></a></td>
                       
                       <td  class='text-center'>
                           <a onclick="javascript: return confirm('Do you want to reset value to 0?');" href="posts.php?reset=<?php echo $post_id;?>"><?php echo $post_views_count;?></a>
                       </td>
                       
                       <td>
                           <a href="../post.php?p_id=<?php echo $post_id;?>" title="view post">
                               <i class="fa fa-eye" style="color:green;"></i>
                             </a>  
                        </td>
                       
                       <td>
                           <a  href="posts.php?source=edit_post&edit_id=<?php echo $post_id;?>" title="edit post">
                               <i class="fa fa-pencil" style="color:blue;"></i>
                             </a>  
                        </td>
                        
                       <td>
                        <a href="javascript:void(0);" rel="<?php echo $post_id;?>" title="delete post" class="delete_link">
                          <i class="fa fa-trash" style="color:red;"></i></a>
                       </td>
                       
                  </tr>
                  
                  
        <!-- Displaying image into modal-->
           
            <div id="myModal<?php echo $post_id;?>" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                  </div>
                  <div class="modal-body">
                    <p><img src="../images/<?php echo $post_image ;?>" class="img-responsive"></p>
                  </div>

                </div>

              </div>
            </div>                                  
                        
<!--            modal ends here                 -->
       <?php           
         }           
          ?>      
              
            
        
                                  
                                            
               </tbody>
           </table>
      </form>  
      
     <script src="js/jquery.js"></script>      
      
    <script>

        $(document).ready(function(){
            
            $(".delete_link").on('click', function(){
                            
                var id = $(this).attr('rel');
                
                //alert(id);
                
                var delete_url = "posts.php?delete="+id+"";
                
               $(".modal_delete_link").attr('href',delete_url);    
               $("#mymodal").modal("show");
                
            
            });
        });

    </script>   
        
         
            