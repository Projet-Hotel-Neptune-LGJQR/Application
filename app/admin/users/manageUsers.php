<?php
include('../../include/header.php');
include('../../include/admin.php');
include('../../database/database.php');

if (!isset($_SESSION['admin'])) {
    echo "<meta http-equiv=\"refresh\" content=\"0;URL=/index\">";
}

if (!isset($_GET['user'])) {
    echo "<meta http-equiv=\"refresh\" content=\"0;URL=/admin/users/users\">";
    die();
}

define('user', getAcc(getAccIdFromEmail($_GET['user'])['id'])[0]);

$name = user[1];
$email = user[2];
$password = user[3];


if (isset($_POST['submit'])) {
    if (isset($_POST['full-name']) && $_POST['full-name'] != "") {
        $name = $_POST['full-name'];
    }
    if (isset($_POST['email']) && $_POST['email'] != "") {
        $email = $_POST['email'];
    }
    if (isset($_POST['password']) && $_POST['password'] != "") {
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    }

    updateAcc($name, $email, $password, user[0]);
    echo "<meta http-equiv=\"refresh\" content=\"0;URL=/admin/users/users\">";
}
?>

<section>
    <div class="pt-6">
        <div class="container mx-auto px-4">

            <div class="container mx-auto p-4 bg-white">
                <div class="w-full md:w-1/2 lg:w-1/3 mx-auto my-12">
                    <h1 class="text-lg font-bold">Modifier le compte</h1>
                    <form class="flex flex-col mt-4" action="/admin/users/manageUsers?user=<?php echo $email ?>"
                          method="post" data-turbo="false">
                        <label>
                            <input
                                    type="text"
                                    name="full-name"
                                    class="px-4 py-3 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm"
                                    placeholder="<?php echo $name ?>"
                            />
                        </label>
                        <label>
                            <input
                                    type="email"
                                    name="email"
                                    class="px-4 py-3 mt-4 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm"
                                    placeholder="<?php echo $email ?>"
                            />
                        </label>
                        <label>
                            <input
                                    type="password"
                                    name="password"
                                    class="px-4 py-3 mt-4 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm"
                                    placeholder="Nouveau mot de passe"
                            />
                        </label>
                        <button
                                type="submit"
                                name="submit"
                                class="mt-4 px-4 py-3 leading-6 text-base rounded-md border border-transparent text-white bg-black hover:bg-white hover:text-black border duration-200 border-black text-gold-custom cursor-pointer inline-flex items-center w-full justify-center items-center font-medium"
                        >
                            Modifier le compte
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

<?php include('../../include/footer.php'); ?>
