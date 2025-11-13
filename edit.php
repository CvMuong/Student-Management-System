<?php 
session_start();

require_once 'core/function.php';
require_once 'models/StudentModel.php';
require_once 'controllers/StudentController.php';

$controller = new StudentController();

$id = $_GET['id'] ?? null;
$student = $controller->edit($id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->update($id, $_POST, $_FILES);
}

include 'views/layout/header.php';
include 'views/students/form.php';
include 'views/layout/footer.php';
?>