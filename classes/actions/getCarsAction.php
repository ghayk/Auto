<?php

require __DIR__ . '/../../vendor/autoload.php';

use App\manager\CarMySqlManager;
use App\manager\CarFileManager;

if ($_GET['dataType'] === 'mysql') {
    $cars = CarMySqlManager::getInstance()->getCars($_GET['search']);
} elseif($_GET['dataType'] === 'file'){
    $cars = CarFileManager::getInstance()->getCars($_GET['search']);
}else{
    $cars =[];
}

echo json_encode($cars);