<?php
include '../core/function.php';
include '../models/StudentModel.php';

class StudentController {
    public function index() {
        return StudentModel::getAll();
    }

    public function store($data, $files) {
        $errors = validate($data);

        if ($errors) {
            $_SESSION['errors'] = $errors;
            $_SESSION['old'] = $data;
            redirect('add.php');
            exit;
        }

        $avatar = uploadFile($files['avatar']);
        $data['avatar'] = $avatar ?? 'uploads/default.png';

        StudentModel::add($data);
        setFlash('Student added successfully.');
        redirect('index.php');
    }

    public function edit($id) {
        return StudentModel::getById($id);
    }

    public function update($id, $data, $file) {
        $errors = validate($data);

        if ($errors) {
            $_SESSION['errors'] = $errors;
            $_SESSION['old'] = $data;
            redirect("edit.php?id=$id");
            exit;
        }

        $avatar = uploadFile($file['avatar']);
        if ($avatar) $data['avatar'] = $avatar;

        StudentModel::update($id, $data);
        setFlash('Student updated successfully.');
        redirect('index.php');
    }

    public function delete($id) {
        StudentModel::delete($id);
        setFlash('Student deleted successfully.');
        redirect('index.php');
    }

    public function search($keyword) {
        return StudentModel::search($keyword);
    }
}
?>