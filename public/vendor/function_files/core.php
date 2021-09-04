<?php
function getSiteDetails($data) {
	include ("dbInit.php");
	$sql = "SELECT * FROM settings";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	return $row[$data];
}
function getUserFullName($user_id){
	include('dbInit.php');
	$sql = "SELECT * FROM users WHERE user_id = $user_id";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	return $row['user_full_name'];
}
function editSiteSettings($siteTitle, $contactEmail, $topBarTheme, $sideBarTheme, $version, $filePath /*, $yourExtraVariables */){
	include 'dbInit.php';
	//Escape the inputs
	$siteTitle = mysqli_real_escape_string($conn, $siteTitle);
	$contactEmail = mysqli_real_escape_string($conn, $contactEmail);
	$topBarTheme = mysqli_real_escape_string($conn, $topBarTheme);
	$sideBarTheme = mysqli_real_escape_string($conn, $sideBarTheme);
	$version = mysqli_real_escape_string($conn, $version);
	$filePath = mysqli_real_escape_string($conn, $filePath);
//	$additionalInput = mysqli_real_escape_string($conn, $additionalInput); - Should always be escaped
	$sql = "UPDATE settings
				SET
					siteTitle = '$siteTitle',
					contactEmail = '$contactEmail',
					topBarTheme = '$topBarTheme',
					sideBarTheme = '$sideBarTheme',
					VERSION = '$version',
					filePath = '$filePath'
				WHERE
					id = 1
				";
	$result = mysqli_query($conn, $sql);
	if(!$result){
		$return = 0;
	}else{
		$return = 1;
	}
	return $return;
}
function siteLogo(){
	include ("dbInit.php");
	$sql = "SELECT * FROM settings";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	if($row['filePath'] != 'null'){
		$logoPath = 'uploads/'.$row['filePath'];
		$logoPath = "<img src = '$logoPath' height = '40'>";
		if(file_exists('uploads/'.$row['filePath'])){
			$logoPath = $logoPath;
		}else{
			$logoPath = $row['siteTitle'];
		}
	}else{
		$logoPath = $row['siteTitle'];
	}
	return $logoPath;
}
