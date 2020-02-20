<?php
require('Function.php');
spl_autoload_register ('chargerClasse');
session_start();

$id = $_SESSION['id'];
$historique = getHist($id);
$delete=NULL;
if (isset($_GET['delete'])) {
    deleteHist($_GET['delete']);
    $delete = "le sauvegarde a ete supprimer!" ;
}

?>


<!DOCTYPE html> 
<html lang="en" style="height:100%;" wp-site wp-site-is-master-page>
    <head> 
        <meta charset="utf-8"> 
        <title>Historique</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="keywords" content="pinegrow, blocks, bootstrap"/>
        <meta name="description" content="My new website"/>
        <link rel="shortcut icon" href="ico/favicon.png"> 
        <!-- Core CSS -->         
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"> 
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,300,600,700" rel="stylesheet">
        <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet">
        <!-- Style Library -->         
        <link href="css/style-library-1.css" rel="stylesheet">
        <link href="css/plugins.css" rel="stylesheet">
        <link href="css/blocks.css" rel="stylesheet">
        <link href="css/custom.css" rel="stylesheet">
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->         
        <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->         
    </head>     
    <body data-spy="scroll" data-target="nav">
        <header id="header-1" class="soft-scroll header-1" wp-cz-section="blocks_header_1" wp-cz-section-title="Header 1">
            <!-- Navbar -->
            <nav class="main-nav navbar-fixed-top headroom headroom--pinned">
                <div class="container">
                    <!-- Brand and toggle -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a href="index.php" wp-href="url"> <img src="images/brand/pgblocks-logo-white-nostrap.png" class="brand-img img-responsive" wp-cz-control="blocks_header_1_logo" wp-cz-control-label="Logo" wp-cz-control-type="media" wp-cz-control-mime-type="image" wp-cz-control-section="blocks_header_1" wp-attachment-image wp-attachment-image-theme-mod="blocks_header_1_logo" wp-attachment-image-size="medium"> </a>
                    </div>
                    <!-- Navigation -->
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right" wp-nav-menu="primary" wp-nav-menu-depth="10" wp-nav-menu-type="bootstrap">
                            <li class="active nav-item">
                                <a href="index.php">Acceuil</a>
                            </li>					
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <table class="table" id="tableaux"> 
            <thead> 
                <tr> 
                    <th>Capital Initial</th> 
                    <th>Taux</th> 
                    <th>duree</th> 
                    <th>date Debut</th>  
                    <th>Action</th>
                </tr>                 
            </thead>             

            <tbody> 
<?php
			for ($i=0; $i <count($historique) ; $i++) {
?>
                <tr> 
                    
                    <td><?php echo $historique[$i]->capitalinitial; ?></td> 
                    <td><?php echo $historique[$i]->taux; ?></td> 
                    <td><?php echo $historique[$i]->duree; ?></td> 
                    <td><?php echo $historique[$i]->datedebut ; ?></td>
                    <td><a href="Historique.php?delete=<?php echo $historique[$i]->id; ?>">Supprimer</a> <a href="Detail.php?mtt=<?php echo $historique[$i]->capitalinitial; ?>&&taux=<?php  echo $historique[$i]->taux; ?>&&duree=<?php  echo $historique[$i]->duree; ?>&&datedebut=<?php echo $historique[$i]->datedebut ; ?>">detail</a></td> 
               
                </tr>
<?php
            }
?>                                
            </tbody>
        </table>
<?php 
        if (!is_null($delete)) {
?>
            <div class="alert alert-success" role="alert">
                <?php echo $delete; ?>
            </div>
<?php
        }
?>
        <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>         
        <script type="text/javascript" src="js/bootstrap.min.js"></script>         
        <script type="text/javascript" src="js/plugins.js"></script>
        <script src="https://maps.google.com/maps/api/js?sensor=true"></script>
        <script type="text/javascript" src="js/bskit-scripts.js"></script>         
    </body>     
</html>
