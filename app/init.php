<?php 
require_once '../vendor/autoload.php';
//require the database connection
require_once 'Include/config/database.php';
require_once 'Include/config/inc.config.php';
require_once 'Include/App.php';
require_once 'Include/Controller.php';


        
session_start();
$_SESSION['__DIR__'] = '/GPR_ENSP/public/'; //! Change if needed