<?php

namespace App\Module\PhotosStorage;

use App\Module\Survey\Survey;

class PhotoStorage
{
    private ?string $email;
    private string $path;
    private ?string $avatar;
    private string $name;
    private string $format;

    public function saveAvatar(Survey $survey) : ?string
    {
        $this->email = $survey->getEmail();
        $this->avatar = $survey->getAvatar();

        if (($this->avatar !== null) and (file_exists($this->email)))
        {
            $this->format = pathinfo($this->avatar, PATHINFO_EXTENSION);
            $this->name = $this->email . "." . $this->format;

            $this->path = "./" . $this->email . "/" . $this->name;
            move_uploaded_file($_FILES["avatar"]["tmp_name"], $this->path);

            return $this->name;
        }

        return null;
    }
}