<?
  $search = $_POST['image'];
  $json = file_get_contents('http://ajax.googleapis.com/ajax/services/search/images?v=1.0&rsz=large&q='.urlencode($search).'&start=0');
  $data = json_decode($json);
  $i=0;
  while(substr($data->responseData->results[$i]->url,-3,3)!="jpg" && substr($data->responseData->results[$i]->url,-3,3)!="bmp")$i++;
  echo $data->responseData->results[$i]->url;
?>