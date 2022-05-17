<?php

namespace App\Module\Survey;

class RequestSurveyLoader
{
    public function getSurvey() : Survey
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

        return new Survey($this->firstname, $this->lastname, $this->email, $this->age);
    }
}