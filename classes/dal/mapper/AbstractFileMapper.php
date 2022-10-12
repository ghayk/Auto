<?php

namespace App\dal\mapper;


abstract class AbstractFileMapper
{
    private const FILE_DIR = '../../data/cars.json';

    /**
     * @param array $arr
     * @return string
     */
    public function addElement(array $arr): string
    {
        $cars = $this->getElements();

        $cars[] = $arr;

        $this->setElement($cars);

        return $arr['id'];
    }

    /**
     * @param array $arr
     * @return void
     */
    public function updateElement(array $arr): void
    {
        $cars = $this->getElements();

        $newCars = [];
        foreach ($cars as $car) {
            if ($car['id'] === $arr['id']) {
                $car['brand'] = $arr['brand'];
                $car['year'] = $arr['year'];
                $car['color'] = $arr['color'];
                $car['motor'] = $arr['motor'];
            }
            $newCars[] = $car;
        }
        $this->setElement($newCars);
    }

    /**
     * @param  $id
     * @return void
     */
    public function deleteElement($id): void
    {
        $cars = $this->getElements();

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

        $this->setElement($newCars);
    }

    /**
     * @param $id
     * @return array
     */
    public function getElementById($id): array
    {
        $cars = $this->getElements();

        foreach ($cars as $car) {
            if ($car['id'] === $id) {
                return $car;
            }
        }
        return [];
    }

    /**
     * @param string $searchText
     * @return array
     */
    public function getElements(string $searchText = ''): array
    {
        $cars = json_decode(file_get_contents(self::FILE_DIR), true);

        if (!$cars) {
            $cars = [];
        }

        $newCars = [];
        $searchText = strtolower($searchText);

        foreach ($cars as $car) {
            if (preg_match("/$searchText/", strtolower($car['brand']))) {
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

        return $newCars;
    }

    /**
     * @param $cars
     * @return void
     */
    public function setElement($cars): void
    {
        file_put_contents(self::FILE_DIR, json_encode($cars));
    }
}