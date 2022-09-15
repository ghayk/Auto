<?php

namespace App\dal\model;

class UserModel
{
    private int $id;
    private string $firstName;
    private string $lostName;
    private static $email;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLostName(): string
    {
        return $this->lostName;
    }

    /**
     * @param string $lostName
     */
    public function setLostName(string $lostName): void
    {
        $this->lostName = $lostName;
    }

    /**
     * @return mixed
     */
    public static function getEmail()
    {
        return self::$email;
    }

    /**
     * @param mixed $email
     */
    public static function setEmail($email): void
    {
        self::$email = $email;
    }
}