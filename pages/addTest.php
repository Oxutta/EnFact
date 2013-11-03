<?
$json_data = array (0=>array('question'=>"answer sdfhskfjh","answer"=>array(0=>"otv1",1=>"otv2"),1),1=>array('question'=>"answer sdfhskfjh","answer"=>array(0=>"otv1",1=>"otv2"),2));
$str=json_encode($json_data);

$mas=json_decode($str,true);
//var_dump($mas);
echo $str;
?>