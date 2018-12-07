<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Blog</title>
    <link rel="stylesheet" type="text/css" href="<?php
    $path= '/blog/admin/';
    $pagencours= $_SERVER['PHP_SELF'];
    if ( $pagencours == $path."add_billet.php" OR $pagencours == $path."bdd_billet.php" OR $pagencours == $path."modif_billet.php")
    {echo '../style.css';}
    else
        echo 'style.css';
    ?>" media="all"/>

</head>
<body>

<!-- menu -->
<nav>
    <ul>
        <li><a href="<?php
            if ( $pagencours == $path."add_billet.php" OR $pagencours == $path."bdd_billet.php" OR $pagencours == $path."modif_billet.php")
            {echo '../index.php';}
            else
                echo 'index.php';
            ?>">acceuil</a> </li>
        <li><a href="<?php
            if ( $pagencours == $path."add_billet.php" OR $pagencours == $path."bdd_billet.php" OR $pagencours == $path."modif_billet.php")
            {echo 'add_billet.php';}
            else
                echo 'admin/add_billet.php';


        ?>">admin</a> </li>
    </ul>
</nav>

<?php
?>