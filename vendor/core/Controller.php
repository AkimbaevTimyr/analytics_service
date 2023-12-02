<?php

namespace core;

class Controller
{
    protected $layout = 'default';
    protected $title = '';

    //метод для рендера представления
    protected function render($view, $data = [])
    {
        return new Page($this->layout, $this->title, $view, $data);
    }
}