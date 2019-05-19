<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css"  >
    <title>Home page</title>
</head>
<?php

$pdo = new PDO("mysql:host=localhost;dbname=ecom" , "root" ,"");
$query = "SELECT * FROM produits ";
$ref = htmlentities($_GET['ref']);
$query = $query."WHERE reference = $ref";
$stmt = $pdo->query($query);
$res = $stmt->fetch(PDO::FETCH_ASSOC);

if(isset($_POST['updateBtn'])){
    $pdo = new PDO("mysql:host=localhost;dbname=ecom" , "root","");
       $query = "UPDATE  produits  SET type=?,reference=?,designation=?,prixNormal=?,prixPromo=? WHERE reference=?" ;
       $type = htmlentities($_POST['type']);
       $ref = htmlentities($_POST['reference']);
       $des = htmlentities($_POST['designation']);
       $prixN = htmlentities($_POST['prixNormal']);
       $prixP = htmlentities($_POST['prixPromo']);
       
       $stmt = $pdo->prepare($query);
       $stmt->bindValue(1 , $type);
       $stmt->bindValue(2 , $ref);
       $stmt->bindValue(3,  $des);
       $stmt->bindValue(4 , $prixN);
       $stmt->bindValue(5,  $prixP);
       $stmt->bindValue(6 , $ref);
       $stmt->execute();
    header("location:productsDB.php");
}
?>

<div class="container">


<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="type">Type</label>
        <input type="text" class="form-control" name="type"  value="<?= $res['type'] ?>">
    </div>
    <div class="form-group">
        <label for="type">Réference</label>
        <input type="text" class="form-control" name="reference" value="<?= $res['reference'] ?>">
    </div>
    <div class="form-group">
        <label for="type">Désignation</label>
        <input type="text" class="form-control" name="designation" value="<?= $res['designation']?>">
    </div>
    <div class="form-group">
        <label for="type">Prix Normal</label>
        <input type="text" class="form-control" name="prixNormal" value="<?= $res['prixNormal'] ?>">
    </div>
    <div class="form-group">
        <label for="type">Prix Promo</label>
        <input type="text" class="form-control" name="prixPromo" value="<?= $res['prixPromo'] ?>">
    </div>
    <input type="submit" class="btn btn-primary" name="updateBtn" value ="Mettre à jour">
</form>
</div>
