<?php
require "configuration.php";
require "accesseur/ProduitDAO.php";
$listeProduits = ProduitDAO::listerProduits();


$etatBouton = "submit";

if(empty($_SESSION['utilisateur'])){
          $etatBouton = "hidden";                     
  }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<title><?=_("Boutique du Cégep de Matane")?></title>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="./decoration/magasiner.css">
  <script src="Js/Produit.js"></script>
  <script src="Js/Ajax.js" defer></script>
</head>
<body>
	<?php include 'menu.php' ?>

  	<div>
  		<h1 class="magasiner_titre"><?=_("Liste des items à vendre")?></h1>
  	</div>

    <div class="barre-de-recherche-contenant">
        <input type="text" name="barre-de-recherche" id="barre-de-recherche" placeholder="Rechercher un produit"/>
    </div>
    
  	<ul class="magasiner_liste">
  	<?php

            foreach($listeProduits as $produit)
            {        
                ?>
                    <li class="magasiner_items">
                        <div class="magasiner_div_image_cliquable">
                            <a href="detailler-produit.php?id=<?=$produit->id;?>" title = "appuyez pour le détail" class="magasiner_image_cliquable">
                                <img src="./ressources/images/<?=$produit->image;?>"  alt="logo-item" class="magasiner_image_cliquable">
                            </a>
                        </div>
                        
                        <h3 class="titre"><?=$produit->titre;?></h3>
                        <span class="magasiner_description_item"><?=_("n° article :")?><?=$produit->id;?> | <?=_("Prix :")?> <?=$produit->prix;?>$</span>
                        <form class="acheter-produit" action="paiement.php" method="POST" enctype="multipart/form-data">
                          <input type="hidden" name="titre" value="<?=$produit->titre;?>" />
                          <input type="hidden" name="prix" value="<?=$produit->prix;?>" />
                          
                          <?php                        

                          if(!empty($_SESSION['utilisateur'])){
                            echo "<input type=\"submit\" value=\"Acheter\">";                    
                              }                          
                          ?>
                        </form>
                    </li>

                <?php
            }
        ?>
    </ul>

  <?php include 'footer.php' ?>

</body>
</html>








