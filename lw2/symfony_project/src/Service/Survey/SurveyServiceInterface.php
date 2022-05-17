<?php

namespace App\Service\Survey;

use App\Module\Survey\SurveyFileStorage;
use App\Module\Survey\RequestSurveyLoader;

class SurveyServiceInterface implements SurveyInterface
{
    public function saveSurvey() : array
    {
        $requestSurveyLoader = new RequestSurveyLoader();
        $survey = $requestSurveyLoader->getSurvey();
        $surveyFileStorage = new SurveyFileStorage($survey);
        $surveyFileStorage->saveSurvey();

        return
            [
                'firstname' => $survey->getFirstName(),
                'lastname' => $survey->getLastName(),
                'email' => $survey->getEmail(),
                'age' => $survey->getAge(),
            ];
    }

    public function loadSurvey() : array
    {
        $requestSurveyLoader = new RequestSurveyLoader();
        $survey = $requestSurveyLoader->getSurvey();
        $surveyFileStorage = new SurveyFileStorage($survey);
        $loadSurvey = $surveyFileStorage->loadSurvey();

        return
            [
                'firstname' => $loadSurvey->getFirstName(),
                'lastname' => $loadSurvey->getLastName(),
                'email' => $loadSurvey->getEmail(),
                'age' => $loadSurvey->getAge(),
            ];
    }
}
