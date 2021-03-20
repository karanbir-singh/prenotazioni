<?php
require './vendor/autoload.php';
include_once("config.php");

use League\Plates\Engine;

// Viene creato l'oggetto per la gestione dei template
// view e' la cartella che contiene il template file
// tpl e' l'estensione del template file
$templates = new Engine('./view', 'tpl');

// Query di inserimento preparata
$sql = "SELECT * FROM prenotazione WHERE giorno = CURRENT_DATE()";

// Invio la query al server MySQL
$stmt = $pdo->query($sql);

// Estraggo le righe di risposta che finiranno come vettori in $result
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Metodo meccanico e non molto ragionevole (potrebbe capitare di perdere dei pezzi)
/*
    var_dump($stmt->fetchAll(PDO::FETCH_ASSOC));
    $table = '<table style="width: 100%"><tr><th>ID</th><th>Codice fiscale</th><th>Data</th><th>Codice prenotazione</th></tr>';
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $id = $row['id'];
        $codFiscale = $row['codice_fiscale'];
        $data = $row['giorno'];
        $uniqid = $row['codice_prenotazione'];

        $table = $table . "<tr style='text-align: center'>
                                <td style='border: 1px solid black'>$id</td>
                                <td style='border: 1px solid black'>$codFiscale</td>
                                <td style='border: 1px solid black'>$data</td>
                                <td style='border: 1px solid black'>$uniqid</td>
                            </tr>";
    }

    echo $table . '</table>';
*/

//Rendo un template che mi visualizza la tabella
echo $templates->render('prenotazioni_oggi', ['result' => $result]);
