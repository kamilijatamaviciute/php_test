<?php

namespace Oop\Exam\Controllers;

use Oop\Exam\Repository\DataRepository;

class InputPageController
{
    public function getInputs():void
    {
        require(__DIR__ . './../Views/InputPage.html');
    }




}