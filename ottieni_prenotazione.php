<?php
include_once("config.php");

// Variabili valorizzate tramite POST
$codice_prenotazione = $_POST['codice_prenotazione'];

// Query di inserimento preparata
$sql = "SELECT * FROM prenotazione WHERE codice_prenotazione = :codice_prenotazione";

// Invio della query al database che la tiene in memoria (pronta per essere utilizzata)
$stmt = $pdo->prepare($sql);

// Invio dei dati concreti che verranno messi al posto dei "segnaposto" (:codFiscale, :giorno)
$stmt->execute(['codice_prenotazione' => $codice_prenotazione]);

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
