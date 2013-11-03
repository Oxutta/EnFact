<?
require "connect_db.php";
$query = 'SELECT *
          FROM lessons
          WHERE id_l="'.$_GET['id'].'"';
			
$lessons = mysql_query($query);
$l = mysql_fetch_array($lessons);
?>
<script type="text/javascript" src="js/addWord.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
  $("#fav").click(function(){
    $.post("addFavs.php",
      {
        idL:<?=$_GET['id'];?>,
        name:'<?=$l["name_l"];?>'
      },
      message);
  });
});
  function message(data) {
    $("#message").text(data);
    $("#message").fadeIn(300).delay(1500).fadeOut(400);
  }
</script>
<div class="material">
  <table id="h"><tr><td width="95%"><h2><?=$l["name_l"]?></h2></td>
  <td><img src="images/favorites.png" alt="Добавить в избранное" title="Добавить в избранное" id="fav" /></td></tr></table>
  <?=$l['material_l']?>
</div>
<p><a href="test.html?lesson=<?=$_GET['id']?>" class="link-style2">Пройти тест по изученному материалу</a></p>