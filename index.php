<?php
require_once 'connection.php';

if (isset($_GET['message'])){
    echo '<div style="padding: 10px; background-color: green; color: white;">'.$_GET['message'].'</div>';
}
if (isset($_COOKIE['cookieName'])){
    echo '<div class="hi">Bonjour'.' '.$_COOKIE['cookieName'].' '.'('.$_COOKIE['cookieIp'].')'.'</div>';
}
/*$time= getdate();
$day = $time['weekday'];
$date = $time['mday'];
$month = $time['month'];
$hour = $time['hours'];
$minute = $time['minutes'];
$seconde = $time['seconds'];

$datefinal = $day.' '.$date.' '.$month.' '.$hour.':'.$minute.':'.$seconde;*/

?>


<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="custom.css">
    <title>mini-chat</title>
</head>
<body>
<h1 class="title">MINI CHAT</h1>
<div class="row">
    <div class="d-flex">
        <form action="connection-chat.php" method="post">
            <label for="pseudo">pseudo</label>
            <input type="text" id="pseudo" name="pseudo">

            <label for="pseudo">password</label>
            <input type="password" id="pass" name="pass">

            <button type="submit" class="btn btn-success">se connecter</button>
        </form>
        <br><br><a href="inscription.php"><button type="button" class="btn btn-success">s'inscrire</button></a>
    </div>
</div>
<div class="row">
    <!--<div class="container">-->
        <div class="col-10 space-chat message-content">

                <?php include 'display_message.php' ?>

        </div><br>
    <div class="col-2 friends">
        <h1 class="title">FRIENDS</h1>
    <?php
    try {
        $result = $bdd-> prepare('SELECT * FROM users');
        $result->execute();
        $users = $result->fetchAll(PDO::FETCH_ASSOC);

        foreach ($users as $friend){
            //setcookie('cookieId',$friend['id']);
            $id = $friend['id'];
            echo $friend['pseudo'].'<br>';
        }

    } catch (PDOException $err) {
        echo 'echec prepare exec' . $err->getMessage();

    }

    ?>
    </div>

    <!--</div>-->
</div><br>

<form  method="post" id="myForm">

    <input type="text" name="nick" value="<?=$_COOKIE['cookieName']." "."(".$_COOKIE['cookieIp'].") "?>">
    <input type="hidden" name="idUser" id="idUser" value="<?=$_GET['id']?>">
    <div class="form-floating">
        <input type="text" id="message" class="form-control input-text" name="message" >
        <label for="floatingTextarea">Commencer à chater</label>
    </div><br>
    <button class="btn btn-success sendMessage" >envoyer</button>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<script src="main.js"></script>
</body>
</html>