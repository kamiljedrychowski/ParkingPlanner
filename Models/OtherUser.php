<?php

class OtherUser
{
    private $id = null;
    private $email;
    private $name;
    private $surname;
    private $role;
    private $points;
    private $platenumber;

    public function __construct(
        int $id,
        string $email,
        string $name,
        string $surname,
        int $points,
        string $platenumber,
        string $role
    )
    {
        $this->id = $id;
        $this->email = $email;
        $this->name = $name;
        $this->surname = $surname;
        $this->role = $role;
        $this->points = $points;
        $this->platenumber = $platenumber;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getEmail(): string
    {
        return $this->email;
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

    public function getPoints(): int
    {
        return $this->points;
    }

    public function getPlatenumber(): string
    {
        return $this->platenumber;
    }


}