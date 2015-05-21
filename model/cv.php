<?php

include_once(ROOT . '/core/bdd_connect.php');

function uploadCv($cv)
{
    global $bdd;
    
    //$titre = (string) $titre;
    
    $req = $bdd->prepare("UPDATE user SET cv_e=:cv WHERE login=:userName;");
    $req->bindParam(':userName', $_SESSION['userName'], PDO::PARAM_STR,64);
    $req->bindParam(':cv', $cv, PDO::PARAM_LOB);
    $req->execute();
}

function getCv()
{
    $req = $bdd->prepare("SELECT cv_e FROM user WHERE login=:login;");
    $req->bindParam(':login', $_SESSION['userName'], PDO::PARAM_STR,64);
    $req->execute();
    return $req[0];
}