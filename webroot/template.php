<!DOCTYPE html>
<html lang='fr'>
	<head>
        <!-- Pour les besoins du responsive, on définit le nombre de pixels utilisés comme ceux du téléphone et non le nombre de pixels virtuels qu'il déclare.
            Pour la même raison, on demande d'être en zoom x1 au chargement de la page. -->
		<meta charset='utf-8' name="viewport" content="width=device-width, initial-scale=1.0">
        <?php
            echo '<link rel="stylesheet" type="text/css" href="' . BASE_URL . '/css/style.css" />';
        ?>
		<title>OIIO Formation - Intranet</title>
	</head>
    <body>
        <nav>
            <ul>
                <li class="active"><a href='<?php echo BASE_URL;?>/'>Home</a></li>
                <li><a href='#'>Produits</a>
                    <ul>
                        <li><a href='#'>Product 1</a>
                            <ul>
                                <li><a href='#'>Sub Product</a></li>
                                <li><a href='#'>Sub Product</a></li>
                            </ul>
                        </li>
                        <li><a href='#'>Product 2</a>
                            <ul>
                                <li><a href='#'>Sub Product</a></li>
                                <li><a href='#'>Sub Product</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                
                <!-- Si l'utilisateur n'est pas connecté, on lui propose un formulaire de connexion, sinon on lui affiche un menu personnel -->
                <?php
                    if(!(isset($_SESSION["connected"]) && ($_SESSION["connected"] == true)))
                    {
                ?>
                <li><a href='#'>Connexion</a>
                    <ul>
                        <li>
                            <?php
                                if ($_GET['p'] == "index")
                                {
                            ?>
                            <!-- Formulaire de connexion -->
                            <form method="post" action="<?php echo BASE_URL;?>/" enctype="multipart/form-data">
                            <?php
                                }
                                else
                                {
                            ?>
                            <form method="post" action="<?php echo BASE_URL . '/' . $_GET['p'];?>" enctype="multipart/form-data">
                            <?php
                                }
                            ?>
                                <label for="userName">Identifiant</label>
                                <input id="userName" name="userName" type="text" placeholder="Identifiant">
            
                                <label for="userPwd">Mot de passe</label>
                                <input id="userPwd" name="userPwd" type="password" placeholder="Mot de passe">
            
                                <input type="submit" value="Envoyer">
            
                            </form>
                        </li>
                    </ul>
                </li>
                <?php
                    }
                    else
                    {
                ?>
                <li><a href='#'><?php echo $_SESSION['givenName'];?></a>
                    <ul>
                        <li>
                            <div id='userName'><a href="<?php echo BASE_URL . '/profile'?>">Mon profil</a></div>
                        </li>
                    </ul>
                </li>
                 <?php       
                    }
                ?>
            </ul>
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