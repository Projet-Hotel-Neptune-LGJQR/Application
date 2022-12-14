<?php include('./include/header.php'); ?>

    <section>
        <div class="pt-6">
            <div class="container mx-auto px-4">
                <div class="flex justify-center mb-6">
                    <p class="text-3xl font-bold gradient">
                        Nous contacter
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="pt-6">
            <div class="container mx-auto px-4">

                <div class="container mx-auto p-4 bg-white">
                    <div class="w-full md:w-1/2 lg:w-1/3 mx-auto my-12">
                        <form class="flex flex-col mt-4" action="contact" method="post" data-turbo="false">
                            <label>
                                <input
                                        type="text"
                                        name="name"
                                        required
                                        class="px-4 py-3 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm"
                                        placeholder="Nom / Prénom"
                                />
                            </label>
                            <label>
                                <input
                                        type="email"
                                        name="email"
                                        required
                                        class="px-4 py-3 mt-4 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm"
                                        placeholder="Votre adresse mail"
                                />
                            </label>
                            <label>
                                <textarea
                                        name="message"
                                        required
                                        class="px-4 py-3 mt-4 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm"
                                        placeholder="Votre message"></textarea>
                            </label>
                            <button
                                    type="submit"
                                    class="mt-4 px-4 py-3 leading-6 text-base rounded-md border border-transparent text-white bg-black hover:bg-white hover:text-black border duration-200 border-black text-gold-custom cursor-pointer inline-flex items-center w-full justify-center items-center font-medium"
                            >
                                Envoyer le message
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>

<?php include('./include/footer.php'); ?>