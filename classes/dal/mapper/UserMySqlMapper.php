<?php

namespace App\Mapper;

use App\Model\UserModel;

class UserMySqlMapper extends AbstractMySqlMapper
{

    /**
     * @var UserMySqlMapper|null
     */
    private static ?UserMySqlMapper $instance = null;

    protected string $tableName = 'user';


    /**
     * @return UserMySqlMapper|null
     */
    public static function getInstance(): ?UserMySqlMapper
    {
        if (self::$instance === null) {
            self::$instance = new UserMySqlMapper();
        }

        return self::$instance;
    }

    /**
     * @return array
     */
    public function getUsers($searchText): array
    {
        return parent::getList('firstName', $searchText);
    }

    /**
     * @param int $id
     * @return void
     */
    public function deleteUser(int $id): void
    {
        parent::deleteElement($id);
    }


    /**
     * @param UserModel $user
     * @return int
     */
    public function addUser(UserModel $user): int
    {
        $firstName = $user->getFirstName();
        $lostName = $user->getLostName();
        $email = $user->getEmail();

        $userArr = [
            'firstName' => $firstName,
            'lostName' => $lostName,
            'email' => $email,
        ];

        return parent::addElement($userArr);
    }


    /**
     * @param UserModel $user
     * @return void
     */
    public function updateUser(UserModel $user): void
    {
        $firstName = $user->getFirstName();
        $lostName = $user->getLostName();
        $email = $user->getEmail();
        $id = $user->getid();

        $userArr = [
            'firstName' => $firstName,
            'lostName' => $lostName,
            'email' => $email,
        ];

        parent::updateElement($userArr, $id);
    }
}