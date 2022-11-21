<?php include('../include/header.php'); ?>

<?php
$errors = array();

if (isset($_POST['email']) && isset($_POST['password'])) {
    define('email', $_POST['email']);
    define('password', $_POST['password']);

    include "../database/database.php";

    if (isAccExists(email)) {
        if (password_verify(password, getPassword(email)['password'])) {
            if (isAdmin(email) > 0) {
                $_SESSION['admin'] = true;
            }
            $_SESSION['email'] = email;
            $_SESSION['success'] = "You are now logged in";
            echo "<meta http-equiv=\"refresh\" content=\"0;URL=/index.php\">";
            return;
        }
        $errors[] = "Mauvais identifiants.";
    } else {
        $errors[] = "Ce compte n'existe pas.";
    }
}


?>

<section>
    <div class="pt-6">
        <div class="container mx-auto px-4">

            <div class="container mx-auto p-4 bg-white">
                <div class="w-full md:w-1/2 lg:w-1/3 mx-auto my-12">
                    <h1 class="text-lg font-bold">Connexion</h1>
                    <form class="flex flex-col mt-4" action="auth/login.php" method="post">
                        <label>
                            <input
                                    type="email"
                                    name="email"
                                    required
                                    class="px-4 py-3 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm"
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
                        <button
                                type="submit"
                                class="mt-4 px-4 py-3 leading-6 text-base rounded-md border border-transparent text-white bg-black hover:bg-white hover:text-black border duration-200 border-black text-gold-custom cursor-pointer inline-flex items-center w-full justify-center items-center font-medium"
                        >
                            Se connecter
                        </button>
                        <?php if (count($errors) > 0) : ?>
                            <div class="error">
                                <?php foreach ($errors as $error) : ?>
                                    <p><?php echo $error ?></p>
                                <?php endforeach ?>
                            </div>
                        <?php endif ?>
                        <div class="flex flex-col items-center mt-5">
                            <p class="mt-1 text-xs font-light text-gray-500">
                                Vous n'avez pas de compte ?
                                <a class="ml-1 font-medium text-gold-custom" href="auth/register.php">
                                    Inscrivez-vous
                                </a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

<?php include('../include/footer.php'); ?>
