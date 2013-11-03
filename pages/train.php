<?
$user = User::getInstance();
$kolWords=$user->getSizeVoc();
?>
<div class="two-columns">

		<div class="col1">
			<h3>Слово &rarr; перевод</h3>
			<p>Необходимо выбрать правильный вариант перевода из 4</p>
			<p class="learn">
      <? if($kolWords<5){?>
        <a href="#" class="link-style3" title="Должно быть более 5 слов">Недостаточно слов в словаре</a>
      <?}else {?>
        <a href="wordtotrans.html" class="link-style2">Играть</a>
      <?}?>
      </p>
		</div>
    
    <div class="col2">
			<h3>Перевод &rarr; слово</h3>
			<p>Необходимо выбрать правильный вариант перевода из 4</p>
			<p class="learn">
      <? if($kolWords<5){?>
        <a href="#" class="link-style3" title="Должно быть более 5 слов">Недостаточно слов в словаре</a>
      <?}else {?>
        <a href="transtoword.html" class="link-style2">Играть</a>
      <?}?>
      </p>
		</div>
</div>
<div class="two-columns">

		<div class="col1">
			<h3>Перевести на английский</h3>
			<p>Требуется напечатать перевод слова</p>
			<p class="learn">
      <? if($kolWords<5){?>
        <a href="#" class="link-style3" title="Должно быть более 5 слов">Недостаточно слов в словаре</a>
      <?}else {?>
        <a href="engtrans.html" class="link-style2">Играть</a>
      <?}?>
      </p>
		</div>
    
    <div class="col2">
			<h3>Перевести на русский</h3>
			<p>Требуется напечатать перевод слова</p>
			<p class="learn">
      <? if($kolWords<5){?>
        <a href="#" class="link-style3" title="Должно быть более 5 слов">Недостаточно слов в словаре</a>
      <?}else {?>
        <a href="rustrans.html" class="link-style2">Играть</a>
      <?}?>
      </p>
		</div>
</div>