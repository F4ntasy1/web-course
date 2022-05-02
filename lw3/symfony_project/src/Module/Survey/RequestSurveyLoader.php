<?php

namespace App\Module\Survey;

class RequestSurveyLoader
{
    private string $firstname;
    private string $lastname;
    private ?string $email;
    private ?string $avatar;
    private string $age;

    function __construct()
    {
        if (!$_POST["email"] || $_POST["email"] == "")
        {
            $this->email = null;
        }
        else
        {
            $this->email = $_POST["email"];
        }
        $this->age = $_POST["age"] ?? "";
        if ($_FILES["avatar"]["tmp_name"])
        {
            $this->avatar = $_FILES["avatar"]["name"];
        }
        else
        {
            $this->avatar = null;
        }
        $this->firstname = $_POST["first_name"] ?? "";
        $this->lastname = $_POST["last_name"] ?? "";
    }

    public function getSurvey() : Survey
    {
        return new Survey($this->firstname, $this->lastname, $this->email, $this->age, $this->avatar);
    }
}