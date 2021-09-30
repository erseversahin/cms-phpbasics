<?php

namespace App\Controllers;

use App\Model\ModelCustomer;
use App\Model\ModelHome;
use App\Model\ModelProject;
use Core\BaseController;
use Core\Session;

class Home extends BaseController
{
    public function Index()
    {

        $ModelHome = new ModelHome();
        $data['totals'] = $ModelHome->getTotals()['totals'];
        $data['projects'] = $ModelHome->getTotals()['projects'];

        $ModelProject = new ModelProject();
        $data['projects_table'] = $ModelProject->getProjectsByStatus('a');

        $ModelCustomer = new ModelCustomer();
        $data['customers_table'] = $ModelCustomer->getCustomers(5);

        $data['navbar'] = $this->view->load('static/navbar');
        $data['sidebar'] = $this->view->load('static/sidebar');

        echo $this->view->load('home/index', compact('data'));
    }
}