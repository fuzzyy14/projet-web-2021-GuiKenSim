<?php
require "accesseur/UtilisateurDAO.php";
header('Content-type: application/xml');
echo '<?xml version="1.0" encoding="ISO-8859-1"?>';
$erreurs= array();
$valides= array();

$pseudoRequete = "";
if(isset($_POST['pseudo'])){
	$pseudoRequete = $_REQUEST['pseudo'];
	$utilisateurRecupere = UtilisateurDAO::recupUtilisateurParPseudo($pseudoRequete);
	if($utilisateurRecupere != "utilisateur non existant"){
		$erreurs[]= "Le pseudo existe deja";
	}
	else{
		$valides[]= "Le pseudo est disponible";
	}

}

$courrielRequete = "";
if(isset($_POST['courriel'])){
	$courrielRequete = $_REQUEST['courriel'];
	$courrielRecupere = UtilisateurDAO::testCourrielExistant($courrielRequete);
	if($courrielRecupere != "courriel non existant"){
		$erreurs[]= "Le courriel existe deja";
	}
	else{
		$valides[]= "Le courriel est disponible";
	}

}



?>
<verification>
	<erreurs>
	<?php

		foreach($erreurs as $erreur)
		{
			?>
			<erreur><?=$erreur?></erreur>
			<?php
		}
		
	?>
	</erreurs>
	<valides>
	<?php

		foreach($valides as $valide)
		{
			?>
			<valide><?=$valide?></valide>
			<?php
		}
	?>
	</valides>
</verification>