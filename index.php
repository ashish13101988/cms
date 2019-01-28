   <?php include 'includes/db.php';?>
   <?php include 'includes/header.php'; ?>
    
    


    <!-- Navigation -->
 
<?php include 'includes/navigation.php' ?>
   
    <!-- Page Content -->
    <div class="container">

        <div class="row ">

            <!-- Blog Entries Column -->
            <div class="col-md-8 ">

                <h1 class="page-header alert alert-info">
                  Posts
                    
                </h1>
                
  <?php    
    
    //finding total row in posts table
    
    
    if(isset($_SESSION['user_role']) && $_SESSION['user_role']=='admin'){
        
        $post_query_count = "SELECT * FROM `posts`";
    }
    else{
        
        $post_query_count = "SELECT * FROM `posts` WHERE `post_status` = 'published'";
      }
    
    
    $find_count = mysqli_query($connection, $post_query_count);
    $find_row = mysqli_num_rows($find_count);

    if($find_row<1){
        
        echo "<h1 class='alert alert-info'>No post was posted.visit again to see that</h1>";
    }
    else{
        //pagination
           $find_row = round($find_row/5);
        
    
            if(isset($_GET['page'])){

               $page = $_GET['page'];
            }
            else{

                $page = "";
            }

            if($page==""||$page==1){
                
                $page_1 = 0;
            }
            else{
                
                $page_1 = ($page*5)-5;
            }
        
    if(isset($_SESSION['user_role']) && $_SESSION['user_role']=='admin'){
        
        $sql = "SELECT * FROM `posts` LIMIT $page_1,5";
    }
    else{
        
        $sql = "SELECT * FROM `posts` WHERE `post_status`= 'published' LIMIT $page_1,5";
      }
    
    $result = mysqli_query($connection,$sql);

        while($row = mysqli_fetch_assoc($result)){
            
            $post_id = $row['post_id'];
            $post_title = $row['post_title'];
            $post_user = $row['post_user'];
            $post_date = $row['post_date'];
            $post_image = $row['post_image'];
            $post_content = substr($row['post_content'],0,100);
            $post_tags = $row['post_tags'];
            $post_comment_count = $row['post_comment_count'];
            $post_status = $row['post_status'];
            
            
            
    ?>
            
            <!-- First Blog Post -->
                <h2>
                    <a href="post.php?p_id=<?php echo $post_id;?>"><?php echo $post_title;?></a>
                </h2>
                <p class="lead">
                    by <a href="author_posts.php?author=<?php echo $post_user;?>&p_id=<?php echo $post_id;?>"><?php echo $post_user;?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date;?> </p>
                <hr>
                <a href="post.php?p_id=<?php echo $post_id;?>">
                    <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                </a>
                <hr>
                <p><?php echo $post_content;?></p>
                
                <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id;?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
                
    <?php            
        }
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
                   <div class=text-center>
                       <ul class="pagination">
                           
                           <?php
                                    
                                for($i=1;$i<=$find_row;$i++){
                                    
                                    if($i==1&&$page==""){
                                        
                                      echo "<li class='active'><a href='index.php?page=$i'>$i</a></li>";
                                    }
                                   
                                    elseif($i==$page){
                                            
                                        echo "<li class='active'><a href='index.php?page=$i'>$i</a></li>";
                                    }
                                    else{
                                        
                                        echo "<li><a href='index.php?page=$i'>$i</a></li>";    
                                    }
                                    
                                }
                             ?>
                           
                            
                            
                          </ul>
                   </div>
                       
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </footer>


<?php include 'includes/footer.php' ?>