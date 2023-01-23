<?php require(APPROOT . '/views/includes/header.php') ?>
<h3><?= $data['title'] ?></h3>
<?php
//var_dump($data['rows']);
?>
<h5> <?= 'Instrecteur Naam: ' .  $data['instrecteurNaam']; ?></h5>

<table border='1'>
    <thead>
        <th>Datum</th>
        <th>Tijd</th>
        <th>Naam Leerling</th>
        <th>Lesinfo</th>
        <th>Onderwerp</th>
    </thead>
    <tbody>
        <?php echo $data['rows'] ?>
    </tbody>
</table>
<?php require(APPROOT . '/views/includes/footer.php') ?>