   <?php include 'includes/db.php';?>
   <?php include 'includes/header.php'; ?>
    
    


    <!-- Navigation -->
 
<?php include 'includes/navigation.php' ?>
   
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>
                
  <?php   
    
    if(isset($_GET['p_id'])){
       
    $p_id = $_GET['p_id'];
        
        
    //post view count query  
        
    $view_query = $sql = "UPDATE `posts` SET `post_views_count`= post_views_count + 1 WHERE `post_id` = $p_id";    
    $view_query_result = mysqli_query($connection, $view_query);
        
    if(!$view_query_result){
        
        die("query failed". mysqli_error($connection));
    }    
     
    //post view count query ends here.
        
    $sql = "SELECT * FROM `posts` WHERE `post_id` = $p_id";
    
    $result = mysqli_query($connection,$sql);

        while($row = mysqli_fetch_assoc($result)){
            
            $post_title = $row['post_title'];
            $post_user = $row['post_user'];
            $post_date = $row['post_date'];
            $post_image = $row['post_image'];
            $post_content = $row['post_content'];
            $post_tags = $row['post_tags'];
            $post_comment_count = $row['post_comment_count'];
            
            ?>
            
            <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $post_title;?></a>
                </h2>
                <p class="lead">
                    by <a href="author_posts.php"><?php echo $post_user;?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date;?> </p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                <hr>
                <p><?php echo $post_content;?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
                
    <?php  
            
        }
         
    
    }else{
        
        header("location:index.php");
    }

   ?>              
               <!-- Blog Comments -->
                
                
    <?php 
        
                if(isset($_POST['create_comment'])){
                  $comment_post_id =$_GET['p_id'];
                  $comment_author = $_POST['comment_author'];
                  $comment_email = $_POST['comment_email'];
                  $comment_content = $_POST['comment_content'];
                    
                 $sql = "INSERT INTO `comments` (`comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES ('$comment_post_id', '$comment_author', '$comment_email', '$comment_content', 'draft', now())" ;  
                    
                $comment_query = mysqli_query($connection, $sql);
                    
                    if(!$comment_query){
                        
                        die('Query failed'.mysqli_error($connection));
                    }
                    else{
                        ?>
                        <div class="alert alert-success">
                            <strong>Thanks for leaving comment.It'll show up after admin's approval. </strong> 
                        </div>
                        
                        <?php
                    }
                    
                }
                
        ?>            
                
                
                

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" action="" method="post">
                       
                       <div class="form-group">
                           <label for="">Author</label>
                           <input type="text" class="form-control" name="comment_author" required>
                       </div>
                        
                        <div class="form-group">
                          <label for="">Email</label>
                           <input type="email" class="form-control" name="comment_email" required>
                        </div>
                       
                        <div class="form-group">
                           <label for="">Comment</label>
                            <textarea class="form-control" rows="3" name="comment_content" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="create_comment">Submit</button>
                    </form>
                </div>

                <hr> 

     <!-- Comment -->
              
     
                   
             <?php
                
             
    
    $comment_post_id =$_GET['p_id'];                
        
    $sql = "SELECT * FROM `comments` WHERE `comment_post_id`= $comment_post_id AND `comment_status` = 'approved' ORDER BY `Comment_id` DESC";
    
    $select_comments = mysqli_query($connection,$sql);

          
            
    while($row = mysqli_fetch_assoc($select_comments)){
            
            $comment_id = $row['comment_id'];
            $comment_post_id = $row['comment_post_id'];
            $comment_author = $row['comment_author'];
            
            $comment_content = $row['comment_content'];
            
            $comment_date = $row['comment_date'];
        
       ?>
                 <div class="media">  
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment_author;?>
                            <small><?php echo $comment_date;?></small>
                        </h4>
                           <p>  <?php echo $comment_content;?> </p>
                    </div> 
                 </div>     
        <?php
        
    }
        ?>
                    
           
            
             
             
            </div>  
             
     
            
            
            
            

            <!-- Blog Sidebar Widgets Column -->
        
           
            
      <?php include 'includes/sidebar.php' ?>     

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
       
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </footer>
    
      


<?php include 'includes/footer.php' ?>