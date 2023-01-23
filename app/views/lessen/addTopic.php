<?php require(APPROOT . '/views/includes/header.php') ?>
<h3><?= $data['title'] ?></h3>

<form action="<?= URLROOT ?>/lessen/addTopic" method="post">
    <label for="topic">Onderwerp</label><br>
    <input type="text" name="topic" id="topic">
    <div class="topicError">Meer dan 255 characters</div>
    <br> <br>
    <input type="hidden" name="lesId" value="<?= $data['lesId']; ?>">
    <input type="submit" value="Toevoegen">
</form>
<?php require(APPROOT . '/views/includes/footer.php') ?>