<?php
include('../include/header.php');

if (!isset($_SESSION['admin'])) {
    echo "<meta http-equiv=\"refresh\" content=\"0;URL=/index\">";
}
?>

    <section>
        <div class="pt-6">
            <div class="container mx-auto px-4">
                <div class="flex justify-center mb-6">

                    <a data-turbo-preload
                       href="/admin/room/rooms"
                       class="transform hover:scale-105 motion-reduce:transform-none duration-300 text-white bg-black text-md text-gold-custom border duration-200 border-white font-medium text-sm px-3 py-1.5 text-center mr-3 md:mr-0">
                        Gestion des chambres
                    </a>

                    <a data-turbo-preload
                       href="/admin/users/users"
                       class="transform hover:scale-105 motion-reduce:transform-none duration-300 text-white bg-black text-md text-gold-custom border duration-200 border-white font-medium text-sm px-3 py-1.5 text-center mr-3 md:mr-0">
                        Gestion des utilisateurs
                    </a>

                </div>
            </div>
        </div>
    </section>


<?php include('../include/footer.php'); ?>