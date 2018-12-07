<?php
#verifie que le titre et le contenu existent et ne sont pas trop long
if (isset($_POST['titre']) AND isset($_POST['contenu'])) {
    if (is_string($_POST['titre']) AND strlen($_POST['titre']) < 40)
        $titre = $_POST['titre'];
    else
        echo ' Votre nom est trop long, veuillez rentrer un nom moins long';

    if (is_string($_POST['contenu']) AND strlen($_POST['contenu']) < 250)
        $contenu = $_POST['contenu'];
    else
        echo 'Votre commentaire doit faire moins de 255 caractères';

    if (strlen($titre) == 0 OR strlen($contenu) == 0) {

        echo 'Vous n\'avez pas rempli un des champs';
        header('Location:add_billet.php');
        exit();
    }
}

include("../Repeat/connection_BDD.php");

?>