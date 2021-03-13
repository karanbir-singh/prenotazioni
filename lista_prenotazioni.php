<?php
include_once("config.php");

// Query di inserimento preparata
$sql = "SELECT * FROM prenotazione";

$stmt = $pdo->query($sql);

//var_dump($stmt->fetchAll(PDO::FETCH_ASSOC));
$table = '<table style="width: 100%"><tr><th>ID</th><th>Codice fiscale</th><th>Data</th><th>Codice prenotazione</th></tr>';
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $id = $row['id'];
    $codFiscale = $row['codice_fiscale'];
    $data = $row['giorno'];

    $uniqid = uniqid(uniqid(),true);

    $table = $table . "<tr style='text-align: center'>
                            <td style='border: 1px solid black'>$id</td>
                            <td style='border: 1px solid black'>$codFiscale</td>
                            <td style='border: 1px solid black'>$data</td>
                            <td style='border: 1px solid black'>$uniqid</td>
                        </tr>";
}

echo $table . '</table>';
