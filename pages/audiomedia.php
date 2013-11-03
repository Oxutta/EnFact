<?
require "connect_db.php";
$query = "SELECT *
          FROM audio_category";
			
$lessons = mysql_query($query);
?>
<h3>Выберите тему аудио</h3>
<ul  class="category">
<?
for($i = 0; $i < mysql_num_rows($lessons); $i++) {
  $l = mysql_fetch_array($lessons);
  ?>
  
	<li><a href="audioCategory.html?id=<?=$l["id_category"]?>"><?=$l["name"]?></a></li>
  
  <?}
?>
</ul>