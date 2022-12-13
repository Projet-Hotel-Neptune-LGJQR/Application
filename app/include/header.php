<?php
session_start();


if (isset($_GET['logout']) && isset($_SESSION['email'])) {
    session_destroy();
    unset($_SESSION['email']);
    header("Refresh:0; url=index.php");
}
?>
<head>
    <meta charset="utf-8">
    <title>Projet Hôtel Neptune</title>
    <base href="/">

    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta content="ie=edge" http-equiv="X-UA-Compatible"/>

    <link href="../assets/css/output.css" rel="stylesheet">
    <link href="../assets/css/global.css" rel="stylesheet">
    <link href="../assets/img/logo.webp" rel="icon" type="image/webp"/>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Karla:wght@400;500&display=swap" rel="stylesheet">

    <script src="../assets/js/turbo.js" type="module" async></script>
</head>

<nav class="bg-color px-2 sm:px-4 py-2.5 w-full">
    <div class="container flex flex-wrap justify-between items-center mx-auto">
        <div class="text-white">
            <a href="index.php"
               class="block rounded-full border-2 shadow-xl mx-auto h-12 w-12 bg-cover bg-center hover:opacity-40 duration-300"
               style="background-image: url('../assets/img/logo.webp')"></a>
        </div>
        <div class="flex md:order-2">
            <button type="button"
                    class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                     xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                          d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                          clip-rule="evenodd"></path>
                </svg>
            </button>
            <div class="hidden md:inline-flex items-center space-x-4">
                <?php if (!isset($_SESSION['email'])) : ?>
                    <a
                            href="../auth/register.php"
                            type="button"
                            class="text-white bg-white hover:bg-black text-md hover:text-white border duration-200 border-white text-black font-medium rounded-lg text-sm px-3 py-1.5 text-center mr-3 md:mr-0">
                        Inscription
                    </a>
                <?php endif ?>
                <div class="flex flex-col justify-center items-center">
                    <?php if (isset($_SESSION['email'])) : ?>
                        <button
                                id="dropdownDefault"
                                (click)="dropdown()"
                                class="inline-flex items-center text-white cursor-pointer bg-white hover:bg-black text-md hover:text-white border duration-200 border-white text-black font-medium rounded-lg text-sm px-3 py-1.5 text-center mr-3 md:mr-0"
                                type="button">
                            Espace client
                            <svg class="ml-2 w-4 h-4" aria-hidden="true" fill="none" stroke="currentColor"
                                 viewBox="0 0 24 24"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                    <?php endif ?>
                    <div id="dropdown"
                         class="hidden absolute z-10 w-33 bg-black rounded divide-y divide-gray-100 shadow"
                         style="top: 9%;">
                        <ul class="py-1 text-sm text-gray-700" aria-labelledby="dropdownDefault">
                            <li>
                                <a href="/client/index.php"
                                   class="block py-2 px-4 hover:bg-gray-100 text-white hover:text-black">Dashboard</a>
                            </li>
                            <li>
                                <a href="/client/settings.php"
                                   class="block cursor-pointer py-2 px-4 hover:bg-gray-100 text-white hover:text-black">Options</a>
                            </li>
                            <?php if (isset($_SESSION['admin'])) : ?>
                                <li>
                                    <a href="/admin/index.php"
                                       class="block cursor-pointer py-2 px-4 hover:bg-gray-100 text-white hover:text-black">Panel
                                        Admin</a>
                                </li>
                            <?php endif ?>
                            <li>
                                <a
                                        data-turbo="false"
                                        href="index.php?logout='1'"
                                        class="block cursor-pointer py-2 px-4 hover:bg-gray-100 text-white hover:text-black">Déconnexion</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="hidden justify-between items-center w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
            <ul
                    class="flex flex-col p-4 mt-4 rounded-lg border border-gray-100 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0">
                <li>
                    <a href="../index.php"
                       id="home"
                       class="block py-2 pr-4 pl-3 text-gray-500 hover:text-white md:p-0">
                        Accueil
                    </a>
                </li>
                <li>
                    <a href="../reservation.php"
                       id="reservation"
                       class="block py-2 pr-4 pl-3 text-gray-500 hover:text-white md:p-0">
                        Réservations
                    </a>
                </li>
                <li>
                    <a href="../contact.php"
                       id="contact"
                       class="block py-2 pr-4 pl-3 text-gray-500 hover:text-white md:p-0">
                        Contact
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

