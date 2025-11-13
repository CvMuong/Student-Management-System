<?php 
session_start();

require_once 'core/function.php';
require_once 'models/StudentModel.php';
require_once 'controllers/StudentController.php';

$controller = new StudentController();
$keyword = $_GET['keyword'] ?? '';
$students = $controller->search($keyword);

include 'views/layout/header.php';
include 'views/students/search.php';
include 'views/layout/footer.php';
?>