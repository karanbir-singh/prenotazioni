<?php
require './vendor/autoload.php';
include_once("config.php");

use League\Plates\Engine;

// Viene creato l'oggetto per la gestione dei template
// view e' la cartella che contiene il template file
// tpl e' l'estensione del template file
$templates = new Engine('./view', 'tpl');

// Date come estremi dell'intervallo
$data_inizio = $_POST['data_inizio'];
$data_fine = $_POST['data_fine'];

// Query di inserimento preparata
$sql = "SELECT giorno, COUNT(*) AS numero_prenotazioni
            FROM prenotazione
            GROUP BY giorno
            HAVING giorno BETWEEN :data_inizio AND :data_fine
            ORDER BY giorno";

// Invio della query al database che la tiene in memoria (pronta per essere utilizzata)
$stmt = $pdo->prepare($sql);

// Estraggo le righe di risposta che finiranno come vettori in $result
$stmt->execute(['data_inizio' => $data_inizio, 'data_fine' => $data_fine]);

// Estraggo le righe di risposta che finiranno come vettori in $result
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

//Rendo un template che mi visualizza la tabella
echo $templates->render('prenotazioni_per_date', ['result' => $result]);