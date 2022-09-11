<?php

require __DIR__ . '/../../vendor/autoload.php';

use App\Manager\BrandManager;
use App\Manager\CarManager;
use App\Manager\ColorManager;

if ($_GET['dataType'] === 'mysql') {
    $list = CarManager::getInstance()->getCarsFromMySql($_GET['search']);
} elseif ($_GET['dataType'] === 'brand') {
    $list = BrandManager::getInstance()->getBrandsFromMySql($_GET['search']);
} elseif ($_GET['dataType'] === 'color') {
    $list = ColorManager::getInstance()->getColorsFromMySql($_GET['search']);
} else {
    $list = CarManager::getInstance()->getCarsFromFile();
}

echo json_encode($list);