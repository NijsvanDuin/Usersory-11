<?php require(APPROOT . '/views/includes/header.php') ?>
<h3 class="text-2xl font-bold text-center text-white bg-blue-500 rounded-md p-2 m-2"><?= $data['title'] ?></h3>
<table class="border border-black rounded-md">
    <thead>
        <th>Type</th>
        <th>Kenteken</th>
        <th>Km stand Toevoegen</th>
    </thead>
    <tbody>
        <?php echo $data['rows'] ?>
    </tbody>
</table>
<?php require(APPROOT . '/views/includes/footer.php') ?>