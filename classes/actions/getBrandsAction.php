<?php

require __DIR__ . '/../../vendor/autoload.php';

use App\manager\BrandManager;


if ($_GET['dataType'] === 'mysql') {
    $brands = BrandManager::getInstance()->getBrands($_GET['searchText']);
} else {
    $brands = [];
}

echo json_encode($brands);