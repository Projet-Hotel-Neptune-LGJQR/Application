<?php include('../include/header.php'); ?>

<?php
$errors = array();

include '../database/database.php';

if (isset($_POST['full-name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['repeat-password'])) {
    define('name', $_POST['full-name']);
    define('email', $_POST['email']);
    define('password', $_POST['password']);
    define('confirmPassword', $_POST['repeat-password']);

    if (isAccExists(email)) {
        $errors[] = "Ce compte existe déjà.";
    } else {
        createAcc(name, email, password_hash(password, PASSWORD_DEFAULT));
        echo "<meta http-equiv=\"refresh\" content=\"0;URL=/auth/login.php\">";
    }
}

?>

    <section>
        <div class="pt-6">
            <div class="container mx-auto px-4">

                <div class="container mx-auto p-4 bg-white">
                    <div class="w-full md:w-1/2 lg:w-1/3 mx-auto my-12">
                        <h1 class="text-lg font-bold">Inscription</h1>
                        <form class="flex flex-col mt-4" action="auth/register.php" method="post" data-turbo="false">
                            <label>
                                <input
                                        type="text"
                                        name="full-name"
                                        required
                                        class="px-4 py-3 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm"
                                        placeholder="Votre prénom"
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
                                <input
                                        type="password"
                                        name="password"
                                        required
                                        class="px-4 py-3 mt-4 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm"
                                        placeholder="Votre mot de passe"
                                />
                            </label>
                            <label>
                                <input
                                        type="password"
                                        name="repeat-password"
                                        required
                                        class="px-4 py-3 mt-4 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm"
                                        placeholder="Confirmation du mot de passe"
                                />
                            </label>
                            <button
                                    type="submit"
                                    class="mt-4 px-4 py-3 leading-6 text-base rounded-md border border-transparent text-white bg-black hover:bg-white hover:text-black border duration-200 border-black text-gold-custom cursor-pointer inline-flex items-center w-full justify-center items-center font-medium"
                            >
                                S'inscrire
                            </button>
                            <?php if (count($errors) > 0) : ?>
                                <div class="error">
                                    <?php foreach ($errors as $error) : ?>
                                        <p><?php echo $error ?></p>
                                    <?php endforeach ?>
                                </div>
                            <?php endif ?>
                        </form>
                        <div class="flex flex-col items-center mt-5">
                            <p class="mt-1 text-xs font-light text-gray-500">
                                Vous avez déjà un compte ?
                                <a class="ml-1 font-medium text-gold-custom" href="auth/login.php">
                                    Connectez-vous
                                </a>
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

<?php include('../include/footer.php'); ?>