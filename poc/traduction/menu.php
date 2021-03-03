<?php
    require_once "./modele/Utilisateur.php";

    $langue = "fr";
    
    if(!isset($_SESSION)){
        session_start();
    }
    //session_sart();
    if(empty($_SESSION)){
        $bouton_utilisateur ='<a href="connexion.php" class="bouton-menu"> Connexion </a>';
        $bouton_administration ="";
    }
    else{
        $bouton_utilisateur ='<a href="profil.php" class="bouton-menu"> Profil </a>';
        if($_SESSION["utilisateur"]->getPseudo() == "simon" || $_SESSION["utilisateur"]->getPseudo() == "guillaume" || $_SESSION["utilisateur"]->getPseudo() == "kenny" ){
            $bouton_administration ='<a href="./administration/administration-accueil.php" class="bouton-menu"> Administration </a>';
        }
        else{
            $bouton_administration ="";
        }
    }    

    if($_POST['bouton_langue'] == "fr") { 
        print_r("FR choisi");
        $locale = "fr_CA.UTF-8"; 

        $racine = "./locale";
        $domaine = "messages";

        putenv('LC_ALL='.$locale);
        setlocale(LC_ALL, $locale);

        bindtextdomain($domaine, $racine);
        textdomain($domaine);

        $langue = "en";
    } 
    if($_POST['bouton_langue'] == "en") { 
        print_r("EN choisi");
        $locale = "en_CA.UTF-8"; 

        $racine = "./locale";
        $domaine = "messages";

        putenv('LC_ALL='.$locale);
        setlocale(LC_ALL, $locale);

        bindtextdomain($domaine, $racine);
        textdomain($domaine);

        $langue = "fr";
    } 
    
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<title> <?= gettext("Boutique du Cégep de Matane")?> </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="./decoration/menu.css">
</head>
<body>
	<header class="menu">
    	<div class="logo-menu">    
	        <a href="index.php"><img src="./ressources/images/logo_cegep.png" alt="Logo Cégep Matane"/></a>	        
    	</div>
        <div class="menu-navigation">
	         <a href="index.php" class="bouton-menu"> <?= gettext("Accueil")?> </a>
	         <a href="magasiner.php" class="bouton-menu"> <?= gettext("Magasiner")?> </a>
             <?php echo $bouton_administration?>
	         <a href="apropos.php" class="bouton-menu"> <?= gettext("À Propos de nous")?> </a>
             <?php echo $bouton_utilisateur ?>
             
             <form method="post"> 
                <input type="submit" name="bouton_langue" class="button" value="<?=$langue?>"/>                 
             </form> 

        </div>
  	</header>
</body>