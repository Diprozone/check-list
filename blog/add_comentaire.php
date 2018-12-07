<?php

#verifie que autheur et commentaire existent et ne sont pas trop long
if (isset($_POST['autheur']) AND isset($_POST['commentaire']) )
{
    $id = (int) $_POST['id'];
    if (is_string($_POST['autheur']) AND strlen($_POST['autheur']) < 20)
    $autheur = $_POST['autheur'];
    else
        echo ' Votre nom est trop long, veuillez rentrer un nom moins long';

    if (is_string($_POST['commentaire']) AND strlen($_POST['commentaire']) < 250)
        $commentaire = $_POST['commentaire'];
    else
        echo 'Votre commentaire doit faire moins de 255 caractères';

    if (strlen($autheur) == 0 OR strlen($commentaire) == 0)
        echo 'Vous n\'avez pas rempli un des champs';
}


include("Repeat/connection_BDD.php");

#ajoute le commentaire dans la BDD

$add_commentaire= $bdd->prepare('INSERT INTO commentaires(id_billet, auteur,commentaires, date_commentaire) VALUES (:id_billet,:autheur, :commentaire, NOW()) ');

$add_commentaire->bindValue('id_billet', $id, PDO::PARAM_INT);
$add_commentaire->bindValue('autheur', $autheur, PDO::PARAM_STR);
$add_commentaire->bindValue('commentaire', $commentaire, PDO::PARAM_STR);

$add_commentaire->execute();

$add_commentaire->closeCursor();

include ("comentaires.php");
?>
