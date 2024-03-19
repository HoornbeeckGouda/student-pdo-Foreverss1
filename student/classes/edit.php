<?php

class StudentEditor {
    private $conn;
    private $table_name = "student";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getStudentById($student_id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$student_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateStudent($student_id, $data) {
        $query = "UPDATE " . $this->table_name . " SET voornaam = ?, tussenvoegsel = ?, achternaam = ?, straat = ?, postcode = ?, woonplaats = ?, email = ?, klas = ?, geboortedatum = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            $data['voornaam'],
            $data['tussenvoegsel'],
            $data['achternaam'],
            $data['straat'],
            $data['postcode'],
            $data['woonplaats'],
            $data['email'],
            $data['klas'],
            $data['geboortedatum'],
            $student_id
        ]);
        return $stmt->rowCount(); // Return the number of affected rows
    }
}

?>