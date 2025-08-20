<?php 

$optionen = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]; 

try {
    $db = new PDO('mysql:host=localhost;dbname=zesty_bar_project','root','', $optionen);
}
catch(PDOException $e) {
    #print_r( $e->getMessage() );
    echo 'Datenbankverbindung fehlgeschlagen';
    die();
}