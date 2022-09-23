<?php

require __DIR__ . '/../../vendor/autoload.php';

use App\manager\CarMySqlManager;
use App\manager\CarFileManager;

if ($_GET['dataType'] === 'mysql') {
    $cars = CarMySqlManager::getInstance()->getCars($_GET['searchText']);
} elseif($_GET['dataType'] === 'file'){
    $cars = CarFileManager::getInstance()->getCars($_GET['searchText']);
}else{
    $cars =[];
}

echo json_encode($cars);