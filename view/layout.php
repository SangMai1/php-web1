<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <table>
            <tr>
                <td colspan="2">Coo len</td>
            </tr>
            <tr>
                <td>
                    <ul>
                        
                            <li><a href="/customer/danhsach">Danh sach nguoi dung </a> </li>
                            <li><a href="/chucnang/danhsach">Danh sach chức năng </a></li>
                            <li>Danh sach nhóm người dùng </li>
                            <li><a href="/nguoidung/hienthidangnhap">đăng xuất</a> </li>
                        
                    </ul>
                </td>
                <td><?php $c = new  $controllerName();
                    $c->$actionName(); ?></td>
            </tr>
            <tr>
                <td>Đây là footter</td>
            </tr>
      </table>
</body>
</html>