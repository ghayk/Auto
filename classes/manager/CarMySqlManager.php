<?php

namespace App\manager;


use App\dal\mapper\CarMySqlMapper;
use App\dal\model\CarModel;

class CarMySqlManager
{

    /**
     * @var CarMySqlManager|null
     */
    private static ?CarMySqlManager $instance = null;

    /**
     * @return CarMySqlManager
     */
    public static function getInstance(): CarMySqlManager
    {
        if (self::$instance === null) {
            self::$instance = new CarMySqlManager();
        }

        return self::$instance;
    }

    /**
     * @param $searchText
     * @return array
     */
    public function getCars($searchText): array
    {
        return CarMySqlMapper::getInstance()->getCars($searchText);
    }


    /**
     * @param CarModel $car
     * @return int
     */
    public function addCar(CarModel $car): int
    {
        return CarMySqlMapper::getInstance()->addCar($car);
    }


    /**
     * @param CarModel $car
     * @return void
     */
    public function updateCar(CarModel $car): void
    {
        CarMySqlMapper::getInstance()->updateCar($car);
    }


    /**
     * @param $id
     * @return void
     */
    public function deleteCar($id):void
    {
        CarMySqlMapper::getInstance()->deleteCar($id);
    }


    /**
     * @param $id
     * @return array
     */
    public function getEditCar ($id):array
    {
        return CarMySqlMapper::getInstance()->getEditCar($id);
    }


}