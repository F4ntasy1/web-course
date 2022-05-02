<?php

namespace App\Module\Survey;

class Survey
{
    private string $firstname;
    private string $lastname;
    private ?string $email;
    private string $age;

    function __construct(string $firstname, string $lastname, ?string $email, string $age)
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->age = $age;
    }
   
    public function getFirstName() : string 
    {
        return $this->firstname;
    }

    public function getLastName() : string 
    {
        return $this->lastname;
    }

    public function getEmail() : ?string 
    {
        return $this->email;
    }

    public function getAge() : string
    {
        return $this->age;
    }
}