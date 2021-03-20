<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Title</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mini.css/3.0.1/mini-default.min.css">
</head>
<body>
<h1>Portale prenotazioni</h1>
<h2>Lista delle prenotazioni</h2>
<table style="width: 100%">
    <tr>
        <th>ID</th>
        <th>Codice fiscale</th>
        <th>Data</th>
        <th>Codice prenotazione</th>
    </tr>
    <?php foreach($result as $row): ?>
    <tr>
        <td><?php echo $row['id'] ?></td>
        <td><?php echo $row['codice_fiscale'] ?></td>
        <td><?php echo $row['giorno'] ?></td>
        <td><?php echo $row['codice_prenotazione'] ?></td>
    </tr>
    <?php endforeach ?>
</table>
</body>
</html>