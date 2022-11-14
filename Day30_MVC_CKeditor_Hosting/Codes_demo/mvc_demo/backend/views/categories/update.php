<!--views/categories/update.php-->
<h2>Form sửa danh mục</h2>
<form action="" method="post" enctype="multipart/form-data">
    Nhập tên
    <input type="text" name="name" class="form-control"
    value="<?php echo $category['name']?>"
    />
    <br/>
    Ảnh đại diện
    <input type="file" name="avatar" class="form-control" />
    <img height="60px"
         src="uploads/<?php echo $category['avatar']?>"
    <br/>
    <input type="submit" name="submit" value="Lưu"
           class="btn btn-primary" />
</form>

