<?php include('../include/header.php'); ?>

<?php
if (!isset($_SESSION['email'])) {
    echo "<meta http-equiv=\"refresh\" content=\"0;URL=/index.php\">";
}
?>

<?php include('../include/footer.php'); ?>
