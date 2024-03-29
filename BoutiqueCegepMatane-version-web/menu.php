<?php   
    require_once "./modele/Utilisateur.php";
    
    if(!isset($_SESSION)){
        session_start();
    }   

    if(empty($_SESSION["utilisateur"])){
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

    $racine = "./locale";
    $domaine = "messages";

    if(!isset($_SESSION["langue"])){
        $_SESSION["langue"] = "en";
    }    

    if(isset($_POST["bouton_langue"])){        
        if($_SESSION["langue"] == "en") { 

            $_SESSION["langue"] = "fr";        
        }
        else { 

            $_SESSION["langue"] = "en";                 
        }
    }   

      if($_SESSION["langue"] == "fr") { 
            //print_r("FR choisi");
            $locale = "en_CA.UTF-8"; 
            putenv('LC_ALL='.$locale);
            setlocale(LC_ALL, $locale);
            bindtextdomain($domaine, $racine);
            textdomain($domaine);         
        }
        else { 
            //print_r("EN choisi");
            $locale = "fr_CA.UTF-8"; 
            putenv('LC_ALL='.$locale);
            setlocale(LC_ALL, $locale);
            bindtextdomain($domaine, $racine);
            textdomain($domaine);                
        } 

?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<title> <?=_("Boutique du Cégep de Matane")?> </title>
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
	         <a href="index.php" class="bouton-menu"> <?=_("Accueil")?> </a>
	         <a href="magasiner.php" class="bouton-menu"> <?=_("Magasiner")?> </a>
             <?php echo $bouton_administration?>
	         <a href="apropos.php" class="bouton-menu"> <?=_("À Propos de nous")?> </a>
             <?php echo $bouton_utilisateur ?>
             
             <form method="post"> 
                <input type="submit" name="bouton_langue" value="<?=$_SESSION["langue"]?>"/>   
             </form>   
        </div>
  	</header>
</body>