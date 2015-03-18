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
        <header>
            
            <?php
                if(!(isset($_SESSION["connected"]) && ($_SESSION["connected"] == true)))
                {
                    echo '<form method="post" action="' . BASE_URL . '/' . $_GET['p'] . '" enctype="multipart/form-data">';
                    ?>
                        <fieldset>

                            <label for="username">Nom</label>
                            <input id="username" name="username" type="text" placeholder="Nom">
            
                            <label for="userpwd">Compétences</label>
                            <input id="userpwd" name="userpwd" type="password" placeholder="Compétences">
            
                            <input type="submit" value="Envoyer">
            
                        </fieldset>
                    </form>
                <?php
                }
                else
                {
                    echo "<div id='username'>" . $_SESSION['username'] . "</div>";
                }
            ?>

        </header>
        
        <?php
            echo $content;
        ?>
        
        <footer>
        </footer>
    </body>
    <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
</html>