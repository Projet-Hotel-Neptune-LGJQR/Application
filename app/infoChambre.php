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

if (isset($_GET['res'])) {
    if (!isset($_SESSION['email'])) {
        echo "<meta http-equiv=\"refresh\" content=\"0;URL=/auth/login.php\">";
        die();
    }

    define('resId', $_GET['res']);
    createReservation(getAccIdFromEmail($_SESSION['email'])['id'], resId);
    echo "<meta http-equiv=\"refresh\" content=\"0;URL=/client/index.php\">";
}
?>

    <section>
        <section class="py-20">
            <div class="container mx-auto">

                <section class="px-4 lg:px-20">

                    <div class="mt-auto py-4">
                        <p class="mb-2 text-xl font-bold font-heading">
                            <?php echo room['name'] ?>
                        </p>

                        <div class=" flex items-center font-heading">
                            {{this.offer.location}}
                        </div>
                    </div>

                    <div class="flex flex-wrap lg:space-x-12">

                        <div class="lg:w-3/5">
                            <div class="mb-4 text-2xl font-medium text-center text-gray-900 lg:text-3xl"></div>
                            <img alt="" src="<?php echo room['firstImage'] ?>"
                                 class="rounded-none lg:rounded-lg shadow-2xl">

                            <div class="mt-4">
                                <h4 class="text-2xl font-bold">Description</h4>
                                <p class="my-4"><?php echo room['description'] ?></p>
                            </div>
                        </div>

                        <div class="lg:w-1/3 py-4">
                            <h4 class="text-2xl font-bold text-center"><?php echo room['price'] ?> €</h4>

                            <div class="flex justify-center">
                                <a href="infoChambre.php?id=<?php echo room['id'] ?>&res=<?php echo room['id'] ?>"
                                        class="cursor-pointer transform hover:scale-105 motion-reduce:transform-none duration-300 text-white bg-black text-md text-gold-custom border duration-200 border-white font-medium text-sm px-3 py-1.5 text-center mr-3 md:mr-0">
                                    Reserver cette chambre
                                </a>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </section>
    </section>

<?php include('./include/footer.php'); ?>