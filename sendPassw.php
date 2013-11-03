<?
  $login=$_POST['login'];
  $login = stripslashes($login);
  include ("connect_db.php");
  $result = mysql_query("SELECT password,email FROM users WHERE login='$login'");
  $myrow = mysql_fetch_array($result);
  if (empty($myrow['password'])) 
      header("Location:enter.html?forgot=nologin");
      
  $tema="Восстановление пароля на EnFact.ru";
  $letter='Здравствуйте!<br />Ваш пароль на сайте EnFact.ru '.$myrow['password'];
        
  if(mail($myrow['email'],$tema,$letter)) header("Location:enter.html?send=success");
  else header("Location:enter.html?send=nosuccess");
  
?>