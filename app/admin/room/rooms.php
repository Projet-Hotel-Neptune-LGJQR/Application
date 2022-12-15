<?php
include('../../include/header.php');
include('../../include/admin.php');
include('../../database/database.php');

if (!isset($_SESSION['admin'])) {
    echo "<meta http-equiv=\"refresh\" content=\"0;URL=/index\">";
}
?>

    <section>
        <div class="pt-6">
            <div class="container mx-auto px-4">
                <div class="flex justify-center mb-6">

                    <a data-turbo-preload
                       href="/admin/room/add"
                       class="transform hover:scale-105 motion-reduce:transform-none duration-300 text-white bg-black text-md text-gold-custom border duration-200 border-white font-medium text-sm px-3 py-1.5 text-center mr-3 md:mr-0">
                        Ajouter une chambres
                    </a>

                </div>
            </div>
        </div>
    </section>

    <section class="pb-12">
        <div class="pt-6">
            <div class="container mx-auto px-4">
                <div class="flex flex-wrap -mx-4">
                    <?php foreach (getRooms() as $room) : ?>
                        <div class="w-full sm:w-1/2 md:w-1/2 xl:w-1/3 p-4">
                            <a class="c-card block bg-gray-300 shadow-md hover:shadow-xl rounded-lg overflow-hidden"
                               data-turbo-preload
                               href="/admin/room/manageChambre?id=<?php echo $room[0] ?>">
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

<?php include('../../include/footer.php'); ?>