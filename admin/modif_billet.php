<?php
include "../header.php";
#récupére l'id du commentaire

if (isset($_GET['id']))
{
    $id = $_GET['id'];
}

include("../Repeat/connection_BDD.php");

#affiche le billets en  fonction de l'id

$billets = $bdd->prepare('SELECT titre,contenu,DATE_FORMAT(date_creation, \' le %d/%m/%Y à %Hh%imin%ss\') AS date_creation FROM billets WHERE id=:id');
$billets->execute(array(
    "id" => $id
));

$donnees=$billets->fetch();

// Si une personnne change l'id dans l'url il aura un message d'erreur
if (empty($donnees))
{
    echo 'Ce billet n\'existe pas';
}

else {
    ?>
    <h1>Mon blog! </h1>
    <?php
    echo '<h3>' . htmlspecialchars($donnees['titre']) . ' ' . $donnees['date_creation'] . '</h3><p class="news">' . nl2br(htmlspecialchars($donnees['contenu'])) . '</p> <br />';

    $billets->closeCursor();


    ?>
    <div><h4> Modifier le billet</h4>
        <form method="post" action="bdd_billet.php">
            <input type="text" name="titre" placeholder="Modifier le titre "><br/><br/>
            <textarea name="contenu" rows="5" cols="20" placeholder="Modifier le contenu"></textarea><br/>
            <input type="submit" value="Envoyer">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <input type="hidden" name="action" value="modifier">

        </form>
    </div>
    <?php
}
?>
</body>
</html>


