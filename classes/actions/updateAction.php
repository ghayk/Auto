<?php

require __DIR__ . '/../../vendor/autoload.php';

use App\dal\model\CarModel;
use App\manager\CarFileManager;
use App\manager\CarMySqlManager;


if ($_GET['brand'] && $_GET['year'] && $_GET['color'] && $_GET['motor'] && $_GET['id']) {
    $car = new CarModel();
    $car->setBrand($_GET['brand']);
    $car->setYear($_GET['year']);
    $car->setColor($_GET['color']);
    $car->setMotor($_GET['motor']);
    $car->setId($_GET['id']);

    if ($_GET['dataType'] === 'mysql') {
        CarMySqlManager::getInstance()->updateCar($car);
    } elseif ($_GET['dataType'] === 'file') {
        CarFileManager::getInstance()->updateCar($car);
    }

    echo json_encode($_GET['id']);
}