<?php

namespace App\Manager;

use App\mapper\CarFileMapper;
use App\mapper\CarMySqlMapper;
use App\Model\CarModel;

class CarManager
{

    /**
     * @var CarManager|null
     */
    private static ?CarManager $instance = null;

    /**
     * @return CarManager|null
     */
    public static function getInstance(): ?CarManager
    {
        if (self::$instance === null) {
            self::$instance = new CarManager();
        }

        return self::$instance;
    }

    /**
     * @param $searchText
     * @return array
     */
    public function getCarsFromMySql($searchText): array
    {
        return CarMySqlMapper::getInstance()->getCars($searchText);
    }

    /**
     * @return array
     */
    public function getCarsFromFile($searchText): array
    {
        return CarFileMapper::getInstance()->getCars($searchText);
    }

    /**
     * @param CarModel $car
     * @return int
     */
    public function addCarFromMySql(CarModel $car): int
    {
        return CarMySqlMapper::getInstance()->addCar($car);
    }

    /**
     * @param CarModel $car
     * @return string
     */
    public function addCarFromFile(CarModel $car): string
    {
        return CarFileMapper::getInstance()->addCar($car);
    }

    /**
     * @param CarModel $car
     * @return void
     */
    public function updateCarFromMySql(CarModel $car): void
    {
        CarMySqlMapper::getInstance()->updateCar($car);
    }

    /**
     * @param CarModel $car
     * @return void
     */
    public function updateCarFromFile(CarModel $car): void
    {
        CarFileMapper::getInstance()->updateCar($car);
    }

    /**
     * @param $id
     * @return void
     */
    public function deleteCarFomMySql($id):void
    {
        CarMySqlMapper::getInstance()->deleteCar($id);
    }

    /**
     * @param $id
     * @return void
     */
    public function deleteCarFomFile($id):void
    {
        CarFileMapper::getInstance()->deleteCar($id);
    }

    /**
     * @param $id
     * @return array
     */
    public function getEditCarFromMySql ($id):array
    {
        return CarMySqlMapper::getInstance()->getEditCar($id);
    }

    /**
     * @param $id
     * @return array
     */
    public function getEditCarFromFile ($id):array
    {
        return CarFileMapper::getInstance()->getEditCar($id);
    }
}