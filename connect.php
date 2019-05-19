<?php

$pdo = new PDO("mysql:host=localhost;dbname=ecom","root","");

if(isset($_POST['email']) && isset($_POST['pass'])){
	$login = htmlentities($_POST['email']);
	$pass = htmlentities($_POST['pass']);

	if(filter_var($login , FILTER_VALIDATE_EMAIL)){
		header("location : login.php");
	}
	
	$sql = "SELECT * FROM users WHERE email='$login' and password='$pass' and level=0";
	if($stmt = $pdo->query($sql)){
			$count = $stmt->fetchColumn();
			session_start();
		if($count > 0){
			$_SESSION['admin'] = "true";
			header("location:productsDB.php");
		}else{
			$_SESSION['error'] = "Username ou mot de passe erroné";
			header("location:login.php");
		}
	}else{
		echo "error in query";	
	}
}


?>