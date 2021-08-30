		<form id="myForm" action="/user/sendmail" method="post">
      <h3>Chọn khách hàng gửi khuyến mãi</h3>
      <table class="table tablefa-border">
        <tr>
            <td></td>
            <td>Ten</td>
        </tr>
        <?php foreach($result as $resultItem){ ?>
        <tr>
            <td><input type="checkbox" name="sendall[]" value="<?= $resultItem['maiaddres'] ?>"></td>
            <td><?= $resultItem['fullname'] ?></td>
        </tr>
        <?php } ?>
      </table>
			<h2>Send an Email</h2>
      
      <div class="form-group">
        <label>Tiêu đề</label>
        <input id="subject" class="form-control" type="text" name="subject" placeholder=" Enter Subject">
      </div>

      <div class="form-group">
        <label>Nội dung</label>
        <textarea id="body" rows="5" class="form-control" name="body" placeholder="Type Message"></textarea>
      </div>

			<button type="submit" name="submit">Submit</button>
		</form>
