<?php

namespace App\Controllers;

use Core\BaseController;
use Core\Session;

class Home extends BaseController
{
    public function Index()
    {
        $user = [
            'isim' => 'Şahin',
            'soyisim' => 'ERSEVER',
            'yas' => 28
        ];


        $data['navbar'] = $this->view->load('static/navbar');
        $data['sidebar'] = $this->view->load('static/sidebar');

        echo $this->view->load('home/index', compact('data'));
    }
}