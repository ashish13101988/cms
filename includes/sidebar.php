 <div class="col-md-4">
     
    
<!--       login form -->
     
     <div class="well">
      <?php 
            if(isset($_SESSION['user_role'])){
                
                echo "<h3 class='text-center'>Welcome  "."<strong >".$_SESSION['username']."</strong>"."</h3>";
                
            }else{
                
                ?>
                
            <div class="alert alert-info">
            <strong>LOGIN here</strong>
            </div>
          
            <form action="includes/login.php" method="post">
                <div class="form-group">
                  <label for="username">User Name:</label>
                  <input type="text" class="form-control" id="email" placeholder="Enter username" name="username" required>
                </div>
                <label for="pwd">Password:</label>
                <div class="input-group">
                  
                  <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="user_password" required>
               
                    <span class="input-group-btn">
                      <button type="submit" class="btn btn-primary" name="login">Submit</button>
                    </span>
                </div> 
            </form>
                
                
                
                <?php        
            }
     
     
        ?>
      
       
          
           
      </div>
   <!--       login form ends -->    
       
       
        
                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <form action="search.php" method="post">
                    
                    
                    <div class="input-group">
                        <input type="text" class="form-control" name="search">
                        <span class="input-group-btn">
                            <button class="btn btn-primary" type="submit" name="submit">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </span>  
                    </div>
                    </form>
                    <!-- /.input-group -->
                </div>
                
                
                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">        
                
                
            <?php
                    
                    $sql = "SELECT * FROM `categories`";
                    $select_categories_sidebar = mysqli_query($connection, $sql);
                    
                    while($row = mysqli_fetch_assoc($select_categories_sidebar)){
                      
                        $categories = $row['cat_title'];
                        $category_id = $row['cat_id'];
                           
                      echo "<li><a href='category.php?category=$categories'>{$categories}</a></li>";
                     
                    }
                    
             ?>
          
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <?php include 'widget.php';?>