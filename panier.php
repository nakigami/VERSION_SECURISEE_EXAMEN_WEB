<?php
if(isset($_GET['ref'])):

$pdo = new PDO("mysql:host=localhost;dbname=ecom" , "root","");
$ref = htmlentities($_GET['ref']);
$sql="SELECT * from produits where reference=$ref";

$stmt = $pdo->prepare($sql);
$results;

$_SESSION["panier"]["1"]=1;
foreach($_SESSION["panier"] as $ref => $qte){
    $stmt->execute(array($ref));
    $produit=$stmt->fetch(PDO::FETCH_ASSOC);
    $li["reference"] =  $produit["reference"];
    $li["designation"] =  $produit["designation"];
    $li["qte"] =  $qte;
    if($produit["prixPromo"] == 0){
        $li["total"] =  $qte * $produit["prixNormal"];
    }else{
        $li["total"] =  $qte * $produit["prixPromo"];
    }
    $results[]=$li;
}
?>
<table class="table">
    <tr>
    <th>reference</th>
    <th>designation</th>
    <th>qte</th>
    <th>total</th>
    </tr>
    <?php if(isset($results)):
        foreach($results as $row):
    ?>
            <tr>
            <td><?= $row["reference"]?></td>
            <td><?=$row["designation"]?></td>
            <td><?=$row["qte"]?></td>
            <td><?=$row["total"]?></td>
            </tr>
        <?php  endforeach;
        endif;
    endif;
        ?>
</table>