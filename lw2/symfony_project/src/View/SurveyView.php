<?php

namespace App\View;
use App\Service\Survey\SurveyInterface;

class SurveyView
{
    public static function getTemplateToSave() : string
    {
        return 'upload.html.twig';
    }

    public static function getTemplateToLoad() : string
    {
        return 'load.html.twig';
    }

    public static function getDataToSave(SurveyInterface $surveyServices) : array
    {
        $data = $surveyServices->saveSurvey();
        return $data;
    }

    public static function getDataToLoad(SurveyInterface $surveyServices) : array
    {
        $data = $surveyServices->loadSurvey();
        return $data;
    }
}