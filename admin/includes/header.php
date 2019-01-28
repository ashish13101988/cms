<?php ob_start();?>
<?php include '../includes/db.php'?>
<?php session_start();?>

<?php
    
    if(!isset($_SESSION['user_role'])){
        
            header('location: ../index.php');
        }
    else{
        
        if($_SESSION['user_role'] !== 'admin'){
            
            header('location: ../index.php');
        }
    }   
    
    


?>

<?php
        $session = session_id();
        $time = time();
        $time_out_in_seconds =  60;
        $time_out = $time - $time_out_in_seconds;
        
        $sql = "SELECT * FROM users_online WHERE user_session = '$session'";
        $send_query = mysqli_query($connection,$sql);
        $count = mysqli_num_rows($send_query);
        
        if($count == null){
            
        mysqli_query($connection,"INSERT INTO `users_online`(`user_session`, `time`) VALUES ('$session', $time)");
            
            
        }
        else{
            
            mysqli_query($connection,"UPDATE `users_online` SET `time`='$time' WHERE `user_session`= '$session'");
        }
        
        $user_online_query  = mysqli_query($connection,"SELECT * FROM users_online WHERE time > $time_out");
        $count_user = mysqli_num_rows($user_online_query);
?>      


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin -Admin Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet" type="text/css">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
        
   
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    
    <!--    CKEditor 5 cdn-->
    <<script src="https://cdn.ckeditor.com/ckeditor5/11.1.1/classic/ckeditor.js"></script>
   
    
    
</head>

<body>
   