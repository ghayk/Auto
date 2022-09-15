<?php

namespace App\manager;


use App\dal\mapper\BrandMySqlMapper;

class BrandManager
{

    /**
     * @var BrandManager|null
     */
    private static ?BrandManager $instance = null;

    /**
     * @return BrandManager|null
     */
    public static function getInstance(): ?BrandManager
    {
        if (self::$instance === null) {
            self::$instance = new BrandManager();
        }

        return self::$instance;
    }

    /**
     * @return array
     */
    public function getBrands($searchText): array
    {
        return BrandMySqlMapper::getInstance()->getBrands($searchText);
    }

}