<!--step.php-->
Các bước cơ bản xây dựng 1 Website từ đầu (from to scratch)
+ B1: Lên ý tưởng và chọn nhóm
Ý tưởng: bán hàng, tin tức, thi trắc nghiệm ...
Chọn nhóm: độc lập hoặc tối đa 3 bạn
+ B2: Chuẩn bị giao diện tĩnh (HTML CSS JS) cho Backend và
Frontend:
Tự code
Tìm template free:
 - Frontend: search google : template HTML CSS free
 - Backend: AdminLTE
 + Xác định các chức năng mà website có thể có để dựng giao diện
tương ứng sau khi có đc khung trang web
Một số chức năng của web bán hàng: trang chủ, giỏ hàng, thanh toán,
liên hệ, thống kê đơn hàng, chi tiết st/tin tức, danh sách sp/
tin tức ...
Code trang thanh toán ?? dựa vào chức năng tương ứng của website
thực tế để lấy ý tưởng
+ B3: Phân tích CSDL dựa vào giao diện B2:
- Tạo CSDL php0722e_mvc
- Phân tích các bảng từ giao diện B2:
+ Phân tích toàn bộ các trang HTML, chủ yếu từ giao diện frontend,
phân tích trang nào thì đi từ trên xuống:
+ Tự đánh giá thông tin có hay thay đổi hay ko:
Nếu hay thay đổi thì tạo 1 bảng để lưu, code để tạo ra
CRUD cho phép user tự thao tác -> dev phải code CRUD ở backend, và
frontend lấy data hiển thị, ưu điểm là user tự thay đổi đc
thông tin mà ko cần nhờ dev
Nếu ít khi thay đổi thì ko cần tạo bảng, mà để thông tin ở dạng
tĩnh, dev ko cần code CRUD, tuy nhiên user ko tự sửa đc mà cần
dev can thiệp sửa trong code
- Tạo bảng menus: quản lý thông tin các menu:
id: khóa chính
name: tên menu
link: liên kết của menu
status: trạng thái của menu, tinyint 0 - ẩn, 1 - hiển thị
created_at: ngày tạo
updated_at: ngày cập nhật cuối cùng
Các trường id, status, created_at, updated_at: thông dụng
name, link: nghiệp vụ
- Tạo bảng products: qly thông tin sản phẩm, cần tìm tất cả trang
giao diện đang liên quan đến đối tượng hiện tại để phân tích:
trang chủ, danh sách sp, chi tiết ...:
id

avatar: tên file ảnh
name: tên sp
price: giá sp
summary: mô tả ngắn, TEXT
content: chi tiết sp, TEXT
amount: tổng số sp trong kho
seo_title: SEO tiêu đề sp
seo_description: SEO mô tả sp
seo_keywords: SEO các từ khóa khi tìm kiếm sp
category_id: khóa ngoại liên kết với bảng categories

status
created_at
updated_at

+ B4: Tạo cấu trúc thư mục theo mô hình MVC để cbi code
mvc_demo/
        /frontend: cấu trúc thư mục MVC đã học
        /backend: cấu trúc thư mục MVC đã học
+ B5: Code..........