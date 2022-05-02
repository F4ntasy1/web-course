<?php

namespace App\Module\Survey;

class SurveyFileStorage
{
    private const FORMAT = ".txt";
    private const COLON = ": ";

    private ?string $filename;
    private string $path;

    private ?string $firstname;
    private ?string $lastname;
    private ?string $email;
    private ?string $age;

    private array $result;
    private array $keys;
    private array $values = [
        "Ваше имя",
        "Ваша фамилия",
        "Ваш Email",
        "Ваш возраст",
    ];

    public function getData(Survey $survey) : void
    {
        $this->firstname = $survey->getFirstName();
        $this->lastname = $survey->getLastName();
        $this->email = $survey->getEmail();
        $this->age = $survey->getAge();

        if ($this->email !== null)
        {
            $this->path = "./" . $this->email . "/";
            $this->filename = $this->path . $this->email . self::FORMAT;
        }
        else
        {
            $this->filename = null;
        }

        $this->keys = [
            "Ваше имя" => $this->firstname,
            "Ваша фамилия" => $this->lastname,
            "Ваш Email" => $this->email,
            "Ваш возраст" => $this->age,
        ];
    }

    public function loadSurvey(?string $avatar) : Survey
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

            return new Survey($this->keys["Ваше имя"], $this->keys["Ваша фамилия"], $this->keys["Ваш Email"], $this->keys["Ваш возраст"], $avatar);
        }
        return new Survey(null, null, $this->keys["Ваш Email"], null, null);
    }

    public function saveSurvey() : void
    {
        $this->createDir();

        if (($this->email !== null) and (!file_exists($this->filename))) 
        {
            for ($i = 0; $i < count($this->values); $i++)
            {
                $this->result[$i] = $this->values[$i] . self::COLON . $this->keys[$this->values[$i]] . PHP_EOL;
            }
            file_put_contents($this->filename, $this->result);
        }
    }

    private function createDir() : void
    {
        if ((!is_dir($this->email)) && ($this->email !== null))
        {
            mkdir($this->email);
        }
    }
}