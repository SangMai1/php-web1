<form action="/customer/thuchienluu" method="post">
  <input type="hidden" name="no" value="<?= $result[0]["no"] ?? "" ?>">
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
    <input type="text" class="form-control" name="phone" value="<?= $result[0]["phone"] ?? "" ?>">
  </div>
  <div class="form-group">
    <label>Date of birth</label>
    <input type="date" class="form-control" name="dateofbirth" value="<?= $result[0]["dateofbirth"] ?? "" ?>">
  </div>
  <button class="btn btn-primary" type="submit">Save</button>
</form>