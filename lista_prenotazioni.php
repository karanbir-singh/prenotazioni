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

//var_dump($stmt->fetchAll(PDO::FETCH_ASSOC));
$table = '<table style="width: 100%"><tr><th>ID</th><th>Codice fiscale</th><th>Data</th></tr>';
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $id = $row['id'];
    $codFiscale = $row['codice_fiscale'];
    $data = $row['giorno'];

    $table = $table . "<tr style='text-align: center'>
                            <td style='border: 1px solid black'>$id</td>
                            <td style='border: 1px solid black'>$codFiscale</td>
                            <td style='border: 1px solid black'>$data</td>
                        </tr>";
}

echo $table . '</table>';
