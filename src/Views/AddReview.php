<!DOCTYPE html>
<html lang="en">

<?php include('header.php'); ?>
<body>
    <form method="post">
        <h1>Formulaire</h1>
        <input type="number" name="ISBN" placeholder="ISBN">
        <input type="number" name="note" min="1" max="5" placeholder="note">
        <input type="text" name="text_part" placeholder="text_part">
        <input type="submit" name="send" value="envoyer">
    </form>
</body>

</html>