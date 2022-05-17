<?php

namespace App\Module\Survey;

class SurveyFileStorage
{
    private const PATH = "./data/";
    private const FORMAT = ".txt";
    private const COLON = ": ";

    private array $values = [
        "First Name",
        "Last Name",
        "Email",
        "Age",
    ];

    public function __construct(Survey $survey)
    {
        $this->firstname = $survey->getFirstName();
        $this->lastname = $survey->getLastName();
        $this->email = $survey->getEmail();
        $this->age = $survey->getAge();

        $this->getFileName();

        $this->keys = [
            "First Name" => $this->firstname,
            "Last Name" => $this->lastname,
            "Email" => $this->email,
            "Age" => $this->age,
        ];
    }

    public function loadSurvey() : Survey
    {
        if ((file_exists($this->filename)) and ($this->email !== null)) 
        {
            $this->result = file($this->filename);
            for ($i = 0; $i < count($this->values); $i++)
            {
                if ($this->keys[$this->values[$i]]) 
                {
                    $this->result[$i] = $this->values[$i] . self::COLON . $this->keys[$this->values[$i]] . PHP_EOL;
                }
                $this->keys[$this->values[$i]] = $this->result[$i];
            }  
            file_put_contents($this->filename, $this->result);
        }
        return new Survey($this->keys["First Name"], $this->keys["Last Name"], $this->keys["Email"], $this->keys["Age"]);
    }

    public function saveSurvey() : void
    {
        if (($this->email !== null) and (!file_exists($this->filename))) 
        {
            for ($i = 0; $i < count($this->values); $i++)
            {
                $this->result[$i] = $this->values[$i] . self::COLON . $this->keys[$this->values[$i]] . PHP_EOL;
            }
            file_put_contents($this->filename, $this->result);
        }
    }
    
    private function getFileName() : void
    {
        $this->filename = self::PATH . $this->email . self::FORMAT;
    }
}