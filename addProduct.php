<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css"  >
    <title>Home page</title>
</head>
<body>
<?php


session_start();
if(!isset($_SESSION['admin'])){
    header("location:login.php");
}

if(isset($_POST['addProductBtn'])){
       $type = htmlentities($_POST['type']);
       $ref = htmlentities($_POST['reference']);
       $des = htmlentities($_POST['designation']);
       $prixN = htmlentities($_POST['prixNormal']);
       $prixP = htmlentities($_POST['prixPromo']);

       $pdo = new PDO("mysql:host=localhost;dbname=ecom" , "root","");
       $query = "INSERT INTO produits VALUES(?,?,?,?,?,?)" ;
       $stmt = $pdo->prepare($query);
       $stmt->bindValue(1 , $type);
       $stmt->bindValue(2 , $ref);
       $stmt->bindValue(3,  $des);
       $stmt->bindValue(4 , $prixN);
       $stmt->bindValue(5,  $prixP);
       $stmt->bindValue(6 , $_FILES['photo']['name']);
       
       $target_folder = "images/";
       $target_file = $target_folder.$_FILES['photo']['name'];

		move_uploaded_file($_FILES['photo']['tmp_name'] , $target_file);
       $stmt->execute();
       header("location:productsDB.php");
}

?>

<div class="container">

<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="type">Type</label>
        <input type="text" class="form-control" name="type" required >
    </div>
    <div class="form-group">
        <label for="type">Réference</label>
        <input type="text" class="form-control" name="reference" required>
    </div>
    <div class="form-group">
        <label for="type">Désignation</label>
        <input type="text" class="form-control" name="designation" required>
    </div>
    <div class="form-group">
        <label for="type">Prix Normal</label>
        <input type="text" class="form-control" name="prixNormal" required>
    </div>
    <div class="form-group">
        <label for="type">Prix Promo</label>
        <input type="text" class="form-control" name="prixPromo" required>
    </div>
    <div class="form-group">
        <input type="file" class="form-control" name="photo" required>
    </div>
    <input type="submit" class="btn btn-primary" name="addProductBtn" value ="Inserer">
</form>

</div>



<script src="node_modules/jquery/dist/jquery.slim.min.js" ></script>
<script src="node_modules/popper.js/dist/popper.min.js"  ></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    
</body>
</html>
