<?php
session_start();
 require('Function.php');
 spl_autoload_register ('chargerClasse');

if (is_null($_GET['mtt'])||is_null($_GET['taux'])||is_null($_GET['duree'])||is_null($_GET['datedebut'])||$_GET['mtt']<1||$_GET['taux']<1||$_GET['duree']<1) {
	header("Location:index.php?errorform");
}

$montant = $_GET['mtt'];
$taux = $_GET['taux'];
$duree = $_GET['duree'];
$datedebut = $_GET['datedebut'];

$simulation = new Ammortissement($montant,$taux,$duree,$datedebut);

$id = null;
	if (isset($_SESSION['id'])) {
		$id = $_SESSION['id'];
	}	

?>

<!DOCTYPE html> 
<html lang="en" style="height:100%;">
    <head> 
        <meta charset="utf-8"> 
        <title>Resultat</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="keywords" content="pinegrow, blocks, bootstrap"/>
        <meta name="description" content="My new website"/>
        <link rel="shortcut icon" href="ico/favicon.png">        
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"> 
        <link href="css/font-awesome.min.css" rel="stylesheet">        
        <link href="css/style-library-1.css" rel="stylesheet">
        <link href="css/plugins.css" rel="stylesheet">
        <link href="css/blocks.css" rel="stylesheet">
        <link href="css/custom.css" rel="stylesheet">       
        
    </head>     
    <body data-spy="scroll" data-target="nav">
        <section id="content-2-7" class="content-block content-2-7">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="underlined-title">
                            <h1>Resultat</h1>
                            <hr>
                        </div>
                    </div>
                    <div class="col-sm-3 text-center col-md-4">
                        <div class="counter-icon">
                            <span class="fa fa-magic"></span>
                        </div>
                        <div class="counter-text">
                            <h3 class="counter"><?php echo round($simulation->getMensualite(),2); ?></h3>
                            <span>Mensuel a payer</span>
                        </div>
                    </div>
                    <div class="col-sm-3 text-center col-md-4">
                        <div class="counter-icon">
                            <span class="fa fa-lightbulb-o"></span>
                        </div>
                        <div class="counter-text">
                            <h3 class="counter"><?php echo round($simulation->getCoutCredit(),2); ?></h3>
                            <span>cout de credit</span>
                        </div>
                    </div>
                    <div class="col-sm-3 text-center col-md-4">
                        <div class="counter-icon">
                            <span class="fa fa-clock-o"></span>
                        </div>
                        <div class="counter-text">
                            <h3 class="counter"><?php echo round($simulation->getCoutTotalPret(),2); ?></h3>
                            <span>cout totaldu pret</span>
                        </div>
                    </div>
                    <div class="text-center pad45 col-sm-12">
                        <button type="button" class="btn btn-primary bg-transparent"><a href="index.php">Retour</a></button>
                        <button type="button" class="btn btn-default bg-transparent"><a href="Detail.php?mtt=<?php echo $montant;?>&&taux=<?php echo $taux; ?>&&duree=<?php echo $duree; ?>&&datedebut=<?php echo $datedebut; ?>">Detail</a></button>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container -->
        </section>
        <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>         
        <script type="text/javascript" src="js/bootstrap.min.js"></script>         
        <script type="text/javascript" src="js/plugins.js"></script>
        <script type="text/javascript" src="js/bskit-scripts.js"></script>         
    </body>     
</html>
