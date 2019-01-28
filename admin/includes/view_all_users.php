
 <?php

    if(isset($_SESSION['user_role'])){
        
        
        if($_SESSION['user_role']=="admin"){
           
            
            if(isset($_GET['delete'])){
                
                $delete_users = mysqli_real_escape_string($_GET['delete']);
                
                $sql = "DELETE FROM `users` WHERE `users`.`user_id`= $delete_users";

                $delete_result = mysqli_query($connection,$sql);
        
                if(!$delete_result){

                    die("Query failed".mysqli_error($connection));
                    
                }
                else{

                    echo "<script>alert('User has been remove successfully.')</script>";
                }
        
        }
            
        }
    }


    
?>      

                
                  
                    
          <table class="table table-hover table-bordered table-condensed table-striped">
               <thead>
                   <tr>
                       <th>Id</th>
                       <th>Image</th>
                       <th>User Name</th>
                       <th>First Name</th>
                       <th>Last Name</th>
                       <th>Email</th>
                       <th>Role</th>
                       <th>Admin</th>
                       <th>Subscriber</th>
                       <th><i class="fa fa-pencil" ></i></th>
                       <th><i class="fa fa-trash" ></i></th>
                   </tr>
               </thead>
               <tbody>
        <?php
         $sql= "SELECT * FROM `users` ";
                 
         $select_posts = mysqli_query($connection, $sql);
          
                  
                 
         
        while($row = mysqli_fetch_assoc($select_posts)){
            
            $user_id = $row['user_id'];
            $username = $row['username'];
            $user_firstname = $row['user_firstname'];
            $user_lastname = $row['user_lastname'];
            $user_email = $row['user_email'];
            $user_image = $row['user_image'];
            $user_role = $row['user_role'];
            
                
        ?>          
                  
                  
                   <tr>
                       <td><?php echo $user_id ;?></td>
                       <td>
                           <img src="../images/<?php echo $user_image ;?>" alt="" class="img-responsive" width="150px">
                       
                       </td>
                       <td><?php echo $username;?></td>
                       <td><?php echo $user_firstname ;?></td>
                       <td><?php echo $user_lastname;?></td>
                       <td><?php echo $user_email;?></td>
                       <td><?php echo ucfirst($user_role) ;?></td>
                       
                       
<!--            changing users role query           -->
                  
           <?php
            
            if(isset($_GET['change_to_admin'])){
                
               $the_user_id = $_GET['change_to_admin'];
             
                
                $sql = "UPDATE `users` SET `user_role` = 'admin' WHERE `users`.`user_id` = $the_user_id";
                
                $change_role = mysqli_query($connection,$sql);
                
                header('location:users.php');
            }
               
            if(isset($_GET['change_to_subscriber'])){
                 $the_user_id = $_GET['change_to_subscriber'];
                 $sql = "UPDATE `users` SET `user_role` = 'subscriber' WHERE `users`.`user_id`= $the_user_id";
                 $change_role = mysqli_query($connection,$sql);
                 header('location:users.php');
            }
                     
                    
           ?>     

                <td>  
                     <a href="users.php?change_to_admin=<?php echo $user_id?>" title="Admin" >Admin</a>
                  </td>
                   <td>   
                        <a href="users.php?change_to_subscriber=<?php echo $user_id?>" title="subscriber">Subscriber</a>
                    </td>
                       
                       
                      
                       
                       <td>
                           <a href="users.php?source=edit_user&edit_id=<?php echo $user_id ;?>">
                               <i class="fa fa-pencil" style="color:blue;"></i>
                             </a>  
                        </td>
                       <td >
                         <a onclick="javascript: return confirm('Do you want to delete user?');"
                         href="users.php?delete=<?php echo $user_id;?>">
                          <i class="fa fa-trash" style="color:red;"></i></a>
                       </td>
                       
                  </tr>
       <?php           
         }           
          ?>           
               </tbody>
           </table>
          