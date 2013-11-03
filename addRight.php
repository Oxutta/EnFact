<?php
require "class.php";
$user = User::getInstance();
if($user->getId()==0){
  $r=$user->getRightAns();
  $t=$user->getTrain();
  setcookie('rightAns',$r+$_POST['right']); 
  setcookie('train',$t+1); 
}
else {
  require "connect_db.php";
  $query = 'UPDATE statistic SET train = train+1 , right_answ=right_answ+'.$_POST['right'].' WHERE id = "'.$_COOKIE['id'].'"';
  $result=mysql_query($query);
}
?>