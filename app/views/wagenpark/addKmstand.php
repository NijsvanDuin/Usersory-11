<?php require(APPROOT . '/views/includes/header.php') ?>
<h3 class="text-2xl font-bold text-center text-white bg-blue-500 rounded-md p-2 m-2"><?= $data['title'] ?></h3>


<form action="<?= URLROOT ?>/wagenparken/addKmstand" method="post" class="flex flex-col w-1/2 mx-auto border border-black rounded-md p-2 m-2">
    <label class="flex flex-col">
        KmStand
        <input type="text" name="KmStand" class="border border-black rounded-md">
    </label>
    <!-- <div class="topicError">Meer dan 255 characters</div> -->
    <br> <br>
    <input type="hidden" name="AutoId" value="<?= $data['AutoId']; ?>">
    <input type="submit" value="Toevoegen" class="border border-black rounded-md hover:bg-amber-400">
</form>
<?php require(APPROOT . '/views/includes/footer.php') ?>