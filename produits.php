<?php

$pdo = new PDO("mysql:host=localhost;dbname=ecom" , "root","");

$query = "SELECT * FROM produits ";

 if(isset($_GET["type"]))
     $query=$query . " where type like".htmlentities($_GET["type"]);
 $stmt = $pdo->query($query);
 $produits = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
