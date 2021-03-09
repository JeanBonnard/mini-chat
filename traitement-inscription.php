<?php
require_once 'connection.php';
include 'RandomColor.php/src/RandomColor.php';
use \Colors\RandomColor;
$color = RandomColor::one(array('format'=>'hex'));

if (isset($_POST['pseudo']) && !empty($_POST['pseudo'])) {

    $pseudo = $_POST['pseudo'];
    $pass = $_POST['pass'];

    try {
        $result = $bdd-> prepare('INSERT INTO users (pseudo,password,color)VALUES(?,?,?)');
        $result->execute(array($pseudo,$pass,$color));

        echo 'tu as reussi';
        header( 'location: /mini-chat/index.php?message=utilisateur ajouté');
    } catch (PDOException $err) {
        echo 'echec prepare exec' . $err->getMessage();
        //header( 'location : ajout-patient.php');
    }
}