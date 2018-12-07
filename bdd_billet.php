<?php

if (isset($_GET['action']))
{ // alors on supprime le billet

    {
        include("Repeat/connection_BDD.php");
        $id = (int) $_GET['id'];
        $suppr_commentaire = $bdd->prepare('DELETE FROM billets WHERE id=:id ')or die(print_r($bdd->errorInfo()));

        $suppr_commentaire->bindValue('id', $id, PDO::PARAM_INT);
        $suppr_commentaire->execute();

        $suppr_commentaire->closeCursor();

        include("add_billet.php");
    }
}
elseif (isset($_POST['action']) AND $_POST['action'] == 'ajouter') {

    include 'valider_billet.php';

#ajouter un billet

    $add_commentaire = $bdd->prepare('INSERT INTO billets(titre, contenu,date_creation) VALUES (:titre, :contenu, NOW()) ');


    $add_commentaire->bindValue('titre', $titre, PDO::PARAM_STR);
    $add_commentaire->bindValue('contenu', $contenu, PDO::PARAM_STR);

    $add_commentaire->execute();

    $add_commentaire->closeCursor();

    include("add_billet.php");
}
else{ // on modifie le billet
    include 'valider_billet.php';

    $id = (int) $_POST['id'];

    $modif_commentaire = $bdd->prepare('UPDATE billets SET titre=:titre,contenu=:contenu WHERE id=:id_billet ');

    $modif_commentaire->bindValue('id_billet', $id, PDO::PARAM_STR);
    $modif_commentaire->bindValue('titre', $titre, PDO::PARAM_STR);
    $modif_commentaire->bindValue('contenu', $contenu, PDO::PARAM_STR);

    $modif_commentaire->execute();

    $modif_commentaire->closeCursor();

    include("add_billet.php");
}

?>