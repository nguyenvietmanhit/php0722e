<!--views/categories/create.php-->
<h2>Form thêm mới danh mục</h2>
<form action="" method="post" enctype="multipart/form-data">
    Nhập tên
    <input type="text" name="name" class="form-control" />
    <br/>
    Ảnh đại diện
    <input type="file" name="avatar" class="form-control" />
    <br/>
    Nhập chi tiết danh mục:
    <textarea name="description"></textarea>
    <!--views/categories/create.php-->
    <br>
    <input type="submit" name="submit" value="Lưu"
           class="btn btn-primary" />
</form>