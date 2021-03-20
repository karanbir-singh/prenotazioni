<?php
include_once("config.php");

// Variabili valorizzate tramite POST
$codFiscale = $_POST['codFiscale'];
$giorno = $_POST['giorno'];

// Query di inserimento preparata
$sql_check = "SELECT COUNT(*) AS numero_prenotazioni FROM prenotazione WHERE giorno = '$giorno'";
$sql_add = "INSERT INTO prenotazione VALUES (null, :codFiscale, :giorno, :codice_prenotazione)";

// Controllo
$stmt_check = $pdo->query($sql_check);
if($stmt_check->fetchAll(PDO::FETCH_ASSOC)[0]['numero_prenotazioni'] > 2) {
    echo "<h2>Al momento non e' possibile prenotare in data $giorno</h2>";
    exit(0);
}

// Invio della query al database che la tiene in memoria (pronta per essere utilizzata)
$stmt_add = $pdo->prepare($sql_add);

// Invio dei dati concreti che verranno messi al posto dei "segnaposto" (:codFiscale, :giorno)
$codice_prenotazione = substr(uniqid(uniqid(), true), -30);
$stmt_add->execute(['codFiscale' => $codFiscale, 'giorno' => $giorno, 'codice_prenotazione' => $codice_prenotazione]);

//Mostra il codice della prenotazione
echo $codice_prenotazione;