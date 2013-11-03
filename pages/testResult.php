<?
require "connect_db.php";
$query = 'SELECT *
          FROM lessons WHERE id_l="'.$_POST['lesson'].'"';
$test = mysql_query($query);
$l = mysql_fetch_array($test);

$test=$l['test'];
$t=json_decode($test,true);
$balls=0;?>
<h2>Результаты теста по теме "<?=$l['name_l']?>"</h2>
<?
for($i=0;$i<count($t);$i++) {
  if($_POST["answer{$i}"]==$t[$i]["right"]){
    $balls++;
    echo '<p class="right question" style="font-weight:bold;">Вопрос '.($i+1).". верный ответ<p>";
  }
  else echo '<p class="wrong question" style="font-weight:bold;">Вопрос '.($i+1).". неверный ответ</p>";
}
?>
<h3>Вы набрали <?=$balls?> баллов из 5!</h3>
<?
if($balls>=3){
  $user = User::getInstance();
  $user->addBalls($balls);
  $user->addLesson();
?>
  <p class="congr">Поздравляем! Урок пройден. Теперь Вы можете перейти к изучению следующего урока.</p>
  <p><a href="lessons.html" class="link-style2">Список уроков</a></p>
<?}
else {?>
  <p class="congr">К сожалению, тест не пройден. Не огорчайтесь, у Вас все получится!</p>
  <p><a href="les.html?id=<?=$_POST['lesson']?>" class="link-style2">Изучить урок еще раз</a></p>
<?}
?>
