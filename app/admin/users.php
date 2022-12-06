<?php include('../include/header.php'); ?>
<?php include('../include/admin.php'); ?>

<?php
if (!isset($_SESSION['admin'])) {
    echo "<meta http-equiv=\"refresh\" content=\"0;URL=/index.php\">";
}
?>

<?php include('../include/footer.php'); ?>
