<?php

namespace Oop\Exam\Controllers;


class HomePageController
{
    public function RenderHomePage():string
    {
        return '<h1> Welcome to Home Page <h1>';
    }

    public function RenderNotFoundPage():string
    {
        return '<h1> Page Not Found <h1>';
    }
}