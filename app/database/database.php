<?php
$host = 'localhost';
$port = 3306;
$dbname = 'projethotelneptune';
$user = 'hotelneptune';
$pass = 'password';

$db = mysqli_connect($host, $user, $pass, $dbname, $port);
mysqli_set_charset($db, 'utf8mb4');

if (mysqli_connect_errno()) {
    echo "Impossible de se connecter à MySQL: " . mysqli_connect_error();
    exit();
}

function isAccExists($email)
{
    global $db;
    $user_check_query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($db, $user_check_query);
    return mysqli_fetch_assoc($result);
}

function createAcc($name, $email, $password)
{
    global $db;

    $query = "INSERT IGNORE INTO users (name, email, password, isAdmin) 
  			  VALUES('$name', '$email', '$password', false)";

    return mysqli_query($db, $query);
}

function getAccs()
{
    global $db;

    $query = "SELECT * FROM users";
    $result = mysqli_query($db, $query);

    return mysqli_fetch_all($result);
}

function getAccIdFromEmail($email)
{
    global $db;
    $query = "SELECT id FROM users WHERE email='$email'";
    $result = mysqli_query($db, $query);
    return mysqli_fetch_assoc($result);
}


function getPassword($email)
{
    global $db;
    $query = "SELECT password FROM users WHERE email='$email'";
    $result = mysqli_query($db, $query);
    return mysqli_fetch_assoc($result);
}

function loginAcc($email, $password)
{
    global $db;
    $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    return mysqli_num_rows(mysqli_query($db, $query));
}

function isAdmin($email)
{
    global $db;
    $query = "SELECT isAdmin FROM users WHERE email='$email'";
    $result = mysqli_query($db, $query);
    return mysqli_fetch_assoc($result)['isAdmin'];
}

function changeMail($lastEmail, $newEmail)
{
    global $db;
    $query = "UPDATE users SET email = '" . $newEmail . "' WHERE email='" . $lastEmail . "'";
    return mysqli_query($db, $query);
}

function changePassword($email, $pass)
{
    global $db;
    $query = "UPDATE users SET password = '" . $pass . "' WHERE email='" . $email . "'";
    return mysqli_query($db, $query);
}

function deleteAcc($email, $idClient)
{
    global $db;

    $query = "DELETE FROM users WHERE email='" . $email . "'";
    $query2 = "DELETE FROM reservations WHERE idClient='" . $idClient . "'";

    mysqli_query($db, $query);
    mysqli_query($db, $query2);
}

function createRooms($name, $star, $rating, $price, $firstImage, $description)
{
    global $db;
    $safe_desc = mysqli_real_escape_string($db, $description);

    $query = "INSERT IGNORE INTO rooms (name, stars, rating, price, firstImage, description) 
  			  VALUES('$name', '$star', '$rating', $price, '$firstImage', '" . $safe_desc . "')";

    return mysqli_query($db, $query);
}

function getRooms()
{
    global $db;

    $query = "SELECT * FROM rooms";
    $result = mysqli_query($db, $query);

    return mysqli_fetch_all($result);
}

function getRoom($id)
{
    global $db;

    $query = "SELECT * FROM rooms WHERE id='$id'";
    $result = mysqli_query($db, $query);

    return mysqli_fetch_assoc($result);
}

function isRoomExists($id)
{
    global $db;
    $user_check_query = "SELECT * FROM rooms WHERE id='$id'";
    $result = mysqli_query($db, $user_check_query);
    return mysqli_fetch_assoc($result);
}

function deleteRoom($id) {
    global $db;

    $query = "DELETE FROM rooms WHERE id='$id'";
    $query2 = "DELETE FROM reservations WHERE idRoom='$id'";

    mysqli_query($db, $query);
    mysqli_query($db, $query2);
}

function createReservation($idClient, $idRoom) {
    global $db;

    $query = "INSERT IGNORE INTO reservations (idClient, idRoom) 
  			  VALUES('$idClient', '$idRoom')";

    return mysqli_query($db, $query);
}

function deleteReservation($id) {
    global $db;

    $query = "DELETE FROM reservations WHERE id='$id'";

    mysqli_query($db, $query);
}

function getReservations($idClient) {
    global $db;

    $query = "SELECT * FROM reservations WHERE idClient='$idClient'";
    $result = mysqli_query($db, $query);

    return mysqli_fetch_all($result);
}