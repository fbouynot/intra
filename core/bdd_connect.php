<?php

try
{
    $bdd = new PDO("mysql:host=localhost;dbname=intra","root","root");
}
catch (Exception $e)
{
    die('Erreur : '.$e->getMessage());
}