<?require "class.php";?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta name="google-site-verification" content="W_7QRZnhP_4fM0ltEQtYVRkaX8uhZEHRH-UBLeduye4" />
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
  <title>EnFact - английский - это просто!</title>
  <link href="style.css" rel="stylesheet" type="text/css" media="screen" />
  <script type="text/javascript" src="js/jquery-1.6.2.min.js"></script>
  <script type="text/javascript" src="js/jquery.cross-slide.js"></script>
  <script type="text/javascript" src="js/script.js"></script>
  <script type="text/javascript">
  $(document).ready(function () {   
    $('#nav li').hover(
        function () {
            $('ul', this).slideDown(100);  
        },
        function () {
            $('ul', this).slideUp(100);
        }
    );  
});
	</script>
</head>
<body>
<div id="wrapper">
	<div id="header">
		<div id="logo">
			<a href="main.html"><h1>EnFact</h1></a>
		</div>
	</div>
  <?$user = User::getInstance();?>
  <div style="margin-bottom:15px;">
		<ul id="nav">
      <li class="first">&nbsp;</li>
			<li <?if($_GET['page']=='lessons' || $_GET['page']=='les') echo'class="current_page_item "';?>><a href="lessons.html">Уроки</a></li>
			<li <?if($_GET['page']=='train' || $_GET['page']=='wordtotrans' || $_GET['page']=='transtoword' || $_GET['page']=='engtrans' || $_GET['page']=='rustrans') echo'class="current_page_item "';?>><a href="train.html" >Тренировки</a></li>
			<li <?if($_GET['page']=='Audio' ||$_GET['page']=='audioCategory' ||$_GET['page']=='audiomedia' ||$_GET['page']=='multimedia' || $_GET['page']=='videoCategory'  || $_GET['page']=='video') echo'class="current_page_item "';?>><a href="#">Мультимедиа</a>
          <ul>
            <li><a href="multimedia.html">Видео</a></li>
            <li><a href="audiomedia.html">Аудио</a></li>
          </ul>
      </li>
			<li <?if($_GET['page']=='cabinet') echo'class="current_page_item"';?>><a href="cabinet.html">Личный кабинет</a></li>
      <?if($user->getId()!=0){?><li><a href="exit.php">Выход</a></li><?}?>
      <?if($user->getId()==0){?><li><a href="enter.html">&nbsp;&nbsp;&nbsp;Вход </a></li><?}?>
      <li class="last">&nbsp;</li>
		</ul>
    </div>
  <div id="container">
    <?
			// Загрузчик страницы
			if(isset($_GET["page"])) $pg = $_GET["page"];
			else $pg = "enter";	/* Заход на главную страницу */
            if (file_exists("./pages/".$pg.".php")) {
                require "./pages/".$pg.".php"; 
            }
            else {
                echo "Страница не найдена";
            }
		?>
  </div>
</div>
<div id="footer">
	<div class="ya-site-form ya-site-form_inited_no" onclick="return {'bg': '#0B3568', 'target': '_self', 'language': 'ru', 'suggest': true, 'tld': 'ru', 'site_suggest': true, 'action': 'http://enfact.ru/search.html', 'webopt': false, 'fontsize': 12, 'arrow': false, 'fg': '#000000', 'searchid': '1996690', 'logo': 'rw', 'websearch': false, 'type': 2}"><form action="http://yandex.ru/sitesearch" method="get" target="_self"><input type="hidden" name="searchid" value="1996690" /><input type="hidden" name="l10n" value="ru" /><input type="hidden" name="reqenc" value="" /><input type="text" name="text" value="" /><input type="submit" value="Найти" /></form></div><style type="text/css">.ya-page_js_yes .ya-site-form_inited_no { display: none; }</style><script type="text/javascript">(function(w,d,c){var s=d.createElement('script'),h=d.getElementsByTagName('script')[0],e=d.documentElement;(' '+e.className+' ').indexOf(' ya-page_js_yes ')===-1&&(e.className+=' ya-page_js_yes');s.type='text/javascript';s.async=true;s.charset='utf-8';s.src=(d.location.protocol==='https:'?'https:':'http:')+'//site.yandex.net/v2.0/js/all.js';h.parentNode.insertBefore(s,h);(w[c]||(w[c]=[])).push(function(){Ya.Site.Form.init()})})(window,document,'yandex_site_callbacks');</script>
</div>

<!-- Yandex.Metrika informer -->
<a href="http://metrika.yandex.ru/stat/?id=22539640&amp;from=informer"
target="_blank" rel="nofollow"><img src="//bs.yandex.ru/informer/22539640/3_1_FFFFFFFF_EAE9E9FF_0_pageviews"
style="width:88px; height:31px; border:0;display:none;" alt="Яндекс.Метрика" title="Яндекс.Метрика: данные за сегодня (просмотры, визиты и уникальные посетители)" onclick="try{Ya.Metrika.informer({i:this,id:22539640,lang:'ru'});return false}catch(e){}"/></a>
<!-- /Yandex.Metrika informer -->

<!-- Yandex.Metrika counter -->
<script type="text/javascript">
(function (d, w, c) {
    (w[c] = w[c] || []).push(function() {
        try {
            w.yaCounter22539640 = new Ya.Metrika({id:22539640,
                    webvisor:true,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true});
        } catch(e) { }
    });

    var n = d.getElementsByTagName("script")[0],
        s = d.createElement("script"),
        f = function () { n.parentNode.insertBefore(s, n); };
    s.type = "text/javascript";
    s.async = true;
    s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

    if (w.opera == "[object Opera]") {
        d.addEventListener("DOMContentLoaded", f, false);
    } else { f(); }
})(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div style="display:none;"><img src="//mc.yandex.ru/watch/22539640" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->

</body>
</html>
