<?php

namespace App\Service\Survey;

use App\Module\Survey\SurveyFileStorage;
use App\Module\Survey\RequestSurveyLoader;
use App\Module\PhotosStorage\PhotoStorage;

class SurveyService implements SurveyInterface
{
    public function saveSurvey() : array
    {
        $requestSurveyLoader = new RequestSurveyLoader();
        $surveyFileStorage = new SurveyFileStorage();
        $photoStorage = new PhotoStorage();

        $survey = $requestSurveyLoader->getSurvey();
        $surveyFileStorage->getData($survey);
        $surveyFileStorage->saveSurvey();
        $avatar = $photoStorage->saveAvatar($survey);
        return
            [
                'firstname' => $survey->getFirstName(),
                'lastname' => $survey->getLastName(),
                'email' => $survey->getEmail(),
                'age' => $survey->getAge(),
                'avatar' => $avatar,
            ];
    }

    public function loadSurvey() : array
    {
        $requestSurveyLoader = new RequestSurveyLoader();
        $surveyFileStorage = new SurveyFileStorage();
        $photoStorage = new PhotoStorage();

        $survey = $requestSurveyLoader->getSurvey();
        $surveyFileStorage->getData($survey);
        $avatar = $photoStorage->saveAvatar($survey);
        $loadSurvey = $surveyFileStorage->loadSurvey($avatar);
        return
            [
                'firstname' => $loadSurvey->getFirstName(),
                'lastname' => $loadSurvey->getLastName(),
                'email' => $loadSurvey->getEmail(),
                'age' => $loadSurvey->getAge(),
                'avatar' => $loadSurvey->getAvatar(),
            ];
    }
}
