<form action='index.php?admin=users&do=save' method='post'>
<input type="hidden" name="userid" value='<?php echo $_GET['userid']; ?>'>
<p>Username: <input type="text" name="username2" value="<?php echo $username; ?>"></p>
<p>Mật khẩu mới (nếu có): <input type="password" name="newpassword"></p>
<p>Tên: <input type="text" name="fullname" value="<?php echo $name; ?>"></p>
<p>Email: <input type="text" name="email" value="<?php echo $email; ?>"></p>
<p>SĐT: <input type="text" name="phone" value="<?php echo $phone; ?>"></p>
<p>Nhóm: <select name="group">
	<?php
	if($group == 1) {
		echo "<option value='1' selected>Thành viên thường</option>
	<option value='3'>Admin</option>";	
	} else {
		echo "<option value='1'>Thành viên thường</option>
	<option value='3' selected>Admin</option>";	
	}
	?>
</select>
</p>
<?php 
	if($status == 1) {
		echo "<p>Active: <input type='checkbox' name='status' checked></p>";
	} else {
		echo "<p>Active: <input type='checkbox' name='status'></p>";
	}
?>
<p><input type="submit" value="Sửa thành viên"></p>
</form>