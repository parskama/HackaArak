<!DOCTYPE HTML>
<html>
<head>
<title>صفحه ورود مدیریت</title>
<meta charset="UTF-8" />
<link rel="stylesheet" type="text/css" href="css/loginStyle.css">
<script language="javascript" src="js/jquery-2.1.1.js"></script>
<script language="javascript" src="js/ajax.js"></script>

</head>

<body>

<form action="Opration.php" method="post" class="box login">
	<input type="hidden" name="command" value="loginadmin" />
	<fieldset class="boxBody">
	  <label>نام کاربری</label>
	  <input type="text" tabindex="1" name="username" placeholder="admin" required>
	  <label>کلمه عبور</label>
	  <input type="password" tabindex="2" name="password" placeholder="admin" required>
	</fieldset>
	<footer>
	  <input type="submit" class="btnLogin" tabindex="4" value="ورود" id="btnloginadmin">
	</footer>
</form>
<footer id="main">
  <a href="http://www.hackaglobal.ir">{HackaArak.ir}</a>
</footer>
</body>
</html>
