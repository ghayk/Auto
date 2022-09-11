<?php

namespace App\Mapper;

use App\Model\CarModel;

class CarFileMapper
{
    private const FILE_DIR = '../../data/cars.json';

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

        $cars = $this->getCars();

        $cars[] = $carArr;

        $this->setCars($cars);

        return $id;
    }

    public function deleteCar($id): void
    {
        $cars = $this->getCars();

        $newCars = [];
        foreach ($cars as $car) {
            if ($car['id'] !== $id) {
                $arr = [
                    'id' => $car['id'],
                    'brand' => $car['brand'],
                    'year' => $car['year'],
                    'color' => $car['color'],
                    'motor' => $car['motor']
                ];
                $newCars[] = $arr;
            }
        }

        $this->setCars($newCars);

    }

    /**
     * @param $id
     * @return array
     */
    public function getEditCar($id): array
    {
        $cars = $this->getCars();

        foreach ($cars as $car) {
            if ($car['id'] === $id) {
                return $car;
            }
        }
        return [];
    }

    public function getCars(): array
    {
        $cars = json_decode(file_get_contents(self::FILE_DIR), true);

        if (!$cars) {
            $cars = [];
        }

        return $cars;
    }

    public function setCars($cars): void
    {
        file_put_contents(self::FILE_DIR, json_encode($cars));
    }

    public function updateCar(CarModel $car): void
    {
        $brand = $car->getBrand();
        $year = $car->getYear();
        $color = $car->getColor();
        $motor = $car->getMotor();
        $id = $car->getId();


        $cars = json_decode(file_get_contents(self::FILE_DIR), true);

        $newCars = [];
        foreach ($cars as $car) {
            if ($car['id'] === $id) {
                $car['brand'] = $brand;
                $car['year'] = $year;
                $car['color'] = $color;
                $car['motor'] = $motor;
            }
            $newCars[] = $car;
        }
        $this->setCars($newCars);
    }
}