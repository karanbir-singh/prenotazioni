<?php
include_once("config.php");

// Variabili valorizzate tramite POST
$codFiscale = $_POST['codFiscale'];
$giorno = $_POST['giorno'];

// Query di inserimento preparata
$sql = "INSERT INTO prenotazione VALUES (null, :codFiscale, :giorno)";

// Invio della query al database che la tiene in memoria (pronta per essere utilizzata)
$stmt = $pdo->prepare($sql);

// Invio dei dati concreti che verranno messi al posto dei "segnaposto" (:codFiscale, :giorno)
$stmt->execute(['codFiscale' => $codFiscale, 'giorno' => $giorno]);

// Ridirige il browser verso la pagine indicata nella Location
header("Location: lista_prenotazioni.php");

exit(0);