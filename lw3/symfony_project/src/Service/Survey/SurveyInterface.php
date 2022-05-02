<?php

namespace App\Service\Survey;

interface SurveyInterface
{
    public function saveSurvey() : array;
    public function loadSurvey() : array;
}