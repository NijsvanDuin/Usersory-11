<?php require(APPROOT . '/views/includes/header.php') ?>
<h1><?= $data['title'] ?></h1>

<h3>Aantal Instrecteur: <?= $data['aantalInstrecteur'] ?></h3>
<table border="1">
    <thead>
        <th>Voornaam</th>
        <th>Tussenvoegsel</th>
        <th>Achternaam</th>
        <th>Mobiel</th>
        <th>Datum In Dienst</th>
        <th>Aantal Sterren</th>
        <th>Voertuig</th>
    </thead>
    <tbody>
        <?php echo $data['rows'] ?>
    </tbody>
</table>
<?php require(APPROOT . '/views/includes/footer.php') ?>