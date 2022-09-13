<?php

require __DIR__ . '/../../vendor/autoload.php';

use App\Manager\BrandManager;
use App\Manager\CarFileManager;
use App\Manager\CarMySqlManager;
use App\Manager\ColorManager;

if ($_GET['dataType'] === 'mysql') {
    $list = CarMySqlManager::getInstance()->getCars($_GET['search']);
} elseif ($_GET['dataType'] === 'brand') {
    $list = BrandManager::getInstance()->getBrands($_GET['search']);
} elseif ($_GET['dataType'] === 'color') {
    $list = ColorManager::getInstance()->getColors($_GET['search']);
} elseif($_GET['dataType'] === 'file'){
    $list = CarFileManager::getInstance()->getCars($_GET['search']);
}else{
    $list =[];
}

echo json_encode($list);