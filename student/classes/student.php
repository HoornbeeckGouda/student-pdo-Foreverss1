<?php
class student {
    // database connection and table name
    private $conn;
    private $table_name = "student";
    
    //tabelkop samenstellen
    public $table_student;

    public function __construct($db) {
        $this->conn=$db;
    }

    function getAllStudents($orderbyField='achternaam', $ascDesc='asc') {
        //select query
        $qry_student = "SELECT 
                        id, 
                        voornaam, 
                        tussenvoegsel, 
                        achternaam,
                        straat,
                        postcode,
                        woonplaats,
                        email,
                        klas,
                        geboortedatum
                        FROM " . $this->table_name . "
                        ORDER BY " . $orderbyField . " " .  $ascDesc . ";";
        // prepare query statement
        $stmt = $this->conn->prepare( $qry_student );
        // execute query
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // return values from database
        return $rows;
}
}
?>