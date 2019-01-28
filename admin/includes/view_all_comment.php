
        <?php

//deleting comment query

    if(isset($_GET['delete'])){
        
        $delete_comment = $_GET['delete'];
       
        
       $sql = "DELETE FROM `comments` WHERE `comments`.`comment_id` = $delete_comment";
        
        $delete_result = mysqli_query($connection,$sql);
        
        if(!$delete_result){
            
            die("Query failed".mysqli_error($connection));
        }else{
            
            echo "<script>alert('comment has been remove successfully.')</script>";
        }
        
        }
?>      

                
                  
                    
          <table class="table table-hover table-bordered table-condensed table-striped">
               <thead>
                   <tr>
                       <th>Id</th>
                       <th>Author</th>
                       <th>Comment</th>
                       <th>Email</th>
                       <th>Status</th>
                       <th>In Response to</th>
                       <th>Date</th>
                       <th><i class="fa fa-check" aria-hidden="true"></i>
</th>
                       <th><i class="fa fa-times" aria-hidden="true"></i>
</th>
<!--                       <th>Comments Counts</th>-->
                       <th><i class="fa fa-trash" ></i></th>
                   </tr>
               </thead>
               <tbody>
               
<!--               fetching comment data from data base-->
        <?php
         $sql= "SELECT * FROM `comments` ";
         $select_comments = mysqli_query($connection, $sql);
         
        while($row = mysqli_fetch_assoc($select_comments)){
            
            $comment_id = $row['comment_id'];
            $comment_post_id = $row['comment_post_id'];
            $comment_author = $row['comment_author'];
            $comment_email = $row['comment_email'];
            $comment_content = $row['comment_content'];
            $comment_status = ucfirst($row['comment_status']);
            $comment_date = $row['comment_date'];
            
        ?>          
                  
                  
                   <tr>
                       <td><?php echo $comment_id ;?></td>
                       <td><?php echo $comment_author ;?></td>
                       <td><?php echo $comment_content;?></td>
                       <td><?php echo $comment_email ;?></td>
                       <td><?php echo $comment_status ;?></td>
                       
<!--    relating comments to pasts           -->
                <?php 
                    
                $sql = "SELECT * FROM `posts` WHERE `post_id` = $comment_post_id";
                $select_result = mysqli_query($connection, $sql);
            
                while($row = mysqli_fetch_assoc($select_result)){
                   $post_id = $row['post_id'];
                   $post_title = $row['post_title']; 
                   echo "<td><a href='../post.php?p_id=$post_id'>{$post_title}</a></td>";
                }
            
                ?>                              
                     <td><?php echo $comment_date  ;?></td>
                      
                      <!-- <td class="text-center"><?//php echo $post_comment_count ;?></td>-->
                       <td class="text-center"><a href="comments.php?approve=<?php echo $comment_id;?>" title="approve" style="color:green"><i class="fa fa-check" aria-hidden="true"></i>
</a></td>
                       <td><a href="comments.php?unapprove=<?php echo $comment_id;?>" style="color:red" title="unapprove"><i class="fa fa-times" aria-hidden="true"></i>
</a></td>
                       
                       
                       
                       <td >
                         <a href="comments.php?delete=<?php echo $comment_id;?>" title="delete comment">
                          <i class="fa fa-trash" style="color:red;"></i></a>
                       </td>
                       
                  </tr>
       <?php           
         }           
          ?>           
               </tbody>
           </table>
           
<!--    approving & and unapproving comments query     -->
           
    <?php 
  
         if(isset($_GET['approve'])){
             
        $approve = $_GET['approve'];      
        
    $sql = "UPDATE `comments` SET `comment_status` = 'approved' WHERE `comments`.`comment_id` = $approve ;";    
             
       $approve_result = mysqli_query($connection, $sql); 
        
    header('location:comments.php');         
             
         }

if(isset($_GET['unapprove'])){
    
    $unapprove = $_GET['unapprove'];
        
    $sql = "UPDATE `comments` SET `comment_status` = 'unapproved' WHERE `comments`.`comment_id` = $unapprove;";
             
       $unpprove_result = mysqli_query($connection, $sql);
     
      header('location:comments.php'); 
             
         }

    ?>       
           
           
      
           
                
                     
                          
                               
                                    
                                         
                                                   
           
          