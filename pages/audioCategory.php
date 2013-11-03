<?
$id_cat=$_GET['id'];
require "connect_db.php";
$query = "SELECT *
          FROM Audio
		  WHERE id_category='$id_cat' ORDER BY name";
			
$lessons = mysql_query($query);
?>
<h3>Выберите аудио</h3>
<ul  class="category">
<?
for($i = 0; $i < mysql_num_rows($lessons); $i++) {
  $l = mysql_fetch_array($lessons);
  ?>
  
	<li><a href="Audio.html?id=<?=$l["id_audio"]?>"><?=$l["name"]?></a></li>
  
  <?}
?>
</ul>