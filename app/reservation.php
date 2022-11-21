<?php include('./include/header.php'); ?>

<section class="pt-12">
    <h1 class="font-medium text-3xl ml-6">Sélection de chambre</h1>
</section>

<section class="pt-12">
    <div class="bg-grey-custom px-2 sm:px-4 py-2.5 w-full sm:h-64 md:h-40" style="">
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
                                   value="2018-07-22"
                                   min="2018-01-01" max="2018-12-31">
                        </label>
                    </div>
                    <div class="flex flex-col ">
                        <span class="text-white">Départ</span>
                        <label for="start">
                            <input type="date" id="start" name="trip-start"
                                   value="2018-07-22"
                                   min="2018-01-01" max="2018-12-31">
                        </label>
                    </div>
                </div>
                <div>
                    <div>
                        <button type="button"
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
                        <input type="range" value="0" min="59" max="390" oninput="num.value = this.value + '€'">
                        <output id="num" class="text-white text-lg">59€</output>
                    </label>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="pb-12">
    <div class="pt-6">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1">
                <div class="bg-gray-300 rounded-md sm:h-80 md:h-80 lg:h-32 flex flex-col lg:flex-row justify-between">
                    <div>
                        <img class="max-h-full max-w-full rounded-lg transform hover:scale-105 motion-reduce:transform-none duration-300"
                             src="assets/img/room/chambre_double.jpg" alt="">
                    </div>
                    <div class="flex flex-col justify-center items-center py-6 md:py-0">
                        <h1 class="font-bold">Chambre double</h1>
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
                                    <span class="ml-3">5 étoiles</span>
                                </div>
                                <div class="border-l-2 border-black ml-3">
                                    <span class="text-sm ml-3">216 avis</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col justify-center items-center pb-6 md:pb-0">
                        <p>Informations</p>
                    </div>
                    <div class="pb-6 md:pb-0 lg:border-l-2 lg:border-black flex flex-col justify-center items-center lg:space-y-6 mr-12">
                        <div class="ml-12">
                            <span class="text-xl font-bold">235 €</span>
                        </div>
                        <div>
                            <button type="button"
                                    class=" ml-12 transform hover:scale-105 motion-reduce:transform-none duration-300 bg-black text-md text-gold-custom duration-200 font-medium text-sm px-3 py-1.5 text-center mr-3 md:mr-0">
                                Réserver
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include('./include/footer.php'); ?>
