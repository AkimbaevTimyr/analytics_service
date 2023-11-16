<?php

namespace App\Controllers;
use wfm\Controller;


class MainController extends Controller
{
    public function index()
    {
        return $this->render('main/index', ['id' => 1, 'name' => 'John']);
    }

    public function test()
    {
        return $this->render('main/test', []);
    }
}