<?php
require "class.php";
$user = User::getInstance();
if($user->getId()==0){
    $fav=$user->getFav();
    for($i=0;$i<$user->getSizeFav();$i++) 
      if($fav[$i][0]==$_POST['les']) {$fav[$i][0]=$fav[$user->getSizeFav()-1][0];break;}
    setcookie('fav',serialize($fav));
    setcookie('sizeFav',$user->getSizeFav()-1); 
    echo"Урок удален из избранного";
}
else {
  require "connect_db.php";
  $user = User::getInstance();
  $query = 'DELETE FROM favorites WHERE id_user="'.$user->getId().'" and id_les="'.$_POST['les'].'"';
  if(mysql_query($query)==1) echo"Урок удален из избранного";
  else echo"При удалении слова произошла ошибка";
}
?>