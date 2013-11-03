<div id="banner">
    
	<div class="avtpanel">
    <form action="testreg.php" method="post">
      <p>Логин<br /><input type="text" name="login" required class="input" /></p>
      <?if(!isset($_GET['forgot'])) {?>
        <p>Пароль<br /><input type="password" name="password" required class="input" /></p>
        <p><input type="submit" value="Вход" style="padding:5px 10px;" /></p> 
    </form>
    <p><a href="registration.html">Регистрация</a></p>
    <?}
    else {?>
      <p><a href="sendPassw.php">Отправить пароль</a></p>
      <?if($_GET['forgot']=='nologin') {?>
        <p class="err"><img src="images/attention.gif" alt="Внимание" align="left" />Логин не зарегистрирован</p>
      <?}?>
      <p><a href="registration.html">Регистрация</a></p>
    <?}?>
    <?if(isset($_GET['login'])){?>
      <p class="err"><img src="images/attention.gif" alt="Внимание" align="left" />Вы ввели неверный логин/пароль</p>
      <p><a href="enter.html?forgot=1">Отправить пароль на email</a></p>
    <?}
    if(isset($_GET['activate'])){?>
      <p class="err"><img src="images/attention.gif" alt="Внимание" align="left" />Учетная запись не активирована</p>
    <?}
    if($_GET['send']=='success'){?>
      <p class="err"><img src="images/attention.gif" alt="Внимание" align="left" />На email, указанный при регистрации, отправлено письмо с Вашим паролем.</p>
    <?}
    if($_GET['send']=='nosuccess'){?>
      <p class="err"><img src="images/attention.gif" alt="Внимание" align="left" />Ошибка при отправке письма.</p>
    <?}?>
  </div>
  
</div>
