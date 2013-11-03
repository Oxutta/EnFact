<?
$id=$_GET['id'];
require "connect_db.php";
$query = "SELECT *
          FROM video
		  WHERE id_video='$id'";
			
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
<table border width="100%" height="50%" id="table_video">
<tr height="500px">
<td width="50%" >
<object height="100%" width="100%">
<embed type="application/x-shockwave-flash" src="http://s.ytimg.com/yts/swfbin/watch_as3_hh-vfl10OMD-.swf" id="movie_player" flashvars="<?=$l['ref']?>" allowscriptaccess="always" allowfullscreen="true" height="100%" width="100%">
</object>
</td>
<td  height="500px">
<div id="tooltip" style='display: block;width: 100%; height: 100%; overflow: auto;padding:5px 10px 5px 5px;'>
<?=$l['text']?>
</div>


</td>
</tr>
</table>
<div style="width:1000px;position:relative;">
<input type="button" onclick='showTooltip("tooltip","myButton")' id ="myButton" value="Скрыть текст" style="border:0;cursor:pointer;position:absolute;right:0;top:0;" class="link-style2" />
</div>