<?php
include "header.php";
#récupére l'id du commentaire

if (isset($_GET['id']))
{
    $id = $_GET['id'];
}

include("Repeat/connection_BDD.php");

#affiche le billets et ses commentaires en fonction de l'id

$billets = $bdd->prepare('SELECT titre,contenu,DATE_FORMAT(date_creation, \' le %d/%m/%Y à %Hh%imin%ss\') AS date_creation FROM billets WHERE id=:id');
$billets->execute(array(
    "id" => $id
));

$commentaires = $bdd->prepare('SELECT auteur,commentaires,DATE_FORMAT(date_commentaire, \' le %d/%m/%Y à %Hh%imin%ss\') AS date_commentaire FROM commentaires WHERE id_billet=:id GROUP BY id DESC LIMIT 0,5');
$commentaires->execute(array(
    "id" => $id
));


$donnees=$billets->fetch();


if (empty($donnees))
{
    echo 'Ce billet n\'existe pas';
}
else {
    ?>
    <h1>Mon blog! </h1>
    <?php
    echo '<h3>' . htmlspecialchars($donnees['titre']) . ' ' . $donnees['date_creation'] . '</h3><p class="news">' . nl2br(htmlspecialchars($donnees['contenu'])) . '</p> <br />';

    echo '<h2>COMMENTAIRES</h2>';
    while ($donneesComment = $commentaires->fetch()) {
        echo htmlspecialchars($donneesComment['auteur']) . $donneesComment['date_commentaire'] . '<br />' . nl2br(htmlspecialchars($donneesComment['commentaires'])) . '<br/><br/>';
    }

    $billets->closeCursor();
    $commentaires->closeCursor();

    ?>
    <div><h4> Ajouter un commentaire =D</h4>
        <form method="post" action="add_comentaire.php">
            <input type="text" name="autheur" placeholder="Indiquer votre nom"><br/><br/>
            <textarea name="commentaire" rows="5" cols="20" placeholder="N'éhsitez pas à commenter mon post"></textarea><br/>
            <input type="submit" value="Envoyer">
            <input type="hidden" name="id" value="<?php echo $id ?>">
        </form>
    </div>
    <?php
}
?>
</body>
</html>
