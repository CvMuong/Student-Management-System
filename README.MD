# 📚 Hệ thống Quản lý Học viên

Ứng dụng web đơn giản để quản lý thông tin học viên, được xây dựng bằng PHP thuần với kiến trúc MVC.

## ✨ Tính năng

- ➕ **Thêm học viên mới** với đầy đủ thông tin
- ✏️ **Cập nhật thông tin** học viên
- 🗑️ **Xóa học viên** khỏi danh sách
- 🔍 **Tìm kiếm** học viên theo tên hoặc email
- 📸 **Upload ảnh đại diện** cho học viên
- ✅ **Validation** dữ liệu đầu vào
- 💾 **Lưu trữ dữ liệu** trong PHP Session

## 📁 Cấu trúc thư mục

```
project/
│
├── core/
│   └── function.php              # Các hàm tiện ích chung
│
├── controllers/
│   └── StudentController.php     # Controller xử lý logic nghiệp vụ
│
├── models/
│   └── StudentModel.php          # Model tương tác với dữ liệu
│
├── views/
│   ├── layout/
│   │   ├── header.php            # Header chung
│   │   └── footer.php            # Footer chung
│   │
│   └── students/
│       ├── form.php              # Form thêm/sửa học viên
│       ├── list.php              # Hiển thị danh sách
│       └── search.php            # Kết quả tìm kiếm
│
├── uploads/                      # Thư mục lưu ảnh đại diện
│
├── index.php                     # Trang chủ - danh sách học viên
├── add.php                       # Trang thêm học viên
├── edit.php                      # Trang sửa học viên
├── delete.php                    # Xử lý xóa học viên
└── search.php                    # Trang tìm kiếm
```

## 🛠️ Công nghệ sử dụng

- **PHP** (thuần, không framework)
- **Session** để lưu trữ dữ liệu
- **HTML/CSS** cho giao diện
- Kiến trúc **MVC** (Model-View-Controller)

## 📋 Yêu cầu hệ thống

- PHP 7.4 trở lên
- Web server (Apache/Nginx)
- Extension PHP: `session`, `fileinfo`

## 🚀 Cài đặt và chạy

### 1. Clone hoặc tải project về

```bash
git clone <repository-url>
cd student-management
```

### 2. Tạo thư mục uploads

```bash
mkdir uploads
chmod 777 uploads
```

### 3. Cấu hình web server

**Với XAMPP/WAMP:**
- Copy project vào thư mục `htdocs/`
- Truy cập: `http://localhost/student-management/`

**Với PHP Built-in Server:**
```bash
php -S localhost:8000
```
Truy cập: `http://localhost:8000/`

### 4. Sử dụng ứng dụng

Mở trình duyệt và truy cập URL đã cấu hình ở bước 3.

## 📖 Hướng dẫn sử dụng

### Thêm học viên mới
1. Click vào "➕ Thêm học viên"
2. Điền đầy đủ thông tin (Họ tên, Email, SĐT, Giới tính, Ngày sinh)
3. Chọn ảnh đại diện (tùy chọn)
4. Click "Thêm mới"

### Cập nhật thông tin
1. Click "✏️ Sửa" ở dòng học viên cần chỉnh sửa
2. Thay đổi thông tin cần thiết
3. Click "Cập nhật"

### Xóa học viên
1. Click "🗑️ Xóa" ở dòng học viên cần xóa
2. Xác nhận trong hộp thoại

### Tìm kiếm
1. Nhập từ khóa (tên hoặc email) vào ô tìm kiếm
2. Click "Tìm kiếm"

## 🔧 Các chức năng chính

### Core Functions (`core/function.php`)

- `redirect($url)` - Chuyển hướng trang
- `setFlash($msg)` - Lưu thông báo flash
- `getFlash()` - Lấy và xóa thông báo flash
- `uploadFile($file, $targetDir)` - Upload file ảnh
- `validate($data)` - Validate dữ liệu đầu vào

### StudentModel (`models/StudentModel.php`)

- `getAll()` - Lấy tất cả học viên
- `getById($id)` - Lấy học viên theo ID
- `add($data)` - Thêm học viên mới
- `update($id, $data)` - Cập nhật thông tin
- `delete($id)` - Xóa học viên
- `search($keyword)` - Tìm kiếm học viên

### StudentController (`controllers/StudentController.php`)

- `index()` - Hiển thị danh sách
- `store($data, $files)` - Lưu học viên mới
- `edit($id)` - Lấy thông tin để sửa
- `update($id, $data, $file)` - Cập nhật học viên
- `delete($id)` - Xóa học viên
- `search($keyword)` - Tìm kiếm

## ⚠️ Validation Rules

- **Họ tên**: Không được để trống
- **Email**: Không được để trống và phải đúng định dạng email
- **Số điện thoại**: Không được để trống
- **Ảnh đại diện**: Chỉ chấp nhận `.png`, `.jpg`, `.jpeg`, `.gif`

## 🐛 Lỗi đã biết

### 1. Lỗi trong `add.php`
**Dòng cuối cùng:**
```php
include 'views/layout/header.php';  // ❌ Sai - Đã include ở trên
```
**Sửa thành:**
```php
include 'views/layout/footer.php';  // ✅ Đúng
```

### 2. Lỗi trong `controllers/StudentController.php`
**Dòng đầu:**
```php
include '../core/function.php';     // ❌ Sai đường dẫn
include '../models/StudentModel.php'; // ❌ Sai đường dẫn
```
**Sửa thành:**
```php
// Không cần include vì đã require_once ở file gọi controller
```

### 3. Dữ liệu bị mất khi reload
Do sử dụng Session để lưu trữ, dữ liệu sẽ mất khi:
- Đóng trình duyệt
- Xóa session
- Restart server

**Giải pháp:** Tích hợp database (MySQL/PostgreSQL) để lưu trữ lâu dài.

## 🔒 Bảo mật

⚠️ **Lưu ý:** Đây là project demo, chưa có các biện pháp bảo mật nâng cao:

- Không có xác thực người dùng
- Không có phân quyền
- Không mã hóa mật khẩu (vì không có chức năng login)
- Không có CSRF protection
- Không sanitize đầy đủ input

**Không sử dụng trong môi trường production mà không bổ sung bảo mật!**

## 📝 Ghi chú

- Dữ liệu được lưu trong `$_SESSION['students']`
- Ảnh được lưu trong thư mục `uploads/`
- Mỗi ảnh có tên unique được tạo bằng `uniqid()`
- Nếu không upload ảnh, sẽ dùng ảnh mặc định `uploads/default.png`

## 🎯 Phát triển thêm

Các tính năng có thể mở rộng:

- [ ] Tích hợp database
- [ ] Phân trang cho danh sách học viên
- [ ] Export dữ liệu ra Excel/PDF
- [ ] Import dữ liệu từ CSV
- [ ] Thêm chức năng đăng nhập/đăng ký
- [ ] Quản lý lớp học và môn học
- [ ] Tính năng điểm danh
- [ ] API RESTful
- [ ] Responsive design cho mobile

## 👨‍💻 Tác giả

Project thực hành về PHP MVC cơ bản

## 📄 License

Free to use for educational purposes.

---

**Happy Coding! 🚀**