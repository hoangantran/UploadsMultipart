<!DOCTYPE html>
<html>
<head>
	<title>ADMIN</title>
</head>
<body>
	<form action="themanh.php" method="post" enctype="multipart/form-data">
		<label>Hinh anh</label>
		<input type="file" name="file[]" multiple="multiple">
		<div>Nhap ID: <input type="text" name="id"></div>
		<input type="submit" name="them" value="Them">
	</form>
</body>
</html>