<!DOCTYPE html>
<html lang='fr'>
	<head>
		<meta charset='utf-8' name="viewport" content="width=device-width, initial-scale=1.0">
        <?php
            echo '<link rel="stylesheet" type="text/css" href="' . BASE_URL . '/css/style.css" />';
        ?>
		<title>OIIO Formation - Intranet</title>
	</head>
    <body>
        <nav>
            <ul>
                <li class="active"><a href='#'>Home</a></li>
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
                
                <!-- login form -->
                <li><a href='#'>Connexion</a>
                    <ul>
                        <li>
                            <?php
                                if(!(isset($_SESSION["connected"]) && ($_SESSION["connected"] == true)))
                                {
                                    if ($_GET['p'] == "index")
                                    {
                                        echo '<form method="post" action="' . BASE_URL . '/" enctype="multipart/form-data">';
                                    }
                                    else
                                    {
                                        echo '<form method="post" action="' . BASE_URL . '/' . $_GET['p'] . '" enctype="multipart/form-data">';
                                    }
                            ?>
                            <label for="userName">Identifiant</label>
                            <input id="userName" name="userName" type="text" placeholder="Identifiant">
            
                            <label for="userPwd">Mot de passe</label>
                            <input id="userPwd" name="userPwd" type="password" placeholder="Mot de passe">
            
                            <input type="submit" value="Envoyer">
            
                    </form>
                    <?php
                    }
                    else
                    {
                        echo "<div id='userName'>" . $_SESSION['userName'] . "</div>";
                    }
                    ?>
                        </li>
                    </ul>
                </li>
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