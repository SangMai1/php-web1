<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
      .main {
          width: 100%;
          height: auto;
          display: flex;
          padding: 0 50px;
      }
      .left {
          background: #5f9399;
          height: auto;
          width: 50%;
      }
      .right {
          background: #bab886;
          height: auto;
          width: 50%;
      }
      ul {
        list-style: none;
      }

      .login {
          font-size: 30px;
          padding: 110px;
      }

      .one {
          font-size: 20px;
          padding: 10px 40px;
      }

      .one a {
          color: #121211;
      }
      .one a:hover {
          text-decoration: none;
      }
  </style>
</head>
<body>
    <?php
        include "header.php";
    ?>
  <div class="main">
    <div class="left">
        <ul>
            <?php if (isset($_SESSION["email"])) {?>
                <li class="one"><a href="/customer/danhsach">Danh sach customer </a> </li>
                <li class="one"><a href="/user/danhsach">Danh sach user </a></li>
                <li class="one"><a id="RefreshPage" href="/user/dangxuat">Đăng xuất</a> </li>
            <?php } else{ ?>
                <li class="login">Đăng nhập </li>
            <?php } ?>
        </ul>
    </div>
    <div class="right">
        <?php $c = new  $controllerName();
                    $c->$actionName(); ?>
    </div>
  </div>  
  <?php
        include "footer.php";
  ?>
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script>
      $('#RefreshPage').click(function() { 
    	      window.location.reload();
 }); -->
  </script>
</body>
</html>