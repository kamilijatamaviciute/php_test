<?php

namespace Oop\Exam\Framework;

use Oop\Exam\Controllers\HomePageController;
use Oop\Exam\Controllers\InputPageController;

class Router
{
    public function __construct(
        private HomePageController $homePageController,
        private InputPageController $inputPageController)

    {

    }


    public function process(string $route):void {

        switch ($route) {
            case '':
                echo $this->homePageController->RenderHomePage();
                break;

            case 'apskaita':
                echo $this->inputPageController->getInputs();
                break;
            case 'rezultatai':
//                echo $this->inputPageController->getOutputs();
                break;
            default:
                http_response_code(404);
                echo $this->homePageController->renderNotFoundPage();
                break;
        }

    }
}