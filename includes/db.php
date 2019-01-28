<?php

$db['db_host'] = 'localhost';
$db['db_user'] = 'root';
$db['db_password'] = '';
$db['db_name'] = 'blog_CMS';

foreach($db as $key => $value){
    
    define(strtoupper($key),$value);
    //echo strtoupper($key)."=>".$value."<br>";
}

 $connection =   mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
    
 if($connection){
     
     echo "database connected";
 }    

?>