<?php 


define('HOST', 'localhost');
define('PORT', '3306');
define('DBNAME', 'BookSeller');
define('CHARSET', 'utf8');
define('ACCOUNT', 'exopdo');
define('PASSWORD', 'exo');

include_once 'class/database.php';
include_once 'models/users.php';
include_once 'models/books.php';
include_once 'models/typeofbooks.php';
include_once 'models/literarymovement.php';
include_once 'class/admin.php';
