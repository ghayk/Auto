<?php

require __DIR__ . '/../../vendor/autoload.php';

use App\manager\BrandManager;


if ($_GET['dataType'] === 'brand') {
    $brands = BrandManager::getInstance()->getBrands($_GET['search']);
} else {
    $brands = [];
}

echo json_encode($brands);