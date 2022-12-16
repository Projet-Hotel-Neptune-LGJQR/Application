<?php
include('../../include/header.php');
include('../../include/admin.php');
include('../../database/database.php');
include('../../include/method.php');

if (!isset($_SESSION['admin'])) {
    redirect('index');
    die();
}

if (!isset($_GET['id'])) {
    redirect('admin/room/rooms');
    die();
}

$errors = array();

define('room', getRoom($_GET['id']));

if (isset($_GET['del'])) {
    deleteRoom($_GET['del']);
    redirect('admin/room/rooms');
}

$room_name = room['name'];
$room_star = room['stars'];
$room_rating = room['rating'];
$room_price = room['price'];
$room_firstImage = room['firstImage'];
$room_description = room['description'];

if (isset($_POST['submit'])) {
    if (isset($_POST['room-name']) && $_POST['room-name'] != "") {
        $room_name = $_POST['room-name'];
    }
    if (isset($_POST['room-star']) && $_POST['room-star'] != "") {
        $room_star = $_POST['room-star'];

    }
    if (isset($_POST['room-rating']) && $_POST['room-rating'] != "") {
        $room_rating = $_POST['room-rating'];

    }
    if (isset($_POST['room-price']) && $_POST['room-price'] != "") {
        $room_price = $_POST['room-price'];

    }
    if (!empty($_FILES['room-firstimage'])) {
        define('room_firstimage', $_FILES["room-firstimage"]);

        $uuid = uniqid();

        for ($i = 0; $i < 2; $i++) {
            $uuid .= uniqid();
        }

        $fileNameCmps = explode(".", room_firstimage['name']);
        $fileExtension = '.' . strtolower(end($fileNameCmps));

        $path = "uploads/" . $uuid . $fileExtension;
        if (move_uploaded_file(room_firstimage['tmp_name'], $path)) {
            $room_firstImage = 'admin/room/' . $path;
        }
    }

    updateRoom($room_name, $room_star, $room_rating, $room_price, $room_firstImage, $room_description, room['id']);
    redirect('admin/room/rooms');
}
?>

<section>
    <div class="pt-6">
        <div class="container mx-auto px-4">
            <div class="container mx-auto p-4 bg-white">
                <div class="w-full md:w-1/2 lg:w-1/3 mx-auto my-12">
                    <h1 class="text-lg font-bold">Modifier une chambre</h1>
                    <form class="flex flex-col mt-4" enctype="multipart/form-data"
                          action="/admin/room/manageChambre?id=<?php echo room['id'] ?>"
                          method="post" data-turbo="false">
                        <label>
                            <input
                                    type="text"
                                    name="room-name"
                                    class="px-4 py-3 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm"
                                    placeholder="<?php echo $room_name ?>"
                            />
                        </label>
                        <label>
                            <input
                                    type="number"
                                    name="room-star"
                                    class="px-4 py-3 mt-4 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm"
                                    placeholder="<?php echo $room_star ?>"
                            />
                        </label>
                        <label>
                            <input
                                    type="number"
                                    name="room-rating"
                                    class="px-4 py-3 mt-4 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm"
                                    placeholder="<?php echo $room_rating ?>"
                            />
                        </label>
                        <label>
                            <input
                                    type="number"
                                    name="room-price"
                                    class="px-4 py-3 mt-4 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm"
                                    placeholder="<?php echo $room_price ?>"
                            />
                        </label>
                        <label>
                            <input
                                    type="file"
                                    name="room-firstimage"
                                    accept="image/png, image/jpeg"
                                    class="px-4 py-3 mt-4 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm"
                                    placeholder="<?php echo $room_firstImage ?>"
                            />
                        </label>
                        <label>
                                <textarea
                                        name="room-description"
                                        class="px-4 py-3 mt-4 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm"
                                        placeholder="<?php echo $room_description ?>"></textarea>
                        </label>
                        <button
                                type="submit"
                                name="submit"
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
