<?php

namespace App\Controllers;

use App\Models\Categories;
use wfm\Controller;


class MainController extends Controller
{
    public function index()
    {
        $model = new Categories();
        $result = $model->getAll();
        return $this->render('main/index', ['categories' => $result]);
    }

    public function test()
    {
        return $this->render('main/test', []);
    }
}