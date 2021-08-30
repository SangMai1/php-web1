<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    header {
      margin: 0 50px;
    }
    .imgbig {
      width: 100%;
      height: 100px;
    }
    .hienthi {
      width: 100%;
      height: 100px;
      background: #78bfde;
      padding-top: 25px;
    }
    .imgsmall {
      width: 50px;
      height: 50px;
    }
    .pen {
      padding: 10px 60px;
      font-size: 20px;
    }
  </style>
</head>
<body>
  <header>
    <?php if (isset($_SESSION["email"])) { ?>
      <div class="hienthi">
        <img class="rounded float-left imgsmall" src="<?php echo '/' . $_SESSION['avatar'] ?>" />
        <p class="pen"><?php echo $_SESSION['username'];?></p>
      </div>
    <?php } else{ ?>
      <img class="imgbig" src="/uploads/banner.jpg" />
    <?php } ?>
  </header>
</body>
</html>