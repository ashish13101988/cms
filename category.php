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
    
    if(isset($_GET['category'])){
       
        $category_id = $_GET['category'];
        
        $sql = "SELECT * FROM `posts` WHERE `post_cat_id`= '$category_id'";
    
        $result = mysqli_query($connection,$sql);
        if(mysqli_num_rows($result)<1){
            
            echo "<h1 class='alert alert-info'>No post was posted.visit again to see that</h1>";
        }
        else{
        while($row = mysqli_fetch_assoc($result)){
            
            $post_id = $row['post_id'];
            $post_title = $row['post_title'];
            $post_author = $row['post_user'];
            $post_date = $row['post_date'];
            $post_image = $row['post_image'];
            $post_content = $row['post_content'];
            $post_tags = $row['post_tags'];
            $post_comment_count = substr($row['post_comment_count'],0,100);
            
            ?>
            
            <!-- First Blog Post -->
                <h2>
                    <a href="post.php?p_id=<?php echo $post_id;?>"><?php echo $post_title;?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author;?></a>
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
    }//else bracket close here
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