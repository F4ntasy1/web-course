<?php

class SurveyPrint
{
    private const COLON = ": ";
    private const SEPARATOR = "<br>";

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

        $this->keys = [
            "First Name" => $this->firstname,
            "Last Name" => $this->lastname,
            "Email" => $this->email,
            "Age" => $this->age,
        ];

        if ($this->email !== null)
        {
            for ($i = 0; $i < count($this->values); $i++)
            {
                $this->result .= $this->values[$i] . self::COLON . $this->keys[$this->values[$i]] . self::SEPARATOR;
            }

            echo $this->result;
        }
    }
}