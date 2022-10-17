<!--crud_user/demo_ajax.php
Kỹ thuật Ajax:
- Asynchronous Javascript And XML, là kỹ thuật dựa trên Javascript,
giúp tạo ra các chức năng mà ko cần tải lại trang
- Là kỹ thuật ko đồng bộ, Javascript ko đồng bộ, PHP đồng bộ
- Web viết bằng JS chạy nhanh hơn PHP
- Nên dùng Ajax của thư viện jQuery cho dễ thao tác
link jquery cdn
-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<a href="#" id="click-ajax">
    Click để hiển thị trang danh sách user
</a>
<div id="result">
    Danh sách sẽ hiển thị tại đây
</div>
<script type="text/javascript">
    $(document).ready(function() {
        // alert('test jQuery');
        // Click vào thẻ a thì sẽ gọi ajax để nhờ ajax gửi dữ
        //liệu lên PHP theo cơ chế ko đồng bộ và ko cần tải
        //lại trang
        $('#click-ajax').click(function() {
            // alert('abc');
            $.ajax({
                // url PHP mà ajax sẽ gọi lên
                url: 'index.php',
                // method gửi lên dữ liệu lên: post, get, put, delete
                method: 'get',
                // data gửi lên PHP
                data: {
                    test: 123,
                    abc: 234
                },
                // nơi nhận dữ liệu trả về từ PHP
                success: function(data) {
                    // console.log(data);
                    $('#result').html(data);
                }
            });
        })
    })
</script>