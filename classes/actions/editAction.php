<?php

require __DIR__ . '/../../vendor/autoload.php';

use App\Manager\CarManager;

if ($_GET['edit']) {
    $car = [];
    if ($_GET['dataType'] === 'mysql') {
        $car = CarManager::getInstance()->getEditCarFromMySql((int)$_GET['edit']);
    } elseif ($_GET['dataType'] === 'file') {
        $car = CarManager::getInstance()->getEditCarFromFile($_GET['edit']);
    }
    echo json_encode($car);
}

