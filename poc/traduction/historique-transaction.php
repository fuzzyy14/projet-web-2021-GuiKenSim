<?php

require "accesseur/TransactionDAO.php";
$pseudoUtilisateursession = $_SESSION['utilisateur']->getPseudo();

$listeTransaction = TransactionDAO::listerTransactionParPseudo($pseudoUtilisateursession);

?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<title><?=_("Boutique du Cégep de Matane")?></title>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="decoration/historique-transaction.css">
</head>
<body>

    <div class="contenu-page-transaction">
        <div class="contenu-titre">
            <h1><?=_("Mon Historique de transaction")?></h1>
        </div>
        <div class="contenu-tableau">
            <h2><?=_("Mes Achats")?></h2>
            <table class="tableau">
                <tr class="titre-colonne">
                    <th><?=_("Numéro de Commande")?></th>
                    <th><?=_("Date de transaction")?></th>
                    <th><?=_("Prix")?></th>
                    <th><?=_("Facture")?></th>
                </tr>

            <?php
            foreach($listeTransaction as $transaction)
            {    
            ?>
                <tr>
                    <td><?=$transaction->getId()?></td>
                    <td><?=$transaction->getdate()?></td>
                    <td><?=$transaction->getPrix()?></td>
                    <td><a href="./facture/<?=$transaction->getNom_facture()?>.pdf"><?=$transaction->getNom_facture()?></a></td>
                </tr> 
                <?php
                }
                ?>
            </table>
        </div>
        
    </div>

</body>
</html>