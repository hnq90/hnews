<form action='index.php?admin=users&do=add' method='post'>
<p>Username: <input type="text" name="username"></p>
<p>Mật khẩu: <input type="password" name="password"></p>
<p>Tên: <input type="text" name="fullname"></p>
<p>Email: <input type="text" name="email"></p>
<p>SĐT: <input type="text" name="phone"></p>
<p>Nhóm: <select name="group">
	<option value="1">Thành viên thường</option>
	<option value="3">Admin</option>
</select>
</p>
<p>Active: <input type="checkbox" name="status"></p>
<p><input type="submit" value="Thêm thành viên"></p>
</form>