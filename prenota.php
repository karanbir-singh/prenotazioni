<?php
include_once("config.php");

// Variabili valorizzate tramite POST
$codFiscale = $_POST['codFiscale'];
$giorno = $_POST['giorno'];

// Query di inserimento preparata
$sql = "INSERT INTO prenotazione VALUES (null, :codFiscale, :giorno, :codice_prenotazione)";

// Invio della query al database che la tiene in memoria (pronta per essere utilizzata)
$stmt = $pdo->prepare($sql);

// Invio dei dati concreti che verranno messi al posto dei "segnaposto" (:codFiscale, :giorno)
$codice_prenotazione = substr(uniqid(uniqid(),true),-30);
$stmt->execute(['codFiscale' => $codFiscale, 'giorno' => $giorno, 'codice_prenotazione' => $codice_prenotazione]);

//Mostra il codice della prenotazione
echo $codice_prenotazione;