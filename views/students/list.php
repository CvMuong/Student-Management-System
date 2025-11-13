<div class="container mt-4">
    <h2>Kết quả tìm kiếm</h2>
    <a href="index.php">← Quay lại danh sách</a>

    <table border="1" cellpadding="10" cellspacing="0" style="margin-top:15px; width:100%;">
        <tr>
            <th>Ảnh</th>
            <th>Họ tên</th>
            <th>Email</th>
            <th>Giới tính</th>
            <th>Ngày sinh</th>
        </tr>
        <?php foreach ($students as $s): ?>
        <tr>
            <td><img src="<?= $s['avatar'] ?>" width="60" height="60" style="object-fit:cover;border-radius:5px;"></td>
            <td><?= htmlspecialchars($s['name']) ?></td>
            <td><?= htmlspecialchars($s['email']) ?></td>
            <td><?= $s['gender'] ?></td>
            <td><?= $s['birthday'] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
