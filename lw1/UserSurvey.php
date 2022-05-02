<?php
require_once("./src/common.inc.php");

$requestSurveyLoader = new RequestSurveyLoader();
$surveyPrint = new SurveyPrint();
$surveyFileStorage = new SurveyFileStorage();

$survey = $requestSurveyLoader->getSurvey();

$surveyFileStorage->getData($survey);

$surveyFileStorage->saveSurvey();
$data = $surveyFileStorage->loadSurvey();

$surveyPrint->printSurvey($data);
