<?php include 'includes/header.php';?>
    

    <div id="wrapper">

        <!-- Navigation -->
       
<?php include 'includes/navigation.php';?>
       
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
               <h1>Welcome To Admin
                   <small>Author</small>
               </h1> 
               <hr>
                <!-- /.row -->
           
         <?php
         
                if(isset($_GET['source'])){
                    
                    $source = $_GET['source'];
                }
                
                else{
                    
                    $source = "";
                }
                
                switch($source){
                        
                        case 'add_post';
                        include 'includes/add_post.php';
                        break;
                        
                        
                        case 'edit_post';
                        include 'includes/edit_post.php';
                        break;
                        
                        default :
                        
                        include 'includes/view_all_posts.php';
                }
         ?>       
         
                 
            </div> 
            
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

 
    <!-- /#wrapper -->
<?php include 'includes/footer.php';?>

 </div> 