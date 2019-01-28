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
                    All post by
                    <small><?php echo $_GET['author'] ;?></small>
                </h1>
                
  <?php   
   
   
    if(isset($_GET['p_id'])){
        
    $p_id        = $_GET['p_id'];
    $post_user = $_GET['author'];    
        
    $sql = "SELECT * FROM `posts` WHERE `post_user` = '$post_user'";
    
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
                    by <a href="index.php"><?php echo $post_user;?></a>
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