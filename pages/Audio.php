<?
$id=$_GET['id'];
require "connect_db.php";
$query = "SELECT *
          FROM Audio
		  WHERE id_audio='$id'";
			
$lessons = mysql_query($query);
$l = mysql_fetch_array($lessons);
?>
<script>function showTooltip(divID,myB)
{
var myDiv = document.getElementById(divID);
var myButton = document.getElementById(myB);
if(myDiv.style.display == 'none'){
myDiv.style.display = 'block';
myButton.value = 'Скрыть текст';
}else{
myDiv.style.display = 'none';
myButton.value = 'Показать текст';
}
return false;
}
</script>
<script type="text/javascript" src="js/addWord.js"></script>
<h3><?=$l['name']?></h3>
<script type="text/javascript" src="player/swfobject.js"></script>

<object><param name="movie" value=<?=$l['ref']?>></param><embed src=<?=$l['ref']?> type="application/x-shockwave-flash" width="100%"></embed></object> 

<div id="tooltip" style='display: block;width: 100%; height: 100%; overflow: auto;color:black;font-weight:normal;'>
<?=$l['text']?>
</div>

<div style="width:1000px;position:relative;">
<input type="button" onclick='showTooltip("tooltip","myButton")' id ="myButton" value="Скрыть текст" style="border:0;cursor:pointer;" class="link-style2" />
</div>