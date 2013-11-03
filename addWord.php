<?
include_once 'Yandex_Translate.php';
$translator = new Yandex_Translate();
require "class.php";
$user = User::getInstance();
if($user->getId()==0){
  if($user->getSizeVoc()!=0) {
    $voc=$user->getVoc();
    for($i=0;$i<$user->getSizeVoc();$i++) 
      if($voc[$i][0]==$_POST['word']) {echo"Слово '".$_POST['word']."' уже есть в Вашем временном словаре";die;}
    $voc[$user->getSizeVoc()][0]=$_POST['word'];
    $voc[$user->getSizeVoc()][1]=$translator->yandexTranslate('en', 'ru', $_POST['word']);
    setcookie('voc',serialize($voc));
    setcookie('sizeVoc',$_COOKIE['sizeVoc']+1); 
    echo"Слово '".$_POST['word']."' успешно добавлено в Ваш временный словарь";
  }
  else {
    $voc[0][0]=$_POST['word'];
    $voc[0][1]=$translator->yandexTranslate('en', 'ru', $_POST['word']);
    $s=serialize($voc);
    setcookie('voc',$s);
    setcookie('sizeVoc',1); 
    echo"Слово '".$_POST['word']."' успешно добавлено в Ваш временный словарь";
  }
}
else {
  require "connect_db.php";
  $user = User::getInstance();
  $query = 'SELECT * FROM words WHERE id_user="'.$user->getId().'" and word="'.$_POST['word'].'"';
  $result=mysql_query($query);
  $myrow = mysql_fetch_array($result);
  if(!empty($myrow['id_user'])) echo"Слово '".$_POST['word']."' уже есть в Вашем словаре";
  else {
    $query = 'INSERT INTO words (id_user,word) VALUES("'.$user->getId().'","'.$_POST['word'].'")';
    if(mysql_query($query)==1) echo"Слово '".$_POST['word']."' успешно добавлено в Ваш словарь";
    else echo"При добавлении слова произошла ошибка";
  }
}
?>