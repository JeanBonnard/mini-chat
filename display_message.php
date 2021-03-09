<?php
require_once 'connection.php';
try {
    $result = $bdd-> prepare('SELECT pseudo,color, users.id, messages.content,messages.time_mes FROM users JOIN messages ON messages.id_user = users.id ORDER BY messages.time_mes');
    $result->execute();
    $messages = $result->fetchAll(PDO::FETCH_ASSOC);

    foreach ($messages as $message){
        echo "<p><span style='font-weight:bold;color:".$message['color'].";'>".$message['pseudo']."</span>".' ('.$message['time_mes'].') '.$message['content'].'</p><br>';
    }

} catch (PDOException $err) {
    echo 'echec prepare exec' . $err->getMessage();

}