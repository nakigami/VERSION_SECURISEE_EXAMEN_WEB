<?php 
$pdo = new PDO("mysql:host=localhost;dbname=ecom","root","");

session_start();
if(isset($_GET['ref']) && isset($_SESSION['admin']))
{
	$ref = htmlentities($_GET['ref']);
	$sql = "DELETE FROM produits WHERE reference =?";
	$stmt = $pdo->prepare($sql);
	$stmt->bindValue(1 , $ref);
	$stmt->execute();
	header("location:productsDB.php");
}
 ?>
