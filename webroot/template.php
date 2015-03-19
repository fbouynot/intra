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

                            <label for="userName">Identifiant</label>
                            <input id="userName" name="userName" type="text" placeholder="Identifiant">
            
                            <label for="userPwd">Mot de passe</label>
                            <input id="userPwd" name="userPwd" type="password" placeholder="Mot de passe">
            
                            <input type="submit" value="Envoyer">
            
                        </fieldset>
                    </form>
                <?php
                }
                else
                {
                    echo "<div id='userName'>" . $_SESSION['userName'] . "</div>";
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