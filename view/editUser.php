<form action="/user/thuchienluu" method="post" enctype="multipart/form-data">
  <input type="hidden" name="no" value="<?= $result[0]["no"] ?? "" ?>">

  <div class="form-group">
    <label>User Name</label>
    <input type="text" class="form-control" name="username" value="<?= $result[0]["username"] ?? "" ?>">
  </div>
  <div class="form-group">
    <label>Full Name</label>
    <input type="text" class="form-control" name="fullname" value="<?= $result[0]["fullname"] ?? "" ?>">
  </div>
  <div class="form-group">
    <label>Email</label>
    <input type="email" class="form-control" name="maiaddres" value="<?= $result[0]["maiaddres"] ?? "" ?>">
  </div>
  <div class="form-group">
    <label>Phone</label>
    <input type="pass" class="form-control" name="password" value="<?= $result[0]["password"] ?? "" ?>">
  </div>
  <div class="form-group">
    <label>Date of birth</label>
    <input type="date" class="form-control" name="dateofbirth" value="<?= $result[0]["dateofbirth"] ?? "" ?>">
  </div>
    <div class="form-group">
    <label class="form-label">Avatar</label>
    <img id="thumbnail" alt="Logo" class="img-thumbnail" style="width:100px; height: 100px" src ="<?= '/' . $result[0]['avatar'] ?>">
    <input type="file" class="form-control" name="avatar" value="<?= $result[0]["avatar"] ?? "" ?>" accept="image/*" onchange="document.getElementById('thumbnail').src = window.URL.createObjectURL(this.files[0])" />
  </div>
  <button class="btn btn-primary" type="submit" name="submit">Save</button>
</form>