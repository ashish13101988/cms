<?php

	if(!$db_con){

		echo "database not connected";
	}
	
	//helper functions
	function redirect($location){

		header("location:$location");

	}

	function query($sql){

		global $db_con;

		return mysqli_query($db_con,$sql);
	}

	function confrim($result){

		global $db_con;

		if(!$result){

			die("Query failed".mysqli_error($db_con));
		}
	}

	function escape_string($string){

		global $db_con;

		return mysqli_real_escape_string($db_con,$string);
	}

	function fetch_array($result){

		return mysqli_fetch_assoc($result);
	}
//set message function

	function set_msg($msg){

		if(!empty($msg)){

			$_SESSION['message'] = $msg;
		}else{

			$msg = "";
		}
	}

//displaying function

	function display_msg(){

		if(isset($_SESSION['message'])){

			echo $_SESSION['message'];
			unset($_SESSION['message']);
		}
	}


/******************************************FRONT END FUNCTIONS***********************************/

?>