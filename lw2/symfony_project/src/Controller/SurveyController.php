<?php

namespace App\Controller;

use App\Service\Survey\SurveyInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\View\SurveyView;

class SurveyController extends AbstractController
{
    public function saveSurvey(SurveyInterface $surveyServices) : Response
    {
        return $this->render(SurveyView::getTemplateToSave(), SurveyView::getDataToSave($surveyServices));
    }

    public function loadSurvey(SurveyInterface $surveyServices) : Response
    {
        return $this->render(SurveyView::getTemplateToLoad(), SurveyView::getDataToLoad($surveyServices));
    }
}