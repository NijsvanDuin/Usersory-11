<?php require(APPROOT . '/views/includes/header.php') ?>
<h1><?= $data['title'] ?></h1>

<h3>Naam: <?= $data['voornaam'] . ' ' . $data['tussenvoegsel'] . ' ' . $data['achternaam'] ?></h3>
<h3>Datum in dienst: <?= $data['datumInDienst'] ?></h3>
<h3>Aantal Sterren: <?= $data['aantalSterren'] ?></h3>



<table border="1">
    <thead>
        <th>Type Voertuig</th>
        <th>Type</th>
        <th>Kenteken</th>
        <th>Bouwjaar</th>
        <th>Brandstof</th>
        <th>Rijbewijscategorie</th>
    </thead>
    <tbody>
        <?php echo $data['rows'] ?>
    </tbody>
</table>
<?php require(APPROOT . '/views/includes/footer.php') ?>