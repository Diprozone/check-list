<?php
include("header.php");
?>

<h1>Mon blog! </h1>
<h2>Les 5 derniers billets :</h2>
<?php

include("Repeat/connection_BDD.php");

#affiche les billets : titre, date, contenu et lien vers les commentaires

$billets = $bdd->query('SELECT id,titre,contenu,DATE_FORMAT(date_creation, \' le %d/%m/%Y à %Hh%imin%ss\') AS date_creation FROM billets GROUP BY id DESC LIMIT 0,5');

while($donnees = $billets->fetch())
{
    echo '<h3>'. htmlspecialchars($donnees['titre']) .' '. htmlspecialchars( $donnees['date_creation']) . '</h3><p class="news">' . htmlspecialchars($donnees['contenu']) ;

    echo '<br/><br/><a href="http://axelamghar.alwaysdata.net/blog/comentaires.php?id=' . htmlspecialchars($donnees['id']) . '">Afficher les commentaires </a></p>';


}
$billets->closeCursor();

?>
</body>
</html>

