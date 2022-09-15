<?php

require __DIR__ . '/../../vendor/autoload.php';

use App\manager\CarFileManager;
use App\manager\CarMySqlManager;

if ($_GET['edit']) {
    $car = [];
    if ($_GET['dataType'] === 'mysql') {
        $car = CarMySqlManager::getInstance()->getEditCar((int)$_GET['edit']);
    } elseif ($_GET['dataType'] === 'file') {
        $car = CarFileManager::getInstance()->getEditCar($_GET['edit']);
    }
    echo json_encode($car);
}

