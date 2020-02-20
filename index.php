<?php
	session_start();
	$id=NULL;
	$erreur = NULL;
	if (isset($_SESSION['id'])) {
		$id = $_SESSION['id'];
	}
	if (isset($_GET['error_connexion'])) {
		$erreur = "erreur de connexion ressayer!!";
	}
	if (isset($_GET['errorform'])) {
		$erreur = "calcul non faisable!";
	}

?>
<!DOCTYPE html> 
<html lang="en" style="height:100%;">
    <head> 
        <meta charset="utf-8"> 
        <title>Bienvenue!</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="keywords" content="pinegrow, blocks, bootstrap"/>
        <meta name="description" content="My new website"/>
        <link rel="shortcut icon" href="ico/favicon.png">       
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"> 
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,300,600,700" rel="stylesheet">
        <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet">
        <link href="css/style-library-1.css" rel="stylesheet">
        <link href="css/plugins.css" rel="stylesheet">
        <link href="css/blocks.css" rel="stylesheet">
        <link href="css/custom.css" rel="stylesheet">        
    </head>     
    <body data-spy="scroll" data-target="nav">
        <section id="content-1-4" class="content-block-nopad content-1-4">
            <div class="image-container col-md-5 col-sm-3 pull-left">
                <div class="background-image-holder">
</div>
            </div>
            <div class="container">
                <div class="row">
                    <header id="header-1" class="soft-scroll header-1">
                        <!-- Navbar -->
                        <nav class="main-nav navbar-fixed-top headroom headroom--pinned">
                            <div class="container">


<?php
							if (!is_null($id)) {				
?>
                                <div class="collapse navbar-collapse">
                                    <ul class="nav navbar-nav navbar-right">
                                        <li class="nav-item">
                                            <a href="traitement.php?deconnex">Deconnexion</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="">Historique</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="index.php">Acceuil</a>
                                        </li>
                                    </ul>
                                </div>
<?php
							}else{
?>
								<div class="collapse navbar-collapse">
                                    <ul class="nav navbar-nav navbar-right">
                                        <li class="nav-item">
                                            <a href="index.php?connect">Connexion</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="index.php?sign">S'inscrire</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="index.php">Acceuil</a>
                                        </li>
                                    </ul>
                                </div>									
<?php
							}
?>        
                            </div>
                        </nav>
                    </header>
                    <div class="col-md-6 col-md-offset-6 col-sm-8 col-sm-offset-4 content clearfix">
                        <h1>Tableaux d'ammortissement</h1>
<?php
					if (isset($_GET['connect'])) {
?>
                        <form action="traitement.php" method="get">

                       		 <div class="input-group"> 
                                <span class="input-group-addon">id</span> 
                                <input type="number" step="any" class="form-control" name="id"> 
                            </div>
                            <div class="input-group"> 
                                <span class="input-group-addon">Mot de passe</span> 
                                <input type="password" step="any" class="form-control" name="mdp"> 
                            </div>
                        	<input type="submit"  class="btn btn-outline btn-outline-lg outline-dark" value="Se connecter">
                        </form>
<?php
                    }else if(isset($_GET['sign'])) {
?>
						 <form action="traitement.php" method="get">

                       		 <div class="input-group"> 
                                <span class="input-group-addon">Nom</span> 
                                <input type="text" step="any" class="form-control" name="name"> 
                            </div>
                            <div class="input-group"> 
                                <span class="input-group-addon">Mot de passe</span> 
                                <input type="password" step="any" class="form-control" name="mdp"> 
                            </div>
                        	<input type="submit"  class="btn btn-outline btn-outline-lg outline-dark" value="S'inscrire">
                        </form>
<?php
                    }else{

?>
							
						<form action="Resultat.php" method="get">

                       		 <div class="input-group"> 
                                <span class="input-group-addon">Montant</span> 
                                <input type="number" step="any" class="form-control" name="mtt"> 
                            </div>
                            <div class="input-group"> 
                                <span class="input-group-addon">taux</span> 
                                <input type="number" step="any" class="form-control" name="taux"> 
                            </div>
                            <div class="input-group"> 
                                <span class="input-group-addon">duree(mois)</span> 
                                <input type="number" class="form-control" name="duree"> 
                            </div>
                            <div class="input-group"> 
                                <span class="input-group-addon">Date Debut</span> 
                                <input type="date" class="form-control" name="datedebut"> 
                            </div>
                        	<input type="submit"  class="btn btn-outline btn-outline-lg outline-dark" value="resultat">
                        </form>
<?php
                    }
?>

<?php 
							if (!is_null($erreur)) {
?>
           					<div class="alert alert-success" role="alert">
								 <?php echo $erreur; ?>
							</div>
<?php
							}
?>

                        <!-- /.row -->
                    </div>
                </div>
                <!-- /.row-->
            </div>
            <!-- /.container -->
        </section>
        <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>         
        <script type="text/javascript" src="js/bootstrap.min.js"></script>         
        <script type="text/javascript" src="js/plugins.js"></script>
        <script src="https://maps.google.com/maps/api/js?sensor=true"></script>
        <script type="text/javascript" src="js/bskit-scripts.js"></script>         
    </body>     
</html>
