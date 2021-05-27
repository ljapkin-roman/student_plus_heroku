<?php
namespace Summit\Core;

class View
{
    public function generate($content_view, $template_view, $data = null)
    {
        include dirname(__DIR__) . '/Views/Template_View.php';
    }
}