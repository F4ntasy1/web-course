<?php

namespace App\Controller;

use App\Service\Survey\SurveyInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class SurveyController extends AbstractController
{
    public function saveSurvey(SurveyInterface $surveyServices) : Response
    {
          $data = $surveyServices->saveSurvey();
          return $this->render('upload.html.twig',
              [
                  'firstname' => $data['firstname'],
                  'lastname' => $data['lastname'],
                  'email' => $data['email'],
                  'age' => $data['age'],
                  'avatar' => $data['avatar'],
              ]);
    }

    public function loadSurvey(SurveyInterface $surveyServices) : Response
    {
        $data = $surveyServices->loadSurvey();
        return $this->render('load.html.twig',
            [
                'firstname' => $data['firstname'],
                'lastname' => $data['lastname'],
                'email' => $data['email'],
                'age' => $data['age'],
                'avatar' => $data['avatar'],
            ]);
    }
}