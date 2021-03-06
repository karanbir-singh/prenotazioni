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

// Variabili al momento costanti, poi verrano prese tramite POST
$codFiscale = 'FMGCRG04B20E944M';
$giorno = '2021-03-06';

// Query di inserimento preparata
$sql = "INSERT INTO prenotazione VALUES (null, :codFiscale, :giorno)";

// Invio della query al database che la tiene in memoria (pronta per essere utilizzata)
$stmt = $pdo->prepare($sql);

// Invio dei dati concreti che verranno messi al posto dei "segnaposto" (:codFiscale, :giorno)
$stmt->execute(['codFiscale' => $codFiscale, 'giorno' => $giorno]);