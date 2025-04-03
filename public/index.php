<?php

declare(strict_types = 1);

$root = dirname(__DIR__) . DIRECTORY_SEPARATOR;

define('APP_PATH', $root . 'app' . DIRECTORY_SEPARATOR);
define('FILES_PATH', $root . 'transaction_files' . DIRECTORY_SEPARATOR);
define('VIEWS_PATH', $root . 'views' . DIRECTORY_SEPARATOR);

/* YOUR CODE (Instructions in README.md) */
// include(APP_PATH."App.php");
require APP_PATH .'App.php';

$array_table = file_to_array("sample_1.csv");
$totalincome = '$' . number_format(total_income($array_table), 2, '.', ',');
$totalexpense = '-' . '$' . number_format(total_expanse($array_table), 2, '.', ',');
$net_total = total_profit($array_table);

require VIEWS_PATH . 'transactions.php';