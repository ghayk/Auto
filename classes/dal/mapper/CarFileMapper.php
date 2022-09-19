<?php

namespace App\dal\mapper;

use App\dal\model\CarModel;

class CarFileMapper extends AbstractFileMapper
{

    /**
     * @var CarFileMapper|null
     */
    private static ?CarFileMapper $instance = null;

    /**
     * @return CarFileMapper|null
     */
    public static function getInstance(): ?CarFileMapper
    {
        if (self::$instance === null) {
            self::$instance = new CarFileMapper();
        }

        return self::$instance;
    }

    /**
     * @param $searchText
     * @return array
     */
    public function getCars($searchText): array
    {
        return parent::getElements($searchText);
    }

    /**
     * @param CarModel $car
     * @return string
     */
    public function addCar(CarModel $car): string
    {
        $brand = $car->getBrand();
        $year = $car->getYear();
        $color = $car->getColor();
        $motor = $car->getMotor();
        $id = uniqid();

        $carArr = [
            'id' => $id,
            'brand' => $brand,
            'year' => $year,
            'color' => $color,
            'motor' => $motor
        ];

        return parent::addElement($carArr);
    }

    /**
     * @param $id
     * @return void
     */
    public function deleteCar($id): void
    {
        parent::deleteElement($id);
    }

    /**
     * @param $id
     * @return array
     */
    public function getEditCar($id): array
    {
        return parent::getElementById($id);
    }

    /**
     * @param CarModel $car
     * @return void
     */
    public function updateCar(CarModel $car): void
    {
        $carArr = [
            'brand' => $car->getBrand(),
            'year' => $car->getYear(),
            'color' => $car->getColor(),
            'motor' => $car->getMotor(),
            'id' => $car->getId()
        ];

        parent::updateElement($carArr);
    }
}