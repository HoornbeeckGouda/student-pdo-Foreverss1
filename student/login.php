<?php
session_start();
/*
STAPPEN PLAN HASHING...
1. Zet wachtwoorden om naar hash; zorg dat je kolom voldoende breed is om de hash op te slaan
2. Pas je code aan zoals terug te vinden is in authorisatie_hash.php
3. Bij het aanmaken van gebruikers zorg je dat daar het ww gehashed wordt én opgeslagen!
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inloggen</title>
</head>
<body>
<form action="authorisatie_hash.php" method="POST">
    <label for="fInlog">Inlognaam:</label><input type="text" name="inlognaam" id="fInlog" size="45" placeholder="emailadres@xxxx.xx"><br>
    <label for="fWachtwoord">Wachtwoord: </label><input type="password" id="fWachtwoord" name="wachtwoord" size="50" placeholder="wachtwoord..."><br>
    <input type="submit" name="submit" value="login"><br>
</form>
</body>
</html>
