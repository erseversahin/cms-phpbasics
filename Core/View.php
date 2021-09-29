<?php

namespace Core;

class View
{

    public $content;

    public function load($viewName , $data = [])
    {
        ob_start();
        extract($data);
        require BASEDIR.'/App/View/'.$viewName.'.php';
            $this->content = ob_get_contents();
        ob_clean();
        return $this->content;

    }



}