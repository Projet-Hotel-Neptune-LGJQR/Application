<?php
include('./include/header.php');

define('maxDate', date("Y-m-d", strtotime(' + 1 years')));
define('currentData', date("Y-m-d"));

include('./database/database.php');

$showedOffers = array();
$errors = array();

if (isset($_POST['trip-start']) && isset($_POST['trip-end']) && isset($_POST['price'])) {
    define('trip_start', $_POST['trip-start']);
    define('trip_end', $_POST['trip-end']);
    define('trip_price', $_POST['price']);

    define('time', floor(abs(strtotime(trip_end) - strtotime(trip_start)))/86400);

    $reserved = array();

    foreach (getReservations() as $res) {
        $reserved[] = $res[2];
    }

    foreach (getRooms() as $room) {
        if ($room[4] <= trip_price && !in_array($room[0], $reserved)) {
            $showedOffers[] = $room;
        }
    }

    if (empty($showedOffers)) {
        $errors[] = "Aucune offre correspond à votre demande.";
    }

}
?>

    <section class="pt-12">
        <h1 class="font-medium text-3xl ml-6">Sélection de chambre</h1>
    </section>

    <section class="pt-12">
        <form class="bg-grey-custom px-2 sm:px-4 py-2.5 w-full sm:h-64 md:h-40" action="reservation" method="post"
              data-turbo="false">
            <div class="container flex flex-wrap justify-between items-center mx-auto">
                <div class="container flex items-center justify-center md:justify-between">
                    <div class="container flex flex-col md:items-center md:space-x-8 md:flex-row">
                        <div class="flex flex-col">
                            <span class="text-white">Chambre et occupent</span>
                            <label>
                                <select>
                                    <option value="0">1 chambre, 1 client</option>
                                    <option value="1">1 chambre, 2 clients</option>
                                    <option value="2">1 chambre, 4 client</option>
                                </select>
                            </label>

                        </div>
                        <div class="flex flex-col ">
                            <span class="text-white">Arrivé</span>
                            <label for="start">
                                <input type="date" id="start" name="trip-start"
                                       value='<?php echo currentData ?>'
                                       min='<?php echo currentData ?>' max='<?php echo maxDate ?>'
                            </label>
                        </div>
                        <div class="flex flex-col ">
                            <span class="text-white">Départ</span>
                            <label for="start">
                                <input type="date" id="start" name="trip-end"
                                       value='<?php echo date("Y-m-d", strtotime(' + 1 day')) ?>'
                                       min='<?php echo currentData ?>' max='<?php echo maxDate ?>'
                            </label>
                        </div>
                    </div>
                    <div>
                        <div>
                            <button type="submit"
                                    class="transform hover:scale-105 motion-reduce:transform-none duration-300 bg-black text-md text-gold-custom duration-200 font-medium text-sm px-3 py-1.5 text-center mr-3 md:mr-0">
                                Rechercher
                            </button>
                        </div>

                    </div>
                </div>
            </div>
            <div class="pt-8">
                <div class="container flex items-center justify-center md:justify-between">
                    <div class="flex flex-col">
                        <span class="text-white">Préférences tarifaires</span>
                        <label for="cowbell">
                            <input type="range" name="price" value="0" min="30" max="390"
                                   oninput="num.value = this.value + '€'">
                            <output id="num" class="text-white text-lg">30€</output>
                        </label>
                    </div>
                </div>
            </div>
        </form>
    </section>

    <section class="pb-12 animate__animated animate__fadeInLeft">
        <div class="pt-6">
            <div class="container mx-auto px-4">
                <div class="flex flex-wrap -mx-4">
                    <?php if (count($errors) > 0) : ?>
                        <div class="error">
                            <?php foreach ($errors as $error) : ?>
                                <p class="text-red-500"><?php echo $error ?></p>
                            <?php endforeach ?>
                        </div>
                    <?php endif ?>
                    <?php foreach ($showedOffers as $room) : ?>
                        <div class="w-full sm:w-1/2 md:w-1/2 xl:w-1/3 p-4">
                            <a class="c-card block bg-gray-300 shadow-md hover:shadow-xl rounded-lg overflow-hidden"
                               data-turbo-preload
                               href="infoChambre?id=<?php echo $room[0] ?>&time=<?php echo time ?>">
                                <div class="relative pb-48 overflow-hidden">
                                    <img alt="" class="absolute inset-0 h-full w-full object-cover"
                                         src="<?php echo $room[5] ?>" width="30">
                                </div>
                                <div class="p-4">
                                    <h2 class="mt-2 mb-2  font-bold"><?php echo $room[1] ?></h2>
                                    <div class="flex flex-col justify-center items-center py-6 md:py-0">
                                        <div class="flex items-center">
                                            <svg class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 20 20"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                            </svg>
                                            <svg class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 20 20"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                            </svg>
                                            <svg class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 20 20"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                            </svg>
                                            <svg class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 20 20"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                            </svg>
                                            <svg class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 20 20"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                            </svg>

                                            <div class="flex items-center">
                                                <div>
                                                    <span class="ml-3"><?php echo $room[2] ?> étoiles</span>
                                                </div>
                                                <div class="border-l-2 border-black ml-3">
                                                    <span class="text-sm ml-3"><?php echo $room[3] ?> avis</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-3 flex items-center">
                                        <span class="text-sm font-semibold"></span>&nbsp;<span
                                                class="font-bold text-xl"><?php echo $room[4] ?></span>&nbsp;<span
                                                class="text-sm font-semibold">€/nuit</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </section>


<?php include('./include/footer.php'); ?>