<?php
require_once 'header.php'
?>

<form action="traitement-inscription.php" method="post">
    <label for="pseudo">pseudo</label>
    <input type="text" id="pseudo" name="pseudo">

    <label for="floatingPassword">Password</label>
    <input type="password" id="floatingPassword" placeholder="Password" name="pass">

    <button type="submit" class="btn btn-success">s'inscrire</button>
</form>