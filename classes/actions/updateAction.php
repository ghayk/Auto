<?php

require __DIR__ . '/../../vendor/autoload.php';

use App\Manager\CarManager;
use App\Model\CarModel;

if ($_GET['brand'] && $_GET['year'] && $_GET['color'] && $_GET['motor'] && $_GET['id']) {
    $car = new CarModel();
    $car->setBrand($_GET['brand']);
    $car->setYear($_GET['year']);
    $car->setColor($_GET['color']);
    $car->setMotor($_GET['motor']);
    $car->setId($_GET['id']);

    if ($_GET['dataType'] === 'mysql') {
        CarManager::getInstance()->updateCarFromMySql($car);
    } elseif ($_GET['dataType'] === 'file') {
        CarManager::getInstance()->updateCarFromFile($car);
    }

    echo json_encode($_GET['id']);
}