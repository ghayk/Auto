<?php

namespace App\Manager;

use App\mapper\CarFileMapper;
use App\Model\CarModel;

class CarFileManager
{
    /**
     * @var CarFileManager|null
     */
    private static ?CarFileManager $instance = null;

    /**
     * @return CarFileManager|null
     */
    public static function getInstance(): ?CarFileManager
    {
        if (self::$instance === null) {
            self::$instance = new CarFileManager();
        }

        return self::$instance;
    }

    /**
     * @param $searchText
     * @return array
     */
    public function getCars($searchText): array
    {
        return CarFileMapper::getInstance()->getCars($searchText);
    }


    /**
     * @param CarModel $car
     * @return string
     */
    public function addCar(CarModel $car): string
    {
        return CarFileMapper::getInstance()->addCar($car);
    }


    /**
     * @param CarModel $car
     * @return void
     */
    public function updateCar(CarModel $car): void
    {
        CarFileMapper::getInstance()->updateCar($car);
    }


    /**
     * @param $id
     * @return void
     */
    public function deleteCar($id): void
    {
        CarFileMapper::getInstance()->deleteCar($id);
    }

    /**
     * @param $id
     * @return array
     */
    public function getEditCar($id): array
    {
        return CarFileMapper::getInstance()->getEditCar($id);
    }

}

