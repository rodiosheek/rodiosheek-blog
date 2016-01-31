<link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<link href="./bootstrap/starter-template.css" rel="stylesheet">
<script src="./bootstrap/js/bootstrap.min.js"></script>
<script src="./bootstrap/js/jquery-1.12.0.min.js"></script>
<link rel="icon" href="./images/favicon.ico">

<?php

error_reporting(0);

session_start();
header('Content-type: text/html; charset=UTF-8');

define('ROOT', dirname(__FILE__));
define('ADMIN', isset($_SESSION['ADMIN']));

require ROOT . '/includes/Classes/MainController.php';

$action = isset($_GET['action']) ? $_GET['action'] : 'list';

$controller = new MainController();
$controller->controller($action);