<?
require "connect_db.php";
$query = 'SELECT *
          FROM lessons WHERE id_l="'.$_GET['lesson'].'"';
$test = mysql_query($query);
$l = mysql_fetch_array($test);
?>
<script type="text/javascript" src="js/addWord.js"></script>
<h2>Тест по теме "<?=$l['name_l']?>"</h2>
<p>Выберите правильный вариант ответа.</p>

<div id="test">
<form action="testResult.html" method="post">
<input type="hidden" value="<?=$_GET['lesson']?>" name="lesson" />
<?$test=$l['test'];
$t=json_decode($test,true);
for($i=0;$i<count($t);$i++) {
  echo '<p class="question eng">'.($i+1).". ".$t[$i]["question"].'</p>';
  ?>
  <input type="radio" name="answer<?=$i?>" value="1" /> <?=$t[$i]["answer"][0]?><br />
  <input type="radio" name="answer<?=$i?>" value="2" /> <?=$t[$i]["answer"][1]?><br />
  <input type="radio" name="answer<?=$i?>" value="3" /> <?=$t[$i]["answer"][2]?>
<?}
?>
<p style="margin-top:15px;"><input type="submit" style="border:0;cursor:pointer;" class="link-style2" value="Ответить" /></p>
</form>
</div>