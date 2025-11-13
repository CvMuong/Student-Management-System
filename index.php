<?php 
session_start();

require_once 'core/function.php';
require_once 'models/StudentModel.php';
require_once 'controllers/StudentController.php';

$controller = new StudentController();

$students = $controller->index();
$flash = getFlash();
?>

<?php 
include 'views/layout/header.php';
?>

<div class="container mt-4">
    <h2>Danh sách học viên</h2>

    <?php if ($flash): ?>
        <div style="color: green;"><?= $flash ?></div>
    <?php endif; ?>

    <a href="add.php">➕ Thêm học viên</a> |
    <a href="index.php">🔄 Tải lại</a>

    <form action="search.php" method="GET" style="margin-top:10px;">
        <input type="text" name="keyword" placeholder="Tìm theo tên hoặc email">
        <button type="submit">Tìm kiếm</button>
    </form>

    <table border="1" cellpadding="10" cellspacing="0" style="margin-top:15px; width:100%;">
        <tr>
            <th>Ảnh</th>
            <th>Họ tên</th>
            <th>Email</th>
            <th>Giới tính</th>
            <th>Ngày sinh</th>
            <th>Thao tác</th>
        </tr>
        <?php foreach ($students as $s): ?>
        <tr>
            <td><img src="<?= $s['avatar'] ?>" width="60" height="60" style="object-fit:cover;border-radius:5px;"></td>
            <td><?= htmlspecialchars($s['name']) ?></td>
            <td><?= htmlspecialchars($s['email']) ?></td>
            <td><?= $s['gender'] ?></td>
            <td><?= $s['birthday'] ?></td>
            <td>
                <a href="edit.php?id=<?= $s['id'] ?>">✏️ Sửa</a> |
                <a href="delete.php?id=<?= $s['id'] ?>" onclick="return confirm('Bạn có chắc muốn xóa?')">🗑️ Xóa</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>

<?php include 'views/layout/footer.php'; ?>