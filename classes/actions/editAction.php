<?php

require __DIR__ . '/../../vendor/autoload.php';

use App\manager\CarFileManager;
use App\manager\CarMySqlManager;

if ($_GET['id']) {
    $car = [];
    if ($_GET['dataType'] === 'mysql') {
        $car = CarMySqlManager::getInstance()->getEditCar((int)$_GET['id']);
    } elseif ($_GET['dataType'] === 'file') {
        $car = CarFileManager::getInstance()->getEditCar($_GET['id']);
    }
    echo json_encode($car);
}

