<?
$user = User::getInstance();
$voc=$user->getVoc();
$sizeVoc=$user->getSizeVoc();
?>
<script type="text/javascript" src="js/wordtrans.js"></script>
<script type="text/javascript">
  var how=0;
  var voc=new Array();
  var mesh=new Array();
  <?
      for($i = 0; $i < $sizeVoc; $i++) {
        echo 'voc['.$i.']=new Array();';
        echo 'voc['.$i.'][0]="'.$voc[$i][0].'";';
        echo 'voc['.$i.'][1]="'.$voc[$i][1].'";';
        echo 'mesh['.$i.']=voc['.$i.'][0];';
      }
  ?>
</script>

<div id="game">
<h3>Выберите перевод для слова (<span id="cur"></span> / 5)</h3>
  <table id="wtotrans" cellspacing="10px"> 
    <tr><td id="word"></td> 
        <td id="trans1" class="trans"></td>
        <td rowspan="5" id="image"></td>
        <td rowspan="5"><img src="images/nextWord.png" alt="Следующее слово" id="nextWord" /></td>
    </tr>
    <tr><td id="rw"></td> 
        <td id="trans2" class="trans"></td>
    </tr>
    <tr><td></td> 
        <td id="trans3" class="trans"></td>
    </tr>
    <tr><td></td> 
        <td id="trans4" class="trans"></td>
    </tr>
    <tr><td></td> 
        <td id="dknow" class="trans">не знаю</td>
    </tr>
  </table>
</div>