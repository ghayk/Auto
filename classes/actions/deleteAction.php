<?php

require __DIR__ . '/../../vendor/autoload.php';

use App\manager\CarFileManager;
use App\manager\CarMySqlManager;

if ($_GET['id']) {
    if ($_GET['dataType'] === 'mysql') {
        CarMySqlManager::getInstance()->deleteCar((int)$_GET['id']);
    } elseif ($_GET['dataType'] === 'file') {
        CarFileManager::getInstance()->deleteCar($_GET['id']);
    }

    echo json_encode($_GET['id']);
}
