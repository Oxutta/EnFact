<?php
require "class.php";
$user = User::getInstance();
if($user->getId()==0){
    $voc=$user->getVoc();
    for($i=0;$i<$user->getSizeVoc();$i++) 
      if($voc[$i][0]==$_POST['word']) {$voc[$i][0]=$voc[$user->getSizeVoc()-1][0];$voc[$i][1]=$voc[$user->getSizeVoc()-1][1];break;}
    setcookie('voc',serialize($voc));
    setcookie('sizeVoc',$_COOKIE['sizeVoc']-1); 
    echo"Слово '".$_POST['word']."' успешно удалено из Вашего словаря";
}
else {
  require "connect_db.php";
  $user = User::getInstance();
  $query = 'DELETE FROM words WHERE id_user="'.$user->getId().'" and word="'.$_POST['word'].'"';
  if(mysql_query($query)==1) echo"Слово '".$_POST['word']."' успешно удалено из Вашего словаря";
  else echo"При удалении слова произошла ошибка";
}
?>