<?php

namespace App\dal\mapper;

class ColorMySqlMapper extends AbstractMySqlMapper
{

    /**
     * @var ColorMySqlMapper|null
     */
    private static ?ColorMySqlMapper $instance = null;

    protected string $tableName = 'color';

    /**
     * @return ColorMySqlMapper|null
     */
    public static function getInstance(): ?ColorMySqlMapper
    {
        if (self::$instance === null) {
            self::$instance = new ColorMySqlMapper();
        }

        return self::$instance;
    }


    /**
     * @param $searchText
     * @return array
     */
    public function getColors($searchText): array
    {
        return parent::getList('title', $searchText);
    }
}

