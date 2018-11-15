<?php

$users = new users();

$listOfUsers = $users->getUsersList();

if (isset($_GET['id'])) {
    $users->id = $_GET['id'];
    $displayDetailsOfUsers = $users->displayUsersDetails();
}

$typeofbooks = new typeofbooks();

$listTypeOfBooks = $typeofbooks->getNameOfLiteraryGenres();

$literarymovement = new literarymovement();

$listingOfLiteraryMovement = $literarymovement->listOfAllLiteraryMovements();

