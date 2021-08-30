<form method="post" action="/user/thuchiendangnhap">
  <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" class="form-control" placeholder="Enter email" value="<?php if(isset($_COOKIE['us'])) echo $_COOKIE['us'] ?? "" ?>" >
      </div>
      <div class="form-group">
        <label>PassWord</label>
        <input type="password" name="password" class="form-control" placeholder="Enter password" value="<?php if(isset($_COOKIE['pa'])) echo $_COOKIE['pa'] ?? "" ?>">
      </div>
      <div class="form-group form-check">
        <label class="form-check-label">
          <input type="checkbox" name="checkRemember" value="<?php if(isset($_COOKIE['us'])) echo "checked" ?>"> Nhớ mật khẩu 
        </label>
      </div>
      <input type="submit" value="Submit" class="btn btn-primary">

      <p><?=$messageError??"" ?></p>
  </div>
</form>