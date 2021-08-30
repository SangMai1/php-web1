<a class="btn btn-primary" href="/user/luu">Thêm user</a>
<table class="table tablefa-border">
        <tr>
            <td>Avatar</td>
            <td>Tên</td>
            <td>ACTION</td>
        </tr>
        <?php foreach($result as $resultItem){ ?>
        <tr>
            <td><img src="<?= '/' . $resultItem['avatar'] ?>"  style="width:50px; height: 50px" /></td>
            <td><?= $resultItem["username"] ?></td>
            <td>
                <a href="/user/luu?no=<?= $resultItem["no"] ?>" class="btn btn-info">edit</a>|
                <a href="/user/xoa?no=<?= $resultItem["no"] ?>" class="btn btn-danger">Delete</a>
            </td>
        </tr>
        <?php } ?>
</table>