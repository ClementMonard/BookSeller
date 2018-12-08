<?php
//Instanciation de la classe typeofbooks
$listAllTypesOfBook = new typeofbooks();
//Stockage des données récupéré grâce à la méthode getNameOfLiteraryGenres dans $displayAllTypesOfBook
//L'affichage se fera à l'aide d'un foreach, car cette méthode renverra un tableau
$displayAllTypesOfBook = $listAllTypesOfBook->getNameOfLiteraryGenres();

//Instanciation de la classe typeofbooks
$listAllLiteraryMovements = new literarymovement();
//Stockage des données récupéré grâce à la méthode listOfAllLiteraryMovements dans $displayAllLiteraryMovements
//L'affichage se fera à l'aide d'un foreach, car cette méthode renverra un tableau
$displayAllLiteraryMovements = $listAllLiteraryMovements->listOfAllLiteraryMovements();