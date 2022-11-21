<!--views/categories/index.php-->
<h2>Danh sách danh mục</h2>
<a href="index.php?controller=category&action=create"
class="btn btn-primary">
    Thêm mới
</a>
<table class="table table-hover">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Avatar</th>
        <th></th>
    </tr>
    <?php foreach ($categories AS $category): ?>
        <tr>
            <td><?php echo $category['id']; ?></td>
            <td><?php echo $category['name']; ?></td>
            <td>
         <img height="60px" src="uploads/<?php echo $category['avatar']?>">
            </td>
            <td>
                <a href="index.php?controller=category&action=update&id=<?php echo $category['id']?>">Sửa</a>
                <a href="index.php?controller=category&action=delete&id=<?php echo $category['id']?>"
                   onclick="return confirm('Delete?')">Xóa</a>
            </td>
        </tr>
    <?php endforeach;?>
</table>
