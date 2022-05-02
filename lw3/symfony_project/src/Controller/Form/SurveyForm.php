<?php

namespace App\Controller\Form;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SurveyForm extends AbstractController
{
    private const PATH = "./";
    private const FORMAT = ".txt";
    private const SEPARATOR = "\n";

    private string $firstname;
    private string $lastname;
    private string $email;
    private string $age;
    private string $avatar;
    private string $filename;

    private array $arrayData;

    function __construct()
    {
        $this->firstname = $_POST["firstname"] ?? "";
        $this->lastname = $_POST["lastname"] ?? "";
        $this->email = $_POST["email"] ?? "";
        $this->age = $_POST["age"] ?? "";
	$this->avatar = $_POST["avatar"] ?? "";
	if ($_FILES["avatar"]) {
	    $name = $_FILES["avatar"]["name"];
	    move_uploaded_file($_FILES["avatar"]["tmp_name"], $name);
	    echo 'Загружен';
	}

        if ($this->email !== "")
        {
            $this->filename = self::PATH . $this->email . self::FORMAT;
        }
        else
        {
            $this->filename = "";
        }
    }

    public function saveForm() : void
    {
	$this->arrayData[0] = 'Имя: ' . $this->firstname . self::SEPARATOR;
	$this->arrayData[1] = 'Фамилия: ' . $this->lastname . self::SEPARATOR;
        $this->arrayData[2] = 'Email: ' . $this->email . self::SEPARATOR;
        $this->arrayData[3] = 'Возраст: ' . $this->age . self::SEPARATOR;

        if ($this->filename !== "")
        {
            file_put_contents($this->filename, $this->arrayData);
        }
        else
        {
            echo "Email не введён";
        }
    }
}
