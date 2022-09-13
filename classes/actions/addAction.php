<?php

require __DIR__ . '/../../vendor/autoload.php';

use App\Manager\CarFileManager;
use App\Manager\CarMySqlManager;
use App\Model\CarModel;

if ($_GET['brand'] && $_GET['year'] && $_GET['color'] && $_GET['motor']) {
    $car = new CarModel();
    $car->setBrand($_GET['brand']);
    $car->setYear($_GET['year']);
    $car->setColor($_GET['color']);
    $car->setMotor($_GET['motor']);

    $id = null;
    if ($_GET['dataType'] === 'mysql') {
        $id = CarMySqlManager::getInstance()->addCar($car);
    } elseif ($_GET['dataType'] === 'file') {
        $id = CarFileManager::getInstance()->addCar($car);
    }

    echo json_encode($id);

}