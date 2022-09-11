<?php

namespace App\Mapper;

use App\Model\CarModel;

class CarMySqlMapper extends MySqlMapper
{

    /**
     * @var CarMySqlMapper|null
     */
    private static ?CarMySqlMapper $instance = null;

    /**
     * @return CarMySqlMapper|null
     */
    public static function getInstance(): ?CarMySqlMapper
    {
        if (self::$instance === null) {
            self::$instance = new CarMySqlMapper();
        }

        return self::$instance;
    }

    /**
     *
     */
    public function __construct()
    {
        $this->tableName = 'auto';
    }

    /**
     * @param int $id
     * @return array
     */
    public function getEditCar(int $id): array
    {
        return parent::getElementById($id);
    }

    /**
     * @param int $id
     * @return void
     */
    public function deleteCar(int $id): void
    {
        parent::deleteElement($id);
    }

    /**
     * @param $searchText
     * @return array
     */
    public function getCars($searchText): array
    {
        return parent::getList('brand', $searchText);
    }

    /**
     * @param CarModel $car
     * @return int
     */
    public function addCar(CarModel $car): int
    {
        $brand = $car->getBrand();
        $year = $car->getYear();
        $color = $car->getColor();
        $motor = $car->getMotor();

        $carArr = [
            'brand' => $brand,
            'year' => $year,
            'color' => $color,
            'motor' => $motor
        ];

        return parent::addElement($carArr);
    }

    /**
     * @param CarModel $car
     * @return void
     */
    public function updateCar(CarModel $car): void
    {
        $brand = $car->getBrand();
        $year = $car->getYear();
        $color = $car->getColor();
        $motor = $car->getMotor();
        $id = $car->getId();

        $carArr = [
            'brand' => $brand,
            'year' => $year,
            'color' => $color,
            'motor' => $motor
        ];

        parent::updateElement($carArr, $id);
    }
}