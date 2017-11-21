<?php
// Start Session

session_start();

require('config.php');

require('classes/Messages.php');
require('classes/Bootstrap.php');
require('classes/Controller.php');
require('classes/Model.php');

require('controllers/home.php');
require('controllers/shares.php');
require('controllers/users.php');

require('models/home.php');
require('models/user.php');
require('models/share.php');

$bootstrap = new Bootstrap($_GET);

$controller = $bootstrap->createController();

if($controller){
    $controller->executeAction();
}