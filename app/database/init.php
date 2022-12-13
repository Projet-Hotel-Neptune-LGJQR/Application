<?php

include "database.php";

function createUsersTable()
{
    $users = "CREATE TABLE IF NOT EXISTS Users (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,name VARCHAR(50) NOT NULL,email VARCHAR(50),password VARCHAR(255),isAdmin boolean)";
    global $db;

    mysqli_query($db, $users);
}

function createRoomsTable()
{
    $users = "CREATE TABLE IF NOT EXISTS Rooms (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,name VARCHAR(50) NOT NULL, stars INT(6), rating VARCHAR(50), price VARCHAR(255), firstImage VARCHAR(255), description TEXT)";
    global $db;

    mysqli_query($db, $users);
}

function createReservationTable()
{
    $users = "CREATE TABLE IF NOT EXISTS Reservations(id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, idClient INT(6) NOT NULL, idRoom INT(6))";
    global $db;

    mysqli_query($db, $users);
}

createUsersTable();
createRoomsTable();
createReservationTable();

//createRooms('Chambre double', 5, 216, 235,'http://localhost/assets/img/room/chambre_double.jpg');
//createRooms('Chambre doduble', 5, 216, 235,'http://localhost/assets/img/room/chambre_double.jpg');

echo json_encode(getRooms());