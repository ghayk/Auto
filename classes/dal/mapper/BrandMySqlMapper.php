<?php

namespace App\dal\mapper;

class BrandMySqlMapper extends AbstractMySqlMapper
{

    /**
     * @var BrandMySqlMapper|null
     */
    private static ?BrandMySqlMapper $instance = null;

    protected string $tableName = 'brand';


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
     * @param $searchText
     * @return array
     */
    public function getBrands($searchText): array
    {
        return parent::getList('title', $searchText);
    }
}

