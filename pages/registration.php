<script type="text/javascript">
function validEmail() {
    $(".err").text("");
    var email=$("#email").val();
    var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
    if(!pattern.test(email)) {
        $(".err").html("<img src='images/attention.gif' alt='Внимание' align='left' />Неправильный формат e-mail");
        return false;
    }
    return true;
}
</script>
<div id="banner">	
    <div class="avtpanel">
        <?if($_GET['reg']=='success'){?>
        <p>На e-mail, указанный при регистрации, отправлено письмо для подтверждения регистрации. Для активации учетной записи
        перейдите по ссылке, указанной в письме.</p>
        <?}
        else {?>
        <p>Введите:</p>
        <form action="save_user.php" method="post" onsubmit="return validEmail()">
            <p>Логин<br /><input type="text" name="login" required class="input" /></p>
            <p>Пароль<br /><input type="password" name="password" required class="input" /></p>
            <p>e-mail<br /><input type="text" name="email" id="email" required class="input" /></p>
            <p><input type="submit" value="Зарегистрироваться" style="padding:5px 10px;" /></p>
        </form>
        <p class="err">
        <?if($_GET['reg']=='loginreg'){?>
        <img src="images/attention.gif" alt="Внимание" align="left" />Извините, введённый вами логин уже зарегистрирован. Введите другой.
        <?}
        else if($_GET['reg']=='nosuccess'){?>
        <img src="images/attention.gif" alt="Внимание" align="left" />Ошибка регистрации
        <?}
        else if($_GET['reg']=='emailreg'){?>
        <img src="images/attention.gif" alt="Внимание" align="left" />Введённый вами email уже зарегистрирован. Введите другой.
        <?}?>
        </p>
        <?}?>
    </div>
</div>