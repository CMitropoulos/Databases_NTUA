<?php

$username = $_POST['username'];
$password = $_POST['password'];
header (' Location: home.html');

if (($username == "ntuadb") and ($password == "db2")){
	
	session_start();
    	$_SESSION['login'] = 10;
	header ('Location: home.html');
	
}
else{
	header ('Location: login.html');
}
?>
