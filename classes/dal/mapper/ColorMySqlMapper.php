<?php

namespace App\Mapper;


class ColorMySqlMapper extends MySqlMapper
{

    /**
     * @var ColorMySqlMapper|null
     */
    private static ?ColorMySqlMapper $instance = null;

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
     *
     */
    public function __construct()
    {
        $this->tableName = 'color';
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

