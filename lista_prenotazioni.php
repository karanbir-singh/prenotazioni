<?php
// Dice a livello dello script che gli errori verranno mostrati
// e che non verrano loggati
ini_set('display_errors', 1);
ini_set('log_errors', 0);

// Parametri di configurazione
$host = 'localhost';
$db = 'tamponi';
$user = 'root';
$pass = '';
$charset = 'utf8';

// Data Source Name
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

// Oggetto che rappresenta la connessione al database
$pdo = new PDO($dsn, $user, $pass);

// Query di inserimento preparata
$sql = "SELECT * FROM prenotazione";

$stmt = $pdo->query($sql);

var_dump($stmt->fetchAll(PDO::FETCH_ASSOC));
