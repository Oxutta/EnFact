<!DOCTYPE html>

<html lang="ru" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Обучение иностранным языкам</title>
    <style type="text/css"></style>
    <link rel="stylesheet" type="text/css" href="StyleSheet.css"/>
</head>
<body>
<h2><center>Регистрация на сайте</center></h2>
<div class="RegistrationForm">
    <form action="save_user.php" method="post">
	<p>
		<h3 align="center">Ваш логин:<br/></h3>
		<center><input name="login" type="text" size="15" maxlength="15" class="input" /></center>
    </p>
	<p>
		<h3 align="center">Ваш пароль:<br/></h3>
		<center><input name="password" type="password" size="15" maxlength="15" class="input"/></center>
    </p>
	<p>
		<center><input type="submit" name="submit" value="Зарегистрироваться"/></center>
	</p>
	</form>
</div>
</body>
</html>