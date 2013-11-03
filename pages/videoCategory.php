<?
$id_cat=$_GET['id'];
require "connect_db.php";
$query = "SELECT *
          FROM video
		  WHERE id_category='$id_cat' ORDER BY name";	
$lessons = mysql_query($query);
?>
<h3>Выберите видео</h3>
<ul class="category">
<?
for($i = 0; $i < mysql_num_rows($lessons); $i++) {
  $l = mysql_fetch_array($lessons);
  ?>
  
	<li><a href="video.html?id=<?=$l["id_video"]?>"><?=$l["name"]?></a></li>
  
  <?}
?>
</ul>