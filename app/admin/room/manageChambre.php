<?php
include('../../include/header.php');
include('../../include/admin.php');
include('../../database/database.php');

if (!isset($_SESSION['admin'])) {
    echo "<meta http-equiv=\"refresh\" content=\"0;URL=/index\">";
    die();
}

if (!isset($_GET['id'])) {
    echo "<meta http-equiv=\"refresh\" content=\"0;URL=/admin/room/rooms\">";
    die();
}

$errors = array();

define('room', getRoom($_GET['id']));

if (isset($_GET['del'])) {
    deleteRoom($_GET['del']);
    echo "<meta http-equiv=\"refresh\" content=\"0;URL=/admin/room/rooms\">";
}
?>

<section>
    <div class="pt-6">
        <div class="container mx-auto px-4">
            <div class="container mx-auto p-4 bg-white">
                <div class="w-full md:w-1/2 lg:w-1/3 mx-auto my-12">
                    <h1 class="text-lg font-bold">Modifier une chambre</h1>
                    <form class="flex flex-col mt-4" enctype="multipart/form-data" action="/admin/room/manageChambre"
                          method="post" data-turbo="false">
                        <label>
                            <input
                                type="text"
                                name="room-name"
                                required
                                class="px-4 py-3 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm"
                                placeholder="<?php echo room['name'] ?>"
                            />
                        </label>
                        <label>
                            <input
                                type="number"
                                name="room-star"
                                required
                                class="px-4 py-3 mt-4 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm"
                                placeholder="<?php echo room['stars'] ?>"
                            />
                        </label>
                        <label>
                            <input
                                type="number"
                                name="room-rating"
                                required
                                class="px-4 py-3 mt-4 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm"
                                placeholder="<?php echo room['rating'] ?>"
                            />
                        </label>
                        <label>
                            <input
                                type="number"
                                name="room-price"
                                required
                                class="px-4 py-3 mt-4 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm"
                                placeholder="<?php echo room['price'] ?>"
                            />
                        </label>
                        <label>
                            <input
                                type="file"
                                name="room-firstimage"
                                required
                                accept="image/png, image/jpeg"
                                class="px-4 py-3 mt-4 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm"
                                placeholder="<?php echo room['firstImage'] ?>"
                            />
                        </label>
                        <label>
                                <textarea
                                    name="room-description"
                                    required
                                    class="px-4 py-3 mt-4 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm"
                                    placeholder="<?php echo room['description'] ?>"></textarea>
                        </label>
                        <button
                            type="submit"
                            class="mt-4 px-4 py-3 leading-6 text-base rounded-md border border-transparent text-white bg-black hover:bg-white hover:text-black border duration-200 border-black text-gold-custom cursor-pointer inline-flex items-center w-full justify-center items-center font-medium"
                        >
                            Modifier la chambre
                        </button>
                        <a
                                href="/admin/room/manageChambre?id=<?php echo room['id'] ?>&del=<?php echo room['id'] ?>"
                                class="mt-4 px-4 py-3 leading-6 text-base rounded-md border border-transparent text-white bg-black hover:bg-white hover:text-black border duration-200 border-black text-gold-custom cursor-pointer inline-flex items-center w-full justify-center items-center font-medium"
                        >
                            Supprimer la chambre
                        </a>
                        <?php if (count($errors) > 0) : ?>
                            <div class="error">
                                <?php foreach ($errors as $error) : ?>
                                    <p><?php echo $error ?></p>
                                <?php endforeach ?>
                            </div>
                        <?php endif ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include('../../include/footer.php'); ?>
