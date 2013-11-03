<?
$user = User::getInstance();
$voc=$user->getVoc();
$sizeVoc=$user->getSizeVoc();

$fav=$user->getFav();
$sizeFav=$user->getSizeFav();

$train=$user->getTrain();
$rightAns=$user->getRightAns();
$lessons=$user->getLessons();
?>
<script type="text/javascript">
  $(document).ready(function() {
  $('.delete').click(function(){
    w=$(this).attr("id");
    $.post(
      "deleteWord.php",
      {
        word:w
      },
      message
    );
  });
  $('.deleteF').click(function(){
    w=$(this).attr("id");
    $.post(
      "deleteFav.php",
      {
        les:w
      },
      message
    );
  });
  $("#message").hide();
});
  function message(data) {
    //$("#message").text(data);
    //$("#message").fadeIn(300).delay(1500).fadeOut(400);
    window.location.reload();	
  } 
</script>
<div id="message"></div>
<?if($user->getId()==0){?>
  <h4>Вы не зарегистрированы на сайте, поэтому Ваш словарь, статистика и избранное удалится после окончания работы с сайтом. 
  Чтобы Ваши данные сохранялись, пожалуйста, <a href="registration.html">зарегистрируйтесь</a>.</h4>
<?}?>
<div class="two-columns">
<div class="col1" style="max-height:600px;overflow: auto;">
  <h3>Мой словарь</h3>
  <?if($sizeVoc==0) {?>
    <p>Словарь пуст</p>
  <?}
  else {?>
    <table id="words">
    <thead><tr><td></td><td>Слово</td><td>Перевод</td><td></td></tr></thead>
      <?
      for($i = 0; $i < $sizeVoc; $i++) {
        ?>
          <tr>
            <td width="25px"> <?echo ($i+1).".</td><td width='200px'>".$voc[$i][0];?> </td>
            <td  width='200px'><?=$voc[$i][1];?></td>
            <td><img src="images/delete.gif" alt="удалить из словаря" title="Удалить из словаря" class="delete" id="<?=$voc[$i][0]?>" /></td>
          </tr>
        <?
      }
      ?>
    </table>
  <?}?>
</div>
<div style="float:right;">
<div class="col2" style="float:none;">
  <h3>Статистика обучения</h3>
  <table id="stat">
          <tr>
            <td  width='430px'>Изучено уроков</td>
            <td><?=$lessons?></td>
          </tr>
          <tr>
            <td>Пройдено тренировок</td>
            <td><?=$train?></td>
          </tr>
          <tr>
            <td>Количество баллов</td>
            <td><?=$rightAns?></td>
          </tr>
    </table>
</div>
<div class="col2" style="margin-top:30px;float:none;">
  <h3>Избранное</h3>
  <?if($sizeFav==0) {?>
    <p>Избранного нет</p>
  <?}?>
  <table id="stat">
      <?
      for($i = 0; $i < $sizeFav; $i++) {
        ?>
          <tr>
            <td width="25px"> <?echo ($i+1).".</td><td width='90%'><a href='les.html?id=".$fav[$i][0]."'>".$fav[$i][1];?> </a></td>
            <td><img src="images/delete.gif" alt="удалить из избранного" title="Удалить из избранного" class="deleteF" id="<?=$fav[$i][0]?>" /></td>
          </tr>
        <?
      }
      ?>
    </table>
</div>
</div>
</div>