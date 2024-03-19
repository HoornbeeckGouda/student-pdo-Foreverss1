<?php
session_start();
include 'conn/database_pdo.php';
include 'classes/student.php';
include 'classes/edit.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Studenten</title>
    <link rel="stylesheet" type="text/css" href="css/student.css">
</head>
<body>

<?php
$table_header = '
<table id="students">
<tr>
    <th>studentnr</th>
    <th>voornaam</th>
    <th>tussenvoegsel</th>
    <th>achternaam</th>
    <th>straat</th>
    <th>postcode</th>
    <th>woonplaats</th>
    <th>email</th>
    <th>klas</th>
    <th>geboortedatum</th>
    <th>acties</th>
</tr>';
$contentTable = "";

$lol = new student($dbconn);

$rows = $lol->getAllStudents();


try {
    foreach ($rows as $rij) {
        $contentTable .= "<tr>
            <td>" . $rij['id'] . "</td>
            <td>" . $rij['voornaam'] . "</td>
            <td>" . $rij['tussenvoegsel'] . "</td>
            <td>" . $rij['achternaam'] . "</td>
            <td>" . $rij['straat'] . "</td>
            <td>" . $rij['postcode'] . "</td>
            <td>" . $rij['woonplaats'] . "</td>
            <td>" . $rij['email'] . "</td>
            <td>" . $rij['klas'] . "</td>
            <td>" . $rij['geboortedatum'] . "</td>
            <td><a href='../student/edit.php?id=" . $rij['id'] . "'>Edit</a></td>
            </tr>";
    }
} catch (PDOException $e){
    echo "Foutje: " . $e->getMessage();
    echo "<script>alert('klanten niet gevonden');</script>";
}

$table_student = $table_header . $contentTable . "</table>";
echo $table_student;

?>

</body>
</html>