<?php

class Survey
{
    private string $firstname;
    private string $lastname;
    private ?string $email;
    private int $age;

    function __construct(string $firstname, string $lastname, ?string $email, int $age)
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

    public function getAge() : int
    {
        return $this->age;
    }
}