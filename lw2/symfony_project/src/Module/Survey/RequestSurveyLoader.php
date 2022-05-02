<?php

namespace App\Module\Survey;

class RequestSurveyLoader
{
    private string $firstname;
    private string $lastname;
    private ?string $email;
    private int $age;

    function __construct()
    {
        if (!$_GET["email"] || $_GET["email"] === "")
        {
            $this->email = null;
        }
        else
        {
            $this->email = $_GET["email"];
        }
        $this->firstname = $_GET["first_name"] ?? "";
        $this->lastname = $_GET["last_name"] ?? "";
        $this->age = $_GET["age"] ?? 0;
    }

    public function getSurvey() : Survey
    {
        return new Survey($this->firstname, $this->lastname, $this->email, $this->age);
    }
}