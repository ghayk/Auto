<?php

namespace App\Manager;

use App\Mapper\ColorMySqlMapper;

class ColorManager
{

    /**
     * @var ColorManager|null
     */
    private static ?ColorManager $instance = null;

    /**
     * @return ColorManager|null
     */
    public static function getInstance(): ?ColorManager
    {
        if (self::$instance === null) {
            self::$instance = new ColorManager();
        }

        return self::$instance;
    }

    /**
     * @return array
     */
    public function getColorsFromMySql($searchText): array
    {
        return ColorMySqlMapper::getInstance()->getColors($searchText);
    }

}