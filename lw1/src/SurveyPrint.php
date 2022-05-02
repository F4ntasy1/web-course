<?php

class SurveyPrint
{
    private const COLON = ": ";
    private const SEPARATOR = "<br>";

    private string $firstname;
    private string $lastname;
    private ?string $email;
    private int $age;

    private array $result;
    private array $values = [
        "First Name",
        "Last Name",
        "Email",
        "Age",
    ];

    public function printSurvey(Survey $survey) : void
    {
        $this->firstname = $survey->getFirstName();
        $this->lastname = $survey->getLastName();
        $this->email = $survey->getEmail();
        $this->age = $survey->getAge();

        $keys = [
            "First Name" => $this->firstname,
            "Last Name" => $this->lastname,
            "Email" => $this->email,
            "Age" => $this->age,
        ];

        if ($this->email !== null)
        {
            for ($i = 0; $i < count($this->values); $i++)
            {
                $result .= $this->values[$i] . self::COLON . $keys[$this->values[$i]] . self::SEPARATOR;
            }

            echo $result;
        }
    }
}