<?php

require __DIR__ . '/../../vendor/autoload.php';

use App\Manager\CarFileManager;
use App\Manager\CarMySqlManager;

if ($_GET['delete']) {
    if ($_GET['dataType'] === 'mysql') {
        CarMySqlManager::getInstance()->deleteCar((int)$_GET['delete']);
    } elseif ($_GET['dataType'] === 'file') {
        CarFileManager::getInstance()->deleteCar($_GET['delete']);
    }

    echo json_encode($_GET['delete']);
}
