<?php

$users = new users();

$listOfUsers = $users->getUsersList();

if (isset($_GET['id'])) {
    $users->id = $_GET['id'];
    $displayDetailsOfUsers = $users->displayUsersDetails();
}

