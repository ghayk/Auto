<?php

namespace App\Mapper;


class BrandMySqlMapper extends MySqlMapper
{

    /**
     * @var BrandMySqlMapper|null
     */
    private static ?BrandMySqlMapper $instance = null;

    /**
     * @return BrandMySqlMapper|null
     */
    public static function getInstance(): ?BrandMySqlMapper
    {
        if (self::$instance === null) {
            self::$instance = new BrandMySqlMapper();
        }

        return self::$instance;
    }

    /**
     *
     */
    public function __construct()
    {
        $this->tableName = 'brand';
    }

    /**
     * @param $searchText
     * @return array
     */
    public function getBrands($searchText): array
    {
        return parent::getList('title', $searchText);
    }
}

