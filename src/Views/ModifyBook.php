<!DOCTYPE html>
<html lang="en">

    <body>
    <?php include('header.php'); ?>
    <form method="post">
        <h1>Formulaire</h1>
        <input type="number" name="ISBN" placeholder="ISBN">
        <input type="text" name="title" value="<?= $Result->getTitle()?>">
        <input type="text" name="resume" value="<?= $Result->getResume()?>">
        <input type="number" name="author" value="<?= $Result->getAuthor()?>">
        <input type="number" name="editor" value="<?= $Result->getEditor()?>">
        <input type="number" name="nb_available" value="<?= $Result->getTotal_borrow_number()?>">
        <input type="submit" name="send" value="envoyer">

    </form>
</body>

</html>