<?php

require __DIR__ . '/../../vendor/autoload.php';

use App\manager\ColorManager;


if ($_GET['dataType'] === 'mysql') {
    $colors = ColorManager::getInstance()->getColors($_GET['search']);
} else {
    $colors = [];
}

echo json_encode($colors);