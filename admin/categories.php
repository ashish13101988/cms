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
                            Welcome to Admin
                            <small>Author</small>
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
                
            <?php
              
                if(isset($_POST['submit'])){
                    
                 $cat_title = $_POST['cat_title'];
                    
                if(empty($cat_title)){
                    
                    echo "Empty category could not be submitted.";
                }    
                else{
                $sql = "INSERT INTO `categories`(`cat_title`) VALUES ('$cat_title')";   
                $create_category = mysqli_query($connection, $sql);
                    
                    if(!$create_category){
                        
                        die("Query failed ". mysqli_error($connection));
                    }
                    
                  }     
                }
                
                
            ?> 
<!--            update category query-->
        <?php
              
                if(isset($_POST['update_category'])){
                    
                 $the_cat_title = $_POST['cat_title'];
                    
                if(empty($the_cat_title)){
                    
                    echo "<script>alert('Empty feild cannot be submited.')</script>";
                } else{ 
                 $the_cat_id = $_POST['cat_id'];   
                $sql = "UPDATE `categories` SET `cat_title`='$the_cat_title' WHERE cat_id = $the_cat_id";   
                $create_category = mysqli_query($connection, $sql);
                    
                    if(!$create_category){
                        
                        die("Query failed ". mysqli_error($connection));
                    }
                    else{
                        echo "<script>alert('Data updated successfully.')</script>";
                    }
                    
                    } 
                  }    
                
                
                
            ?>                     
                
        <div class="row">       
            <div class="col-md-6">
              <form action=""  method="post">
                <label for="">Add Category</label>  
                <div class="input-group">
                      <input type="text" name="cat_title" class="form-control">
                      <div class="input-group-btn">
                        <!-- Buttons -->
                        <input type="submit" name="submit" value="Add " class="btn btn-primary ">
                      </div>
                </div>
             </form>
             
             
             
<!--            update method code -->
           
           <form action=""  method="post">
                <label for="">Update Category</label>  
                <div class="input-group">
           
           
            <?php
             
       if(isset($_GET['edit'])){
           
           $get_cat_id = $_GET['edit'];
           
           $sql = "SELECT * FROM `categories` WHERE cat_id = $get_cat_id";
           $result = mysqli_query($connection, $sql);
           
           while($row = mysqli_fetch_assoc($result)){
              
              $cat_title = $row['cat_title'];
              $cat_id = $row['cat_id'];   
               
               ?>
               <input type="hidden" name="cat_id" value="<?php echo $cat_id;?>">
               <input type="text" name="cat_title" class="form-control " value="<?php echo $cat_title;?>">
                      <div class="input-group-btn">
                       <input type="submit" name="update_category" value="Update" class="btn btn-primary ">
                      </div>
                       
                        <!-- Buttons -->
              <?php                 
           }
            
           
           
       }            
                
               ?>
                        
                </div>
             </form>
           </div>       
               
          <div class="col-md-6">
              <table class="table table-hover table-bordered table-condensed table-striped">
                 <thead>
                    <tr class="success">
                     <th>S.No</th>
                     <th>Id</th>
                     <th>Category title</th>
                     <th><i class="fa fa-trash"></i></th>
                     <th><i class="fa fa-pencil"></i></th>
                    </tr> 
                 </thead>
                 <tbody >
                    
        <?php
          //add category           
        $sql = "SELECT * FROM categories ORDER BY `cat_title` ASC";
        $select_category = mysqli_query($connection, $sql);
        $counter = 0;
                     
        while($row = mysqli_fetch_assoc($select_category)){
          $cat_id = $row['cat_id'];        
          $cat_title = $row['cat_title'];
          $counter = $counter + 1;
          ?>  
            <tr>
                         <td><?php echo $counter; ?></td>
                         <td><?php echo $cat_id ?></td>
                         <td><?php echo $cat_title; ?></td>
                         <td>
                             <a href="categories.php?delete=<?php echo $cat_id;?>" title="delete"><i class="fa fa-trash" aria-hidden="true"></i></a>  
                         </td>
                
                <td>
                    <a href="categories.php?edit=<?php echo $cat_id;?>" title="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a> 
                </td>
                
                         

            </tr>
                                 
                              
        <?php  }  ?>           
                                       
         
<!--        delete category-->
        <?php
             if(isset($_GET['delete'])){
                 $delete_cat_id = $_GET['delete'];
                 
                 $sql = "DELETE FROM `categories` WHERE `categories`.`cat_id` = $delete_cat_id;";
                 $delete_result = mysqli_query($connection,$sql);
                 
                 header('location: categories.php');
             }        
        ?> 
  <!--        edit category-->                 
                 
                     
                 </tbody>
            </table>
          </div>       
                
        </div>
    </div>  
               
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php include 'includes/footer.php';?>
  