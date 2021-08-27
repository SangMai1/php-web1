<a class="btn btn-primary" href="/customer/luu">Thêm customer</a>
<table class="table tablefa-border">
        <tr>
            <td>Tên</td>
            <td>ACTION</td>
        </tr>
        <?php foreach($result as $resultItem){ ?>
        <tr>
            <td><?= $resultItem["fullname"] ?></td>
            <td>
                <a href="/customer/luu?no=<?= $resultItem["no"] ?>" class="btn btn-info">edit</a>|
                <a href="/customer/xoa?no=<?= $resultItem["no"] ?>" class="btn btn-danger">Delete</a>
            </td>
        </tr>
        <?php } ?>
</table>