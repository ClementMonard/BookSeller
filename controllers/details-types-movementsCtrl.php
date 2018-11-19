<?php
$listAllTypesOfBook = new typeofbooks();
$displayAllTypesOfBook = $listAllTypesOfBook->getNameOfLiteraryGenres();

$listAllLiteraryMovements = new literarymovement();
$displayAllLiteraryMovements = $listAllLiteraryMovements->listOfAllLiteraryMovements();