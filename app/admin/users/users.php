<?php
include('../../include/header.php');
include('../../include/admin.php');
include('../../include/method.php');

if (!isset($_SESSION['admin'])) {
    redirect('index');
}

include "../../database/database.php";

define('users', getAccs());

function delUser($email)
{
    deleteAcc($email, getAccIdFromEmail($email)['id']);
    redirect('admin/users/users');
}

if (isset($_GET['del'])) {
    delUser($_GET['del']);
}
?>

    <section>
        <div class="pt-6">
            <div class="container mx-auto px-4">
                <div class="grid grid-cols-1">
                    <?php foreach (users as $user) : ?>
                        <div class="bg-gray-300 rounded-md sm:h-80 md:h-80 lg:h-32 flex flex-col lg:flex-row justify-between mb-3">
                            <div class="flex flex-col justify-center items-center px-4 py-6 md:py-0">
                                <h1>Prénom:</h1>
                                <span class="font-bold"><?php echo $user[1] ?></span>
                            </div>
                            <div class="flex flex-col justify-center items-center px-4 py-6 md:py-0">
                                <h1>E-Mail:</h1>
                                <span class="font-bold"><?php echo $user[2] ?></span>
                            </div>
                            <div class="pb-6 md:pb-0 lg:border-l-2 lg:border-black flex flex-col justify-center items-center lg:space-y-6 mr-12">
                                <div>
                                    <a type="button"
                                       href="/admin/users/manageUsers?user=<?php echo $user[2] ?>"
                                       class=" ml-12 transform hover:scale-105 motion-reduce:transform-none duration-300 bg-black text-md text-gold-custom duration-200 font-medium text-sm px-3 py-1.5 text-center mr-3 md:mr-0">
                                        Modifier
                                    </a>
                                </div>
                                <div>
                                    <a type="button"
                                       href="/admin/users/del?user=<?php echo $user[2] ?>"
                                       class=" ml-12 transform hover:scale-105 motion-reduce:transform-none duration-300 bg-black text-md text-gold-custom duration-200 font-medium text-sm px-3 py-1.5 text-center mr-3 md:mr-0">
                                        Supprimer
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </section>

<?php include('../../include/footer.php'); ?>