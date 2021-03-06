<?php

class User
{
    private $id = null;
    private $email;
    private $password;
    private $name;
    private $surname;
    private $role;

    public function __construct(
        int $id,
        string $email,
        string $password,
        string $name,
        string $surname,
        string $role
    )
    {
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
        $this->surname = $surname;
        $this->role = $role;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getRole(): string
    {
        return $this->role;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

}