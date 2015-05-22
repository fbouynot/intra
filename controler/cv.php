<?php

    $title = "CV";

/* Si l'utilisateur n'est pas connecté, on le redirige sur la page de connexion et on prépare une variable pour le ramener ici ensuite */
if(!(isset($_SESSION["connected"]) && ($_SESSION["connected"] == true)))
{
    $_SESSION['prelogin'] = $_GET['p'];
    header("Location: " . BASE_URL . "/login");
}
elseif (isset($_FILES['cv']) == true && $_FILES['cv'] != "")
{
    include_once(ROOT . "/model/cv.php");
    var_dump($_FILES);
    $_maxSize = 10000000;

    if ($_FILES['cv']['error'] > 0)
    {
        echo "Erreur lors du transfert, veuillez recommencer l'opération.";
        //echo $_FILES['cv']['error'];
    }
    else
    {
        if ($_FILES['cv']['size'] > $_maxSize)
        {
            echo "Le fichier est trop volumineux. La taille maximale acceptée est {$_maxSize} octets.";
            //echo $erreur;
        }
        else
        {
            $extensions_valides = array( 'pdf', 'doc', 'docx', 'odt' , 'rtf', 'pages' );
            //1. strrchr renvoie l'extension avec le point (« . »).
            //2. substr(chaine,1) ignore le premier caractère de chaine.
            //3. strtolower met l'extension en minuscules.
            $extension_upload = strtolower(  substr(  strrchr($_FILES['cv']['name'], '.')  ,1)  );

            if ( !in_array($extension_upload,$extensions_valides) )
            {
                echo "Extension incorrecte. Les extensions acceptées sont : pdf, doc, docx, odt, rtf, pages";
            }
            else
            {
                $_prenom = mb_strtolower($_SESSION['givenName'], 'UTF-8');
                $_prenom = ucwords($_prenom);
                $_nom = mb_strtoupper($_SESSION['sn'], 'UTF-8');
                if ( !file_exists ( BASE_URL . "/cv/" ) ) mkdir(BASE_URL . '/cv/', 0733, true);
                if ( !file_exists ( BASE_URL . "/cv/{$_nom}_{$_prenom}" ) ) mkdir(BASE_URL . "/cv/{$_nom}_{$_prenom}/", 0733, true);
                $nom = BASE_URL . "/cv/{$_nom}_{$_prenom}/{$_nom}_{$_prenom}.{$extension_upload}";
                $resultat = move_uploaded_file($_FILES['cv']['tmp_name'],$nom);
                if ($resultat) echo nl2br("Transfert réussi à l'emplacement {$nom}");
            }
        }
    }
    include_once(ROOT . "/view/cv.php");
}
else
{
    include_once(ROOT . "/model/cv.php");
    //getCv();
    include_once(ROOT . "/view/cv.php");
}