<?php
// php index.php {postID or null} {-c or null} {true or null|false}

use App\Data;

require_once 'autoload.php';

$postID = (isset($argv[1]) ? (int) $argv[1] : 0); // int
$displayComments = isset($argv[2]) && $argv[2] === '-c' ? true : false; // flag -> false
$displayArr = isset($argv[3]) && $argv[3] === 'true' ?: false; //bool

// test dump of variables
var_dump((new Data($postID, $displayComments, $displayArr))->displayData());

// send data to API
var_dump((new Data($postID, $displayComments, $displayArr))->getAPI());