<?php

$cms->router->setNamespace('App\Controllers');

require BASEDIR.'/App/Routes/api.php';
require BASEDIR.'/App/Routes/web.php';
require BASEDIR.'/App/Routes/admin.php';



$cms->router->run();