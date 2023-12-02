<?php

namespace core;

use core\Page;

class View
{
    private $url = '/moneyapp/';

    public function render(Page $page)
    {
        return $this->renderLayout($page, $this->renderView($page));
    }

    //if i have moneyapp or something prefix i use $_SERVER['DOCUMENT_ROOT']
    private function renderLayout(Page $page, $content) 
    {
		$layoutPath = $_SERVER['DOCUMENT_ROOT'] . $this->url . "/app/views/layouts/{$page->layout}.php";
        if(file_exists($layoutPath))
        {
            ob_start();
                $title = $page->title;
                include $layoutPath;
            return ob_get_clean();
        }else
        {
            throw new \Exception("Layout file {$layoutPath} does not exist or is not readable.");
        }
    }
    
    private function renderView(Page $page) 
    {
        $viewPath = $_SERVER['DOCUMENT_ROOT'] . $this->url . "/app/views/{$page->view}.php";
        if(file_exists($viewPath))
        {
            ob_start();
                $data = $page->data;
                extract($data);
                include $viewPath;
            return ob_get_clean();
        }else
        {
            throw new \Exception("Layout file {$layoutPath} does not exist or is not readable.");
        }
    }
}