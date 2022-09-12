<?php

require __DIR__ . '/../../vendor/autoload.php';

use App\Manager\CarManager;

if ($_GET['delete']) {
    if ($_GET['dataType'] === 'mysql') {
        CarManager::getInstance()->deleteCarFomMySql((int)$_GET['delete']);
    } elseif ($_GET['dataType'] === 'file') {
        CarManager::getInstance()->deleteCarFomFile($_GET['delete']);
    }

    echo json_encode($_GET['delete']);
}
