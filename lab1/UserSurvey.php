<?php
require_once("./src/common.inc.php");

$requestSurveyLoader = new RequestSurveyLoader();
$surveyPrint = new SurveyPrint();

$survey = $requestSurveyLoader->getSurvey();

$surveyFileStorage = new SurveyFileStorage($survey);

$surveyFileStorage->saveSurvey();
$data = $surveyFileStorage->loadSurvey();

$surveyPrint->printSurvey($data);
