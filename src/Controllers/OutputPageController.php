<?php

namespace Oop\Exam\Controllers;

class OutputPageController
{
    public function getOutputs():void
    {
        if (!empty($_POST)) {
            $dataArray = json_decode(file_get_contents('./data.json'), true);
            $dataArray[] = $_POST;
            file_put_contents('./data.json', json_encode($dataArray));

        }   else echo 'cia bus exception error';

        require(__DIR__ . './../Views/OutputPage.php');

    }
}