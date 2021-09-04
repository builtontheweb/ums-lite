<?php
function checkInstallation(){
	include 'dbInit.php';
	if ($dbConn == false){
		$return = 0;
	}else{
		$sql = "SELECT * FROM settings";
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result) > 0){
			$return = 1;
		}else{
			$return = 0;
		}
	}
	return $return;
}