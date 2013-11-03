<?
require "connect_db.php";
$query = "SELECT *
          FROM lessons";
$lessons = mysql_query($query);
$user = User::getInstance();
$cur_les=$user->getLessons()+1;
if($cur_les==0)$cur_les=1;
?>

<?
for($i = 0; $i < mysql_num_rows($lessons)/2; $i++) {
  $l = mysql_fetch_array($lessons);
  ?>
    <div class="two-columns">
		<div class="col1 <?if(($i*2+1)>$cur_les){echo"disabledLes";}?>">
			<h3><?=($i*2+1)?>. <?=$l["name_l"]?></h3>
			<p><?=$l["short_desc_l"]?></p>
			<p class="learn"><a href="
      <?if($user->getId()==0 && $cur_les>1)echo'" title="Для незарегистрированных пользователей доступен только первый урок"';
      else if(($i+1)<=$cur_les){echo'les.html?id='.$l["id_l"].'"';}else echo'" title="Не пройдены предыдущие уроки"';?> 
      class="link-style2">Изучить</a></p>
		</div>
  <?
  $l = mysql_fetch_array($lessons);
  if($l!=NULL) {
  ?>
		<div class="col2 <?if(($i*2+2)>$cur_les){echo"disabledLes";}?>">
			<h3><?=($i*2+2)?>. <?=$l["name_l"]?></h3>
			<p><?=$l["short_desc_l"]?></p>
			<p class="learn"><a href="
      <?if($user->getId()==0 && $cur_les>1)echo'" title="Для незарегистрированных пользователей доступен только первый урок"';
      else if(($i+2)<=$cur_les){echo'les.html?id='.$l["id_l"].'"';}else echo'" title="Не пройдены предыдущие уроки"';?> 
      class="link-style2">Изучить</a></p>
		</div>
    </div>
  <?
  }
}
?>
