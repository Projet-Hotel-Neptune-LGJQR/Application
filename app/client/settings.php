<?php include('../include/header.php'); ?>

<?php
$errorsPass = array();
$errorsMail = array();

if (!isset($_SESSION['email'])) {
    echo "<meta http-equiv=\"refresh\" content=\"0;URL=/index.php\">";
}

include "../database/database.php";

if (isset($_POST['last-password']) && isset($_POST['new-password'])) {
    define('lastPassword', $_POST['last-password']);
    define('newPassword', $_POST['new-password']);
    $email = $_SESSION['email'];

    if (password_verify(lastPassword, getPassword($email)['password'])) {
        changePassword($email, password_hash(newPassword, PASSWORD_DEFAULT));
    } else {
        $errorsPass[] = "L'ancien mot de passe n'est pas correct.";
    }


    unset($_POST['last-password']);
    unset($_POST['new-password']);
}

if (isset($_POST['last-email']) && isset($_POST['new-email'])) {
    define('lastEmail', $_POST['last-email']);
    define('newEmail', $_POST['new-email']);

    if ($_SESSION['email'] == lastEmail) {
        changeMail(lastEmail, newEmail);
        $_SESSION['email'] = newEmail;
    } else {
        $errorsMail[] = "L'ancien mail n'est pas correct.";
    }

    unset($_POST['last-email']);
    unset($_POST['new-email']);
}

if (isset($_POST['delete'])) {
    deleteAcc($_SESSION['email'], getAccIdFromEmail($_SESSION['email'])['id']);
    session_destroy();
    unset($_SESSION['email']);
    echo "<meta http-equiv=\"refresh\" content=\"0;URL=/index.php\">";
}
?>

<section>
    <div class="pt-6">
        <div class="container mx-auto px-4">

            <div class="grid grid-cols-1 md:grid-cols-3 gap-16">
                <div>
                    <h1 class="font-bold">Changer de mot de passe</h1>
                    <form class="flex flex-col mt-4" action="client/settings.php" method="post" data-turbo="false">
                        <label>
                            <input
                                    type="password"
                                    name="last-password"
                                    required
                                    class="px-4 py-3 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm"
                                    placeholder="Votre ancien mot de passe"
                            />
                        </label>
                        <label>
                            <input
                                    type="password"
                                    name="new-password"
                                    required
                                    class="px-4 py-3 mt-4 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm"
                                    placeholder="Votre nouveau mot de passe"
                            />
                        </label>
                        <button
                                type="submit"
                                class="mt-4 px-4 py-3 leading-6 text-base rounded-md border border-transparent text-white bg-black hover:bg-white hover:text-black border duration-200 border-black text-gold-custom cursor-pointer inline-flex items-center w-full justify-center items-center font-medium"
                        >
                            Changer
                        </button>
                        <?php if (count($errorsPass) > 0) : ?>
                            <div class="error">
                                <?php foreach ($errorsPass as $error) : ?>
                                    <p><?php echo $error ?></p>
                                <?php endforeach ?>
                            </div>
                        <?php endif ?>
                    </form>
                </div>
                <div>
                    <h1 class="font-bold">Changer d'email</h1>
                    <form class="flex flex-col mt-4" action="client/settings.php" method="post" data-turbo="false">
                        <label>
                            <input
                                    type="email"
                                    name="last-email"
                                    required
                                    class="px-4 py-3 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm"
                                    placeholder="Votre ancienne email"
                            />
                        </label>
                        <label>
                            <input
                                    type="email"
                                    name="new-email"
                                    required
                                    class="px-4 py-3 mt-4 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm"
                                    placeholder="Votre nouvelle email"
                            />
                        </label>
                        <button
                                type="submit"
                                class="mt-4 px-4 py-3 leading-6 text-base rounded-md border border-transparent text-white bg-black hover:bg-white hover:text-black border duration-200 border-black text-gold-custom cursor-pointer inline-flex items-center w-full justify-center items-center font-medium"
                        >
                            Changer
                        </button>
                        <?php if (count($errorsMail) > 0) : ?>
                            <div class="error">
                                <?php foreach ($errorsMail as $error) : ?>
                                    <p><?php echo $error ?></p>
                                <?php endforeach ?>
                            </div>
                        <?php endif ?>
                    </form>
                </div>
                <div>
                    <h1 class="font-bold">Supprimer votre compte</h1>
                    <form action="client/settings.php" method="post" data-turbo="false">
                        <button
                                type="submit"
                                name="delete"
                                class="mt-4 px-4 py-3 leading-6 text-base rounded-md text-white bg-red-600 hover:bg-red-400 hover:text-black duration-200 text-gold-custom cursor-pointer inline-flex items-center w-full justify-center items-center font-medium"
                        >
                            Supprimer
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

<?php include('../include/footer.php'); ?>
