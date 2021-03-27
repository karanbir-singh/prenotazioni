<?php $this->layout('main', ['argomento' => 'Lista delle prenotazioni di oggi: ' . date("d/m/Y")]); ?>

<table style="width: 100%">
    <tr>
        <th>ID</th>
        <th>Codice fiscale</th>
        <th>Codice prenotazione</th>
    </tr>
    <?php foreach($result as $row): ?>
    <tr>
        <td><?php echo $row['id'] ?></td>
        <td><?php echo $row['codice_fiscale'] ?></td>
        <td><?php echo $row['codice_prenotazione'] ?></td>
    </tr>
    <?php endforeach ?>
</table>