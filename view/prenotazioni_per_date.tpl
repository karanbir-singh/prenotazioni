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
<h2>Numero delle prenotazioni tra: <?php echo $result[0]['giorno'] . " e " . end($result)['giorno']; ?></h2>
<table style="width: 100%">
    <tr>
        <th>Data</th>
        <th>Numero delle prenotazioni</th>
    </tr>
    <?php foreach($result as $row): ?>
    <tr>
        <td><?php echo $row['giorno'] ?></td>
        <td><?php echo $row['numero_prenotazioni'] ?></td>
    </tr>
    <?php endforeach ?>
</table>
</body>
</html>