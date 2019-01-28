   <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Blog Nation</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                   
                   <?php
                    
                    $sql = "SELECT * FROM `categories`";
                    $select_categories = mysqli_query($connection, $sql);
                    
                    while($row = mysqli_fetch_assoc($select_categories)){
                      
                        $categories = $row['cat_title'];
                        
                        $category_class = "";
                        
                        $contact_class = "";
                       
                        $pageName = basename($_SERVER['PHP_SELF']);
                        
                        $contact_class ='contact.php';
                       if(isset($_GET['category']) && $_GET['category']== $categories){
                           
                           $category_class = 'active';
                           
                       }elseif($pageName==$contact_class){
                           
                           $contact_class = 'active';
                       }    
                           
                      echo "<li class='$category_class'><a href='category.php?category=$categories'>{$categories}</a></li>";
                     
                    }
                    
                    ?>
                    
                   <li class='<?php echo $contact_class; ?>'><a href='contact.php'>Contact Us</a></li>
                   
                 <?php 
                  
                   
                   if(isset($_SESSION['user_role'])){
                       
                       $userrole = $_SESSION['user_role'];
                       
                            if($userrole == 'admin'){
                                
                                echo "<li><a href='admin'>Admin</a></li>";
                       }
                    
                    }
                  ?>   
<!--        displaying edit post link            -->
                    
    <?php
                
                if(isset($_SESSION['user_role'])){
                    
                    if(isset($_GET['p_id'])){
                       
                    $the_post_id = $_GET['p_id'];
                        
                     echo "<li><a href='admin/posts.php?source=edit_post&edit_id=$the_post_id' style='color:#fff;background:#f44245;'>Edit Post</a></li>"; 
                        
                     
                    }
                }    
                    
    ?>    
                    
                                            
                   
                </ul>
                
        <!-- Top Menu Items -->
        
         <ul class="nav navbar-right navbar-nav"> 
             
         <?php 
                
            if(isset($_SESSION['user_role'])){
               
            ?>
               
               
           
           
               
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" ><span class="glyphicon glyphicon-user"></span> <?php echo ucfirst($_SESSION['username']);?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="glyphicon glyphicon-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="glyphicon glyphicon-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="glyphicon glyphicon-cog"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="includes/logout.php"><i class="glyphicon glyphicon-log-out"></i> Log Out</a>
                        </li>
                        
                    </ul>
                </li>
                   
            
             <?php 
                
            }   
            else{
                ?>
                
                <li><a href="signup.php"><i class="glyphicon glyphicon-user"></i> Sign Up </a></li>       
                     
                
                <?php
            }    
        ?>          
            </ul>         
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>