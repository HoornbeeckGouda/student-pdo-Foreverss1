<?php
session_start();
include 'conn/database_pdo.php';

if ($_POST['submit']) {
    $inlognaam=isset($_POST['inlognaam']) ? $_POST['inlognaam'] : '';
    $wachtwoord=isset($_POST['wachtwoord']) ? $_POST['wachtwoord'] : '';
}
else {
    header('refresh: 1, login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inloggen</title>
</head>
<body>
<?php
    
// let op: andere kolom erbij gemaakt!
$query = "SELECT id, inlognaam, pwhash, rol_id FROM gebruiker WHERE inlognaam = :inlognaam";
$result = $dbconn->prepare($query);
$result->bindParam(':inlognaam', $inlognaam);
$result->execute();

// Assuming it returns only 1 record
$user = $result->fetch(PDO::FETCH_ASSOC); // Correct usage of fetch()

// Get the total number of rows returned (assuming you want to count all matching rows)
$aantal = $result->rowCount();

//STAP 4 | gegevens naar scherm...
echo "<h2>Inloggen</h2>";
if ($aantal==1) { //inloignaam moet dus uniek zijn…
    $pwHash = $user['pwhash'];
    
    if (password_verify($wachtwoord,$pwHash)) {
        echo 'Super, je bent ingelogd!';
        header('Location: studenten_pdo.php');
    } else {
        echo 'Helaas, je bent NIET ingelogd!!';
        session_destroy();
    }

} else {
    echo 'Helaas, je bent NIET ingelogd';
    session_destroy();
    session_unset();
    header('refresh: 4; url=login.php');
    exit();
}

?>
</body>
</html>