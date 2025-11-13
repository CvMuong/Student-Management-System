<?php 
session_start();

require_once 'core/function.php';
require_once 'models/StudentModel.php';
require_once 'controllers/StudentController.php';

$controller = new StudentController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->store($_POST, $_FILES);
}

include 'views/layout/header.php';
include 'views/students/form.php';
include 'views/layout/header.php';
?>