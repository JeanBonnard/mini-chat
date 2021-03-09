<?php
require 'connection.php';

if (isset($_POST['message']) && !empty($_POST['message'])) {
    $time= getdate();
    //$day = $time['weekday'];
    $date = $time['mday'];
    $month = $time['mon'];
    $hour = $time['hours'];
    $minute = $time['minutes'];
    $seconde = $time['seconds'];

    $datefinal = $date.'/'.$month.' '.$hour.':'.$minute.':'.$seconde;

    $message = $_POST['message'];
    //$pass = $_POST['pass'];

        $result = $bdd-> prepare('INSERT INTO messages (content,ip_adress,id_user)VALUES(?,?,?)');
        $result->execute(array($message,$_SERVER['REMOTE_ADDR'],$_GET['id']));

    echo $_GET['id'];
    echo $_POST['message'];
}
