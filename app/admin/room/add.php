<?php include('../../include/header.php'); ?>
<?php include('../../include/admin.php'); ?>

<?php
if (!isset($_SESSION['admin'])) {
    echo "<meta http-equiv=\"refresh\" content=\"0;URL=/index.php\">";
}
$errors = array();
include "../../database/database.php";

if (isset($_POST['room-name']) && isset($_POST['room-star'])
    && isset($_POST['room-rating']) && isset($_POST['room-price']) && !empty($_FILES['room-firstimage'])) {
    define('room_name', $_POST['room-name']);
    define('room_star', $_POST['room-star']);
    define('room_rating', $_POST['room-rating']);
    define('room_price', $_POST['room-price']);
    define('room_firstimage', $_FILES["room-firstimage"]);
    define('room_description', $_POST["room-description"]);

    $uuid = uniqid();

    for ($i = 0; $i < 2; $i++) {
        $uuid .= uniqid();
    }

    $fileNameCmps = explode(".", room_firstimage['name']);
    $fileExtension = '.' . strtolower(end($fileNameCmps));

    $path = "uploads/" . $uuid . $fileExtension;

    if (move_uploaded_file(room_firstimage['tmp_name'], $path)) {
        createRooms(room_name, room_star, room_rating, room_price, 'admin/room/' . $path, room_description);
        echo "<meta http-equiv=\"refresh\" content=\"0;URL=/admin/room/rooms.php\">";
    }
}

?>

    <section>
        <div class="pt-6">
            <div class="container mx-auto px-4">
                <div class="container mx-auto p-4 bg-white">
                    <div class="w-full md:w-1/2 lg:w-1/3 mx-auto my-12">
                        <h1 class="text-lg font-bold">Ajouter une chambre</h1>
                        <form class="flex flex-col mt-4" enctype="multipart/form-data" action="/admin/room/add.php"
                              method="post" data-turbo="false">
                            <label>
                                <input
                                        type="text"
                                        name="room-name"
                                        required
                                        class="px-4 py-3 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm"
                                        placeholder="Nom de la chambre"
                                />
                            </label>
                            <label>
                                <input
                                        type="number"
                                        name="room-star"
                                        required
                                        class="px-4 py-3 mt-4 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm"
                                        placeholder="Note de la chambre"
                                />
                            </label>
                            <label>
                                <input
                                        type="number"
                                        name="room-rating"
                                        required
                                        class="px-4 py-3 mt-4 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm"
                                        placeholder="Nombre de note de la chambre"
                                />
                            </label>
                            <label>
                                <input
                                        type="number"
                                        name="room-price"
                                        required
                                        class="px-4 py-3 mt-4 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm"
                                        placeholder="Prix de la chambre"
                                />
                            </label>
                            <label>
                                <input
                                        type="file"
                                        name="room-firstimage"
                                        required
                                        accept="image/png, image/jpeg"
                                        class="px-4 py-3 mt-4 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm"
                                        placeholder="Première image de la chambre"
                                />
                            </label>
                            <label>
                                <textarea
                                        name="room-description"
                                        required
                                        class="px-4 py-3 mt-4 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm"
                                        placeholder="Description de la chambre"></textarea>
                            </label>
                            <button
                                    type="submit"
                                    class="mt-4 px-4 py-3 leading-6 text-base rounded-md border border-transparent text-white bg-black hover:bg-white hover:text-black border duration-200 border-black text-gold-custom cursor-pointer inline-flex items-center w-full justify-center items-center font-medium"
                            >
                                Ajouter la chambre
                            </button>
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