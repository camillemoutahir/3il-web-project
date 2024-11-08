<?php
$host = 'localhost';
$dbname = 'site_bijoux';
$username = 'root';
$password = '';


/*
$host = 'mysql-camillem.alwaysdata.net';
$dbname = 'camillem_site_bijoux';
$username = 'camillem';
$password = 'camillemlesfleurs';
*/

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die('Erreur de connexion à la base de données: ' . $conn->connect_error);
}
?>