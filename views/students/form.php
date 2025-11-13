<?php
$errors = $_SESSION['errors'] ?? [];
$old = $_SESSION['old'] ?? [];
unset($_SESSION['errors'], $_SESSION['old']);

$isEdit = isset($student);
?>

<div class="container">
    <h2><?= $isEdit ? 'Cập nhật học viên' : 'Thêm học viên' ?></h2>

    <form method="POST" enctype="multipart/form-data">
        <label>Họ tên:</label><br>
        <input type="text" name="name" value="<?= $old['name'] ?? $student['name'] ?? '' ?>"><br>
        <small style="color:red;"><?= $errors['name'] ?? '' ?></small><br>

        <label>Email:</label><br>
        <input type="text" name="email" value="<?= $old['email'] ?? $student['email'] ?? '' ?>"><br>
        <small style="color:red;"><?= $errors['email'] ?? '' ?></small><br>

        <label>Số điện thoại:</label><br>
        <input type="text" name="phone" value="<?= $old['phone'] ?? $student['phone'] ?? '' ?>"><br>
        <small style="color:red;"><?= $errors['phone'] ?? '' ?></small><br>

        <label>Giới tính:</label><br>
        <select name="gender">
            <?php
            $genders = ['Nam', 'Nữ', 'Khác'];
            $selectedGender = $old['gender'] ?? $student['gender'] ?? '';
            foreach ($genders as $g) {
                $selected = $g == $selectedGender ? 'selected' : '';
                echo "<option $selected>$g</option>";
            }
            ?>
        </select><br><br>

        <label>Ngày sinh:</label><br>
        <input type="date" name="birthday" value="<?= $old['birthday'] ?? $student['birthday'] ?? '' ?>"><br><br>

        <label>Ảnh đại diện:</label><br>
        <input type="file" name="avatar"><br><br>
        <?php if (!empty($student['avatar'])): ?>
            <img src="<?= $student['avatar'] ?>" width="80">
        <?php endif; ?>

        <br><br>
        <button type="submit"><?= $isEdit ? 'Cập nhật' : 'Thêm mới' ?></button>
        <a href="index.php">Quay lại</a>
    </form>
</div>
