<?php

namespace App\Module\Survey;

class Survey
{
    private ?string $firstname;
    private ?string $lastname;
    private ?string $email;
    private ?string $avatar;
    private ?string $age;

    function __construct(?string $firstname, ?string $lastname, ?string $email, ?string $age, ?string $avatar)
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->age = $age;
        $this->avatar = $avatar;
    }
   
    public function getFirstName() : ?string
    {
        return $this->firstname;
    }

    public function getLastName() : ?string
    {
        return $this->lastname;
    }

    public function getEmail() : ?string 
    {
        return $this->email;
    }

    public function getAge() : ?string
    {
        return $this->age;
    }

    public function getAvatar() : ?string
    {
        return $this->avatar;
    }
}