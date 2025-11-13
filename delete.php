<?php 
session_start();

require_once 'core/function.php';
require_once 'models/StudentModel.php';
require_once 'controllers/StudentController.php';

$controller = new StudentController();
$id = $_GET['id'] ?? null;
$controller->delete($id);
?>