<?php

namespace App\Controllers;

use App\Models\Categories;
use App\Models\Users;
use core\Controller;


class MainController extends Controller
{
    private $types = [1,2,3,4,6,9,'all'];

    public function index()
    {
        $model = new Categories();
        $userModel = new Users();

        $result = $model->getAll();
        $userStats = $userModel->getUserStats('2023-11-02', '2020-12-02');

        return $this->render('main/index', [
            'categories' => $result,
            'types' => $this->types,
            'userStats' => $userStats,
        ]);
    }

    public function test()
    {
        return $this->render('main/test', []);
    }

}