<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Clean Blog - Start Bootstrap Theme</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="css/clean-blog.min.css" rel="stylesheet">

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="http://stephanelevin.com/explorations/">Mission Namib</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.html">Bilan sante</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="post.html">Entretien</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.html">mission</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Page Header -->
<header class="masthead" style="background-image: url('img/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1>Clean Blog</h1>
                    <span class="subheading">A Blog Theme by Start Bootstrap</span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">


            <?php
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

        </div>
    </div>
</div>

<hr>

<!-- Footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <ul class="list-inline text-center">
                    <li class="list-inline-item">
                        <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fas fa-circle fa-stack-2x"></i>
                    <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                  </span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fas fa-circle fa-stack-2x"></i>
                    <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                  </span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fas fa-circle fa-stack-2x"></i>
                    <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                  </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Custom scripts for this template -->
<script src="js/clean-blog.min.js"></script>

</body>

</html>
