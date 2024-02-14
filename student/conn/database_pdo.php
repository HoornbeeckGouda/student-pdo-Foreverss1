<?php
//STAP 1 - Initialisatie
define('HOST', 'localhost');
define('DATABASE', 'student');
define('USER', 'addy');
define('PASSWORD','stout');

//gebruik geen root!!!
//STAP 2 | connection db

try{
    $dbconn = new PDO("mysql:host=" . HOST . ";dbname=" . DATABASE . ";charset=utf8mb4", USER,PASSWORD);
    $dbconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //$conn->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
    echo "Verbinding gemaakt<br>";
}
catch(PDOException $e){
    echo $e->getMessage();
    echo "Verbinding NIET gemaakt<br>";
}


?>