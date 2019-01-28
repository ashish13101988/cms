<?php include 'includes/header.php';?>
    

    <div id="wrapper">


        <!-- Navigation -->
       
<?php include 'includes/navigation.php';?>
       
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome To <?php echo ucfirst($_SESSION['user_role']);?>
                            <small><?php echo ucfirst($_SESSION['username']);?></small>
                        </h1>
                        
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                
                <!-- /.row -->
                
<div class="row">
  
  <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
   
<!--   displaying post count -->
  
  <?php
        
    $sql= "SELECT * FROM `posts`";
    $result = mysqli_query($connection, $sql);
    $post_count = mysqli_num_rows($result);
    
    echo "<div class='huge'>{$post_count}</div>";                    
    
 ?>

                        <div>Posts</div>
                    </div>
                </div>
            </div>
            <a href="posts.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    
    
    
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    
<!--        displaying comments count            -->
                    
<?php
        
    $sql= "SELECT * FROM `comments`";
    $result = mysqli_query($connection, $sql);
    $comment_count = mysqli_num_rows($result);
    
    echo "<div class='huge'>{$comment_count}</div>";                    
    
 ?>
                     
                      <div>Comments</div>
                    </div>
                </div>
            </div>
            <a href="comments.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    
        <!--        displaying users count            -->
                    
<?php
        
    $sql= "SELECT * FROM `users`";
    $result = mysqli_query($connection, $sql);
    $user_count = mysqli_num_rows($result);
    
    echo "<div class='huge'>{$user_count}</div>";                    
    
 ?>            
                        <div> Users</div>
                    </div>
                </div>
            </div>
            <a href="users.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                       
    <!--        displaying categoriess count            -->
                    
<?php
        
    $sql= "SELECT * FROM `categories`";
    $result = mysqli_query($connection, $sql);
    $category_count = mysqli_num_rows($result);
    
    echo "<div class='huge'>{$category_count}</div>";                    
    
 ?>                   
                       
                      
                         <div>Categories</div>
                    </div>
                </div>
            </div>
            <a href="categories.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
                <!-- /.row -->
                
<!--        char displaying        -->
 
<div class="row">               
                                              

              
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Post', 'Count'],
        
        <?php 
                
            $element_text = ['Posts','Comments','Users','Categories'];
            $element_count =[$post_count,$comment_count,$user_count,$category_count];
            $element_length = count($element_text);
            
            
            for($i=0;$i<$element_length;$i++){
            
                echo "['$element_text[$i]',$element_count[$i]],";
                
            }
            
        ?>    
            
//          ['Post', 1000]
          
        ]);

        var options = {
          chart: {
            title: '',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>

      <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>
        
              
              
              
       </div>  <!-- chart displaying row div ends-->        

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php include 'includes/footer.php';?>
  