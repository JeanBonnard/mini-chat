<?php
require_once 'connection.php';

if (isset($_POST['pseudo']) && !empty($_POST['pseudo'])){
    $pseudo = $_POST['pseudo'];
    $pass = $_POST['pass'];

    try {
        $result = $bdd-> prepare('SELECT * FROM users WHERE pseudo = ?');
        $result->execute([$pseudo]);

        $user = $result->fetch(PDO::FETCH_ASSOC);


            $id = $user['id'];

            if ($pseudo===$user['pseudo'] && $pass===$user['password']){
                setcookie('cookieName',$user['pseudo']);
                setcookie('cookieIp', $_SERVER['REMOTE_ADDR']);
                //setcookie('cookieColor',$user['color']);
                //var_dump($_SERVER['REMOTE_ADDR']);
            }

        /*message=connection reussi&*/

        echo 'tu as reussi';
        header( 'location: /mini-chat/index.php?id='.$id.'');
    } catch (PDOException $err) {
        echo 'echec prepare exec' . $err->getMessage();

    }

}