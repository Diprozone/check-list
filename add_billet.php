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
                                <h1>Mon blog!</h1>
                                </br>
                                <form action="add.php" method="POST" >

                                    <input type="submit" value="Ajouter un billet" class="btn btn-secondary"/>
                                </form>

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
                        include("Repeat/connection_BDD.php");


                        $billets = $bdd->query('SELECT id,titre,contenu,DATE_FORMAT(date_creation, \' le %d/%m/%Y à %Hh%imin%ss\') AS date_creation FROM billets GROUP BY id DESC LIMIT 0,5');

                        while($donnees = $billets->fetch())
                        {
                            echo '<h3>'. htmlspecialchars($donnees['titre']) .' '. htmlspecialchars( $donnees['date_creation']) . '</h3><p class="news">' . htmlspecialchars($donnees['contenu']) ;

                            echo '<br/><br/><a href="http://tomus.ovh/space/follow/comentaires.php?id=' . htmlspecialchars($donnees['id']) . '">Afficher les commentaires </a>';



                            echo '<br/><br/><a href="http://tomus.ovh/space/follow/modif_billet.php?id=' . htmlspecialchars($donnees['id']) . '">Modifier le billet </a>';

                            echo '<br/><br/><a href="http://tomus.ovh/space/follow/bdd_billet.php?id=' . htmlspecialchars($donnees['id']) . '&action=supprimer">Supprimer le billet </a></p>';


                        }
                        $billets->closeCursor();

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
