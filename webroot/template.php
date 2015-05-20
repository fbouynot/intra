<!DOCTYPE html>
<html lang='fr'>
	<head>
        <!-- Pour les besoins du responsive, on définit le nombre de pixels utilisés comme ceux du téléphone et non le nombre de pixels virtuels qu'il déclare.
            Pour la même raison, on demande d'être en zoom x1 au chargement de la page. -->
		<meta charset='utf-8' name="viewport" content="width=device-width, initial-scale=1.0">
        <?php
            echo '<link rel="stylesheet" type="text/css" href="' . BASE_URL . '/css/style.css" />';
            echo '<link type="image/x-icon" href="' . BASE_URL . '/img/favico.ico" rel="shortcut icon" />';
        ?>
        <!--Cette partie sera supprimée-->
        <link href='http://fonts.googleapis.com/css?family=Abel|Poiret+One' rel='stylesheet' type='text/css'>
        <!--/ Cette partie sera supprimée-->
		<title>OIIO Formation - Intranet - <?php echo $title;?></title>
	</head>
    <body>
        <nav>
            <div class="test123">
            <ul>
                <li class="active">
                    <a href='<?php echo BASE_URL;?>/'>Accueil</a>
                </li>
                <?php
                    /*  Si l'utilisateur n'est pas connecté, 
                    on lui propose un formulaire de connexion, 
                    sinon on lui affiche un menu personnel */
                    if(!(isset($_SESSION["connected"]) && ($_SESSION["connected"] == true)))
                    {
                ?>
                <li>
                    <a href='<?php echo BASE_URL . "/login";?>'>Connexion</a>
                </li>          
                <?php
                    }
                    else
                    {
                ?>
                <li>
                    <a href='<?php echo BASE_URL . "/cv";?>'>CV</a>
                </li>
                <li>
                    <a href='<?php echo BASE_URL . "/profile";?>'><?php echo $_SESSION['givenName'];?></a>
                </li>
                <li>
                    <a href='<?php echo BASE_URL . "/disconnect";?>'>Déconnexion</a>
                </li>
                <?php       
                    }
                ?>
            </ul>
                </div>
        </nav>

        <section>
            <?php
                echo $content;
            ?>
        </section>
        
        <footer>
            <a href="http://blog.oiioformation.fr">Blog AMA</a>
            <a href="http://deesweb.oiioformation.fr">DEES Web</a>
            <a href="http://www.oiioformation.fr">OIIO Formation</a>
        </footer>
    </body>
    <script src="<?php echo BASE_URL;?>/js/jquery-2.1.3.min.js"></script>
</html>