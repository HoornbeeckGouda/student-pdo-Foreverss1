<?php

include 'conn/database_pdo.php';
include 'classes/student.php';
include 'classes/edit.php';
// Initialize StudentEditor object
$studentEditor = new StudentEditor($dbconn);

if(isset($_GET['id'])) {
    $student_id = $_GET['id'];
    $student = $studentEditor->getStudentById($student_id);
    
    if(!$student) {
        echo "Student not found.";
        exit;
    }
} else {
    echo "Student ID not provided.";
    exit;
}

// Handle form submission
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Update student record in the database
    $data = [
        'voornaam' => $_POST['voornaam'],
        'tussenvoegsel' => $_POST['tussenvoegsel'],
        'achternaam' => $_POST['achternaam'],
        'straat' => $_POST['straat'],
        'postcode' => $_POST['postcode'],
        'woonplaats' => $_POST['woonplaats'],
        'email' => $_POST['email'],
        'klas' => $_POST['klas'],
        'geboortedatum' => $_POST['geboortedatum']
    ];
    
    $result = $studentEditor->updateStudent($student_id, $data);
    
    if($result) {
        echo "Student information updated successfully.";
        header("Location: ../student/studenten_pdo.php");
    } else {
        echo "Error updating student information.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
</head>
<body>

<h2>Edit Student</h2>

<form method="post">
    <label for="voornaam">Voornaam:</label>
    <input type="text" id="voornaam" name="voornaam" value="<?php echo isset($student['voornaam']) ? $student['voornaam'] : ''; ?>"><br><br>

    <label for="tussenvoegsel">Tussenvoegsel:</label>
    <input type="text" id="tussenvoegsel" name="tussenvoegsel" value="<?php echo isset($student['tussenvoegsel']) ? $student['tussenvoegsel'] : ''; ?>"><br><br>

    <label for="achternaam">Achternaam:</label>
    <input type="text" id="achternaam" name="achternaam" value="<?php echo isset($student['achternaam']) ? $student['achternaam'] : ''; ?>"><br><br>

    <label for="straat">Straat:</label>
    <input type="text" id="straat" name="straat" value="<?php echo isset($student['straat']) ? $student['straat'] : ''; ?>"><br><br>

    <label for="postcode">Postcode:</label>
    <input type="text" id="postcode" name="postcode" value="<?php echo isset($student['postcode']) ? $student['postcode'] : ''; ?>"><br><br>

    <label for="woonplaats">Woonplaats:</label>
    <input type="text" id="woonplaats" name="woonplaats" value="<?php echo isset($student['woonplaats']) ? $student['woonplaats'] : ''; ?>"><br><br>

    <label for="email">Email:</label>
    <input type="text" id="email" name="email" value="<?php echo isset($student['email']) ? $student['email'] : ''; ?>"><br><br>

    <label for="klas">Klas:</label>
    <input type="text" id="klas" name="klas" value="<?php echo isset($student['klas']) ? $student['klas'] : ''; ?>"><br><br>

    <label for="geboortedatum">Geboortedatum:</label>
    <input type="text" id="geboortedatum" name="geboortedatum" value="<?php echo isset($student['geboortedatum']) ? $student['geboortedatum'] : ''; ?>"><br><br>

    <input type="submit" value="Update">
    
    
</form>

</body>
</html>