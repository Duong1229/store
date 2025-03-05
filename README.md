DỰ ÁN: XÂY DỰNG ỨNG DỤNG WEB BÁN ĐIỆN THOẠI VỚI LARAVEL VÀ PHP

### 1. Giới thiệu dự án

Ngày nay, nhu cầu mua sắm trực tuyến ngày càng tăng cao, đặc biệt là trong lĩnh vực công nghệ. Một nền tảng bán hàng chuyên nghiệp không chỉ giúp doanh nghiệp dễ dàng tiếp cận khách hàng mà còn giúp người mua có trải nghiệm tốt hơn trong việc tìm kiếm và đặt mua sản phẩm. Dự án này hướng đến việc xây dựng một hệ thống website bán điện thoại di động với đầy đủ các tính năng cần thiết để hỗ trợ khách hàng trong việc lựa chọn, đặt hàng và thanh toán trực tuyến.

Ứng dụng web được xây dựng bằng Laravel 11.43.2 và PHP với kiến trúc hiện đại, đảm bảo hiệu suất, bảo mật và tính linh hoạt cao. Dự án bao gồm hai phần chính: trang bán hàng dành cho khách hàng và trang quản trị dành cho quản lý cửa hàng.

### 2. Mục tiêu dự án

- Xây dựng một hệ thống bán hàng trực tuyến chuyên nghiệp.
- Cung cấp giao diện thân thiện, dễ sử dụng cho cả khách hàng và quản trị viên.
- Tích hợp các tính năng cần thiết như giỏ hàng, thanh toán trực tuyến, quản lý đơn hàng và quản lý sản phẩm.
- Đảm bảo hiệu suất tốt và bảo mật hệ thống.
- Hỗ trợ nhiều phương thức thanh toán khác nhau.

### 3. Công nghệ sử dụng

- **Ngôn ngữ lập trình**: PHP 
- **Cơ sở dữ liệu**: MySQL
- **Front-end**: Blade Templates, HTML, CSS, JavaScript
- **Thư viện hỗ trợ**: Bootstrap
- **Hệ thống quản lý phiên bản**: Git
- **Máy chủ**: Apache hoặc Nginx

### 4. Tiến độ thực hiện

#### 4.1. Giai đoạn 1: Phân tích và thiết kế (Hoàn thành)
- Xác định yêu cầu chức năng của hệ thống.
- Xây dựng mô hình dữ liệu và kiến trúc phần mềm.
- Thiết kế giao diện sơ bộ cho hệ thống.

#### 4.2. Giai đoạn 2: Triển khai cơ sở dữ liệu (Hoàn thành)
- Xây dựng cơ sở dữ liệu gồm các bảng chính như users, products, orders, cart.
- Thiết lập các ràng buộc và quan hệ giữa các bảng dữ liệu.

#### 4.3. Giai đoạn 3: Phát triển backend (Hoàn Thành)
- Xây dựng chức năng quản lý sản phẩm: thêm, sửa, xóa.
- Xây dựng chức năng đăng ký, đăng nhập và quản lý người dùng.
- Triển khai chức năng giỏ hàng và đặt hàng 

#### 4.4. Giai đoạn 4: Xây dựng frontend (Đang triển khai)
- Hoàn thiện giao diện trang chủ và danh mục sản phẩm.
- Thiết kế trang chi tiết sản phẩm và trang giỏ hàng.

#### 4.5. Giai đoạn 5: Tích hợp thanh toán và kiểm thử hệ thống (Sắp triển khai)
- Tích hợp cổng thanh toán trực tuyến (VNPay, Momo,...).
- Kiểm thử toàn bộ hệ thống trước khi triển khai.

### 5. Kế hoạch tiếp theo

- Hoàn thiện giỏ hàng và thanh toán.
- Xây dựng trang quản trị với đầy đủ tính năng quản lý đơn hàng, sản phẩm và người dùng.
- Cải thiện trải nghiệm người dùng bằng cách tối ưu giao diện và tốc độ tải trang.
- Tiến hành kiểm thử và sửa lỗi.
<h2>Sơ đồ cấu trúc và sơ đồ thuật toán </h2>

<h3>1. Biểu đồ hoạt động</h3>

![sequence_view_products](https://github.com/user-attachments/assets/b700eda5-a7b4-4cd5-a59b-7644aab6cd5c)

<h3>2. Biểu đồ UML các chức năng</h3>
-  Chức năng đăng nhập 

![dangnhap](https://github.com/user-attachments/assets/37c8cbbd-0ec7-4aa5-b21e-381474c18513)

- Chức năng thêm sản phẩm ![themsp](https://github.com/user-attachments/assets/832d093d-f284-4e95-96de-46d44e804ccf)

- Chức năng sửa sản phẩm
 ![suasanpham](https://github.com/user-attachments/assets/39c8bda3-ee6b-4359-b83d-ca93232b4708)


- Chức năng xóa sản phẩm![xoasanpham](https://github.com/user-attachments/assets/2fd1ac52-4bd3-48be-8a75-a57875bf4d30)

 
- Chức năng thêm đơn hàng ![themdon](https://github.com/user-attachments/assets/969242c7-d8a7-46f5-85b3-0e2faada3b3d)


- Chức năng sửa đơn hàng![suadon](https://github.com/user-attachments/assets/689ed5e1-ab28-4569-8f01-7ca88de0a586)


 
- Chức năng xóa đơn hàng![xoahoadon](https://github.com/user-attachments/assets/9fcb7e89-1eeb-40ad-b1d9-9768eb2231a6)

 
-	Trang đăng kí và đăng nhập dành cho khách hàng![dangnhaokhachhang](https://github.com/user-attachments/assets/8013a516-b524-4805-8527-20268c7c35b4)

 
-	Chức năng checkout, làm việc với giỏ hàng, …
 ![check](https://github.com/user-attachments/assets/2cbf874a-c5f3-4198-b8be-b1173f230204)

<h2>Thông tin dự án</h2>
Link Github Repo: https://github.com/Duong1229/store

Link web: http://127.0.0.1:8000/
<h2>DEMO SẢN PHẨM</h2>

[DEMO](https://youtu.be/41qhtWVcHZk?feature=shared)



