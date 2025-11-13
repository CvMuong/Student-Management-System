<?php
// Lấy từ khóa tìm kiếm từ URL (ví dụ: ?keyword=abc)
$keyword = $_GET['keyword'] ?? '';

// Khởi tạo controller
$controller = new StudentController();

// Gọi phương thức search() trong controller
$students = $controller->search($keyword);

include 'views/layout/header.php';
?>

<div class="container mt-4">
    <h2>Kết quả tìm kiếm cho: "<?= htmlspecialchars($keyword) ?>"</h2>
    <a href="index.php">← Quay lại danh sách</a>

    <?php if (empty($students)): ?>
        <p>Không tìm thấy học viên nào.</p>
    <?php else: ?>
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
    <?php endif; ?>
</div>

<?php include 'views/layout/footer.php'; ?>
