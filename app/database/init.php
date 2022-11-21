<?php

include "database.php";

function createUsersTable()
{
    $users = "CREATE TABLE IF NOT EXISTS Users (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,name VARCHAR(50) NOT NULL,email VARCHAR(50),password VARCHAR(255),isAdmin boolean)";
    global $db;

    $stmt = $db->query($users);
}

createUsersTable();