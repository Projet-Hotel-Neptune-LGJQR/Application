<?php include('../../include/header.php'); ?>
<?php include('../../include/admin.php'); ?>

<?php
if (!isset($_SESSION['admin'])) {
    echo "<meta http-equiv=\"refresh\" content=\"0;URL=/index.php\">";
}
?>

    <section>
        <div class="pt-6">
            <div class="container mx-auto px-4">
                <div class="flex justify-center mb-6">

                    <a href="/admin/room/add.php"
                       class="transform hover:scale-105 motion-reduce:transform-none duration-300 text-white bg-black text-md text-gold-custom border duration-200 border-white font-medium text-sm px-3 py-1.5 text-center mr-3 md:mr-0">
                        Ajouter une chambres
                    </a>

                </div>
            </div>
        </div>
    </section>

<?php include('../../include/footer.php'); ?>