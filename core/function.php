<?php 
function redirect($url) {
    header("Location: $url");
    exit();
}

function setFlash($msg) {
    $_SESSION['flash'] = $msg;

}

function getFlash() {
    if (!empty($_SESSION['flash'])) {
        $msg = $_SESSION['flash'];
        unset($_SESSION['flash']);
        return $msg;
    }
    return null;
}

function uploadFile($file, $targetDir = 'uploads/') {
    if ($file['error'] !== 0) return null;

    $allowed = ['png', 'jpg', 'jpeg', 'gif'];
    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    if (!in_array($ext, $allowed)) return null;

    if (!file_exists($targetDir)) mkdir($targetDir, 0777, true);

    $targetFile = uniqid() . '.' . $ext;
    $targetPath = $targetDir . $targetFile;
    move_uploaded_file($file['tmp_name'], $targetPath);
    return $targetPath;
}

function validate($data) {
    $errors = [];

    if (empty(trim($data['name']))) $errors['name']= 'Họ tên không được để trống.';
    if (empty(trim($data['email'])) || filter_var($data['email'], FILTER_VALIDATE_EMAIL) === false) {
        $errors['email'] = 'Email không hợp lệ.';
    } 
    if (empty(trim($data['phone']))) $errors['phone'] = 'Số điện thoại không được để trống.';

    return $errors;
}
?>