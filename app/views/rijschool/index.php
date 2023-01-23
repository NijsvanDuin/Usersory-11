<?php require(APPROOT . '/views/includes/header.php') ?>
<?= $data['title'] ?>
<h3 class=""></h3>
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