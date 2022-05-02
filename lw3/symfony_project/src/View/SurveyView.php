<?php

namespace App\View;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SurveyView extends AbstractController
{
    public function saveForm() : Response
    {
        return $this->render('indexsave.html.twig');
    }

    public function loadForm() : Response
    {
        return $this->render('indexload.html.twig');
    }
}