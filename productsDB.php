<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css"  >
    <title>Home page</title>
</head>
</html>
<?php

$pdo = new PDO("mysql:host=localhost;dbname=ecom","root","");

echo "<h1>Gestion des produits</h1>"; 
session_start();
if(!isset($_SESSION['admin'])){
	header("location:login.php");
}
if(isset($_SESSION['admin'])){
	    $query = "SELECT * FROM produits";
		$stmt = $pdo->query($query);
		$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
 ?>

</div>
<div class="text-center">
<a href="index.php" class="btn btn-primary ">Page d'acceuil</a>

<a href="addProduct.php"><button class="btn btn-success">Ajouter un produit</button></a>
</div><br>
<table class="table table-stripped">
	<thead>
		<tr>
			<th>TYPE</th>
			<th>REFERENCE</th>
			<th>DESIGNATION</th>
			<th>PRIX NORMAL</th>
			<th>PRIX PROMO</th>
			<th>DELETE</th>
			<th>MODIFY</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($rows as $row ){ ?>
			<tr>
			<td><?= $row['type'] ?></td>
			<td><?= $row['reference'] ?></td>
			<td><?= $row['designation'] ?></td>
			<td><?= $row['prixNormal'] ?></td>
			<td><?= $row['prixPromo'] ?></td>			
			<td><a href="<?php echo "delete.php?ref=".$row['reference'] ?>"><button class="btn btn-danger" id="deleteButton">Supprimer</button></a></td>
			<td><a href="<?php echo "modify.php?ref=".$row['reference'] ?>"><button class="btn btn-info" id="modifyButton">Modifier</button></a></td>
			</tr>
		<?php }?>
	</tbody>
</table>
<?php 
}

 ?>
<script src="node_modules/jquery/dist/jquery.slim.min.js" ></script>
<script src="node_modules/popper.js/dist/popper.min.js"  ></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    