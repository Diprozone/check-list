<?php

try {
    $bdd = new PDO('mysql:host=mysql-axelamghar.alwaysdata.net;dbname=axelamghar_a;charset=utf8', '167450_user', 'user', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e){
    die ('Erreur:'.$e->getMessage());
}

?>