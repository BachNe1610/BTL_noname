# README - Hệ thống Quản lý Nhân sự

## Giới thiệu

Dự án này là một hệ thống quản lý nhân sự đơn giản được phát triển bằng Laravel. Hệ thống cung cấp các chức năng cơ bản như quản lý tài khoản người dùng, quản lý nhân viên và thống kê nhân sự theo phòng ban. Dự án được xây dựng nhằm phục vụ mục đích học tập và thực hành phát triển ứng dụng web.

## Chức năng chính

- **Quản lý tài khoản người dùng**
  - Đăng ký tài khoản mới.
  - Đăng nhập, đăng xuất hệ thống.
- **Quản lý nhân viên**
  - Thêm, sửa, xóa thông tin nhân viên.
  - Tìm kiếm nhân viên theo tiêu chí cụ thể.
- **Báo cáo và phân tích**
  - Thống kê số lượng nhân viên theo từng phòng ban.

## Công nghệ sử dụng

- **Framework:** Laravel (PHP)
- **Ngôn ngữ lập trình:** PHP, HTML, CSS, JavaScript
- **Cơ sở dữ liệu:** MySQL

## Cài đặt

### Yêu cầu hệ thống

- PHP >= 8.0
- Composer
- MySQL
- Laravel
- Node.js (nếu sử dụng Laravel Mix để biên dịch assets)

### Hướng dẫn cài đặt

1. **Clone repository**
   ```sh
   git clone https://github.com/your-repo/human-resource-management.git
   cd human-resource-management
   ```
2. **Cài đặt các dependencies**
   ```sh
   composer install
   npm install
   ```
3. **Cấu hình môi trường**
   - Sao chép tệp `.env.example` thành `.env` và chỉnh sửa các thông tin cơ sở dữ liệu.
   ```sh
   cp .env.example .env
   ```
   - Cập nhật thông tin kết nối MySQL trong tệp `.env`
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```
4. **Tạo khóa ứng dụng**
   ```sh
   php artisan key:generate
   ```
5. **Chạy migration để tạo bảng trong cơ sở dữ liệu**
   ```sh
   php artisan migrate
   ```
6. **Khởi chạy ứng dụng**
   ```sh
   php artisan serve
   ```
   Ứng dụng sẽ chạy tại `http://127.0.0.1:8000`

## Cấu trúc thư mục

```
HUMAN-RESOURCE-MANAGEMENT/
|_____app  => Chứa mã nguồn chính
|   |______Http  => Chứa các thành phần liên quan đến HTTP
|   |   |______Controllers  => Chứa các lớp để xử lý yêu cầu HTTP
|   |______Models => Chứa các model Eloquent
|   |______Providers => Chứa các service đăng ký trong hệ thống
|_____bootstrap => Chứa tệp khởi động framework
|_____config => Chứa các tệp cấu hình hệ thống
|_____database => Chứa migration, factory và seed
|_____public => Chứa tài nguyên công khai như ảnh, CSS, JS
|_____resources => Chứa tệp nguồn như view (Blade template)
|_____routes => Định nghĩa các route của ứng dụng
|   |____web.php => Route điều hướng chính
|_____storage => Chứa tệp biên dịch, log và tệp tải lên
```

## Ghi chú

- Hệ thống này được phát triển với mục đích học tập và không hướng tới triển khai thực tế.
- Người dùng có thể mở rộng hệ thống bằng cách thêm các chức năng tùy chỉnh theo nhu cầu.

## Liên hệ

Nếu bạn có bất kỳ câu hỏi nào, vui lòng liên hệ qua email: `your-email@example.com`

