<?php include('./include/header.php'); ?>

<?php
if (!isset($_GET['id'])) {
    echo "<meta http-equiv=\"refresh\" content=\"0;URL=/reservation.php\">";
    die();
}

include 'database/database.php';

define('id', $_GET['id']);

if (!isRoomExists(id)) {
    echo "<meta http-equiv=\"refresh\" content=\"0;URL=/reservation.php\">";
    die();
}
define('room', getRoom(id));
?>

    <section>
        <div class="pt-20">
            <div class="container mx-auto px-4">

                <div class="mb-16 max-w-2xl mx-auto text-center">
                    <div class=" text-center mb-16">
                        <h1 class="mb-2 text-4xl lg:text-5xl font-bold font-heading">
                            <?php echo room['name'] ?>
                        </h1>
                    </div>
                </div>

                <div class="max-w-4xl flex items-center flex-wrap mx-auto lg:my-0">

                    <div
                            class="w-full lg:w-3/5 rounded-lg lg:rounded-l-lg lg:rounded-r-none mx-6 lg:mx-0"
                            id="profile">
                        <div class="p-4 md:p-12 text-center lg:text-left">
                            <div class="block lg:hidden rounded-full shadow-xl mx-auto -mt-16 h-48 w-48 bg-cover bg-center"
                                 style="background-image: url(<?php echo room['firstImage'] ?>)"></div>
                            <div class="text-3xl font-body pt-8 lg:pt-0 mb-4">
                                <span class="text-sm font-semibold"></span>&nbsp;<span
                                        class="font-bold text-xl"><?php echo room['price'] ?></span>&nbsp;<span
                                        class="text-sm font-semibold">€</span>
                            </div>
                            <button type="button"
                                    class="transform hover:scale-105 motion-reduce:transform-none duration-300 text-white bg-black text-md text-gold-custom border duration-200 border-white font-medium text-sm px-3 py-1.5 text-center mr-3 md:mr-0">
                                Reserver cette chambre
                            </button>
                        </div>
                    </div>

                    <div class="w-full lg:w-2/5">
                        <div class="relative" style="z-index: 0;">
                            <img alt="Photo de profil" class="rounded-none lg:rounded-lg shadow-2xl hidden lg:block w-full h-full"
                                 src="<?php echo room['firstImage'] ?>">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>


<?php include('./include/footer.php'); ?>