<?require "class.php";$user = User::getInstance();if($user->getId()==0){
if($user->getSizeFav()!=0) {
$fav=$user->getFav();
for($i=0;$i<$user->getSizeFav();$i++)

 if($fav[$i][0]==$_POST['idL']) {echo"Урок уже есть в избранном";die;}

$fav[$_COOKIE['sizeFav']][0]=$_POST['idL'];

$fav[$_COOKIE['sizeFav']][0]=$_POST['name'];

setcookie('fav',serialize($fav));

setcookie('sizeFav',$_COOKIE['sizeFav']+1);

 echo"Урок добавлен в избранное";
}
else {

setcookie('sizeFav',1);

 $fav[0][0]=$_POST['idL'];

$fav[0][1]=$_POST['name'];

setcookie('fav',serialize($fav));

echo"Урок добавлен в избранное";
}}else {
require "connect_db.php";
$user = User::getInstance();
$query = 'SELECT * FROM favorites WHERE id_user="'.$user->getId().'" and id_les="'.$_POST['idL'].'"';
$result=mysql_query($query);
$myrow = mysql_fetch_array($result);
if(!empty($myrow['id_user'])) echo"Урок уже есть в избранном";
else {

$query = 'INSERT INTO favorites (id_user,id_les,name) VALUES("'.$user->getId().'","'.$_POST['idL'].'","'.$_POST['name'].'")';

if(mysql_query($query)==1) echo"Урок добавлен в избранное";

else echo"При добавлении слова произошла ошибка";
}}?>