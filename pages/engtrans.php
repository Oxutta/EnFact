<?$user = User::getInstance();$voc=$user->getVoc();$sizeVoc=$user->getSizeVoc();?><script type="text/javascript" src="js/translation.js"></script><script type="text/javascript">  var how=0;  var voc=new Array();  <?      for($i = 0; $i < $sizeVoc; $i++) {        echo 'voc['.$i.']=new Array();';        echo 'voc['.$i.'][0]="'.$voc[$i][0].'";';        echo 'voc['.$i.'][1]="'.$voc[$i][1].'";';      }  ?></script><div id="game"><h3>Напишите перевод слова (<span id="cur"></span> / 5)</h3><div class="two-columns">		<div class="colleft">			<div id="word2"></div>      <input type="text" id="trans21" size="15" /><br />      <button id="but">Ок</button>      <span id="rw" style="margin-left:10px;"></span><br />      <div id="rightansw"></div>    </div>        <div class="colright">      <table><tr><td id="image"></td><td style="padding-left:20px"><img src="images/nextWord.png" alt="Следующее слово" id="nextWord" /></td></tr></table>		</div></div></div>