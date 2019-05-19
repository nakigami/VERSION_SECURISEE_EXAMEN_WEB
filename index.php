<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css"  >
    <title>Document</title>
</head>
<body>
<?php 
require("session.php");
require("produits.php");
    
?>

<div class="container my-5">
  <div class="text-center">
    <a class="btn btn-success" href="productsDB.php" style="color : white;">Gestion des produits</a> 
  </div>
  <br>
<div class="row">
  <?php foreach($produits as $produit ):?>
    <div class="col-md-6 col-lg-4">
    <div class="card" style="height:450px !important;">
      <img src="<?="images/".$produit['type'].'/'.$produit['photo']?>" class="card-img-top" alt="..." style="height:400px !important;width:300px !important;">
      <div class="card-body">
        <h5 class="card-title"><?= htmlentities($produit['designation'], ENT_QUOTES | ENT_HTML5, 'UTF-8'); ?></h5>
        <p class="card-text"><small class="text-muted outlined" style="text-decoration: line-through;"><?= htmlentities($produit['prixNormal'] , ENT_QUOTES | ENT_HTML5, 'UTF-8');?></small></p>
        <p class="card-text"><small class="text-muted" ><?=htmlentities($produit['prixPromo'] , ENT_QUOTES | ENT_HTML5, 'UTF-8'); ?></small></p>
        <a href="panier.php?ref= <?= htmlentities($produit['reference'] , ENT_QUOTES | ENT_HTML5, 'UTF-8'); ?>" class="btn btn-primary" >Ajouter au panier</a>
        </form>
      </div>
    </div>
  </div>
<?php endforeach;?>
</div>
</div>
    <div class="container my-5">
    <?php require("panier.php") ?>
    </div>
<script src="node_modules/jquery/dist/jquery.slim.min.js" ></script>
<script src="node_modules/popper.js/dist/popper.min.js"  ></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>