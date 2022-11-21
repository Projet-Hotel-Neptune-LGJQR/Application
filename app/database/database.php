<?php
$host = '127.0.0.1';
$port = 3306;
$dbname = 'projethotelneptune';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';
$db = null;

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
try {
    $db = new mysqli($host, $user, $pass, $dbname, $port);
    mysqli_set_charset($db, $charset);
    mysqli_options($db, MYSQLI_OPT_INT_AND_FLOAT_NATIVE, 1);
} catch (mysqli_sql_exception $e) {
    throw new mysqli_sql_exception($e->getMessage(), $e->getCode());
}
unset($host, $dbname, $user, $pass, $charset, $port);

function isAccExists($email)
{
    global $db;
    $user_check_query = "SELECT * FROM Users WHERE email='$email'";
    $result = mysqli_query($db, $user_check_query);
    return mysqli_fetch_assoc($result);
}

function createAcc($name, $email, $password)
{
    global $db;

    $query = "INSERT INTO users (name, email, password, isAdmin) 
  			  VALUES('$name', '$email', '$password', false)";

    return mysqli_query($db, $query);
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

function deleteAcc($email)
{
    global $db;
    $query = "DELETE FROM  users WHERE email='" . $email . "'";
    return mysqli_query($db, $query);
}