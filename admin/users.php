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
                        
                        case 'add_user';
                        include 'includes/add_user.php';
                        break;
                        
                        
                        case 'edit_user';
                        include 'includes/edit_user.php';
                        break;
                        
                        default :
                        
                        include 'includes/view_all_users.php';
                }
         ?>       
         
                 
            </div> 
            
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

 
    <!-- /#wrapper -->
<?php include 'includes/footer.php';?>

 </div> 