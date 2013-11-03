<?php
/*
 * Класс для использования API переводчика от Яндекс
 * Идеален для славянских языков, в частности русский <-> украинский
 * trnsl.1.1.20131002T164919Z.c65ad52826e287de.4a4ee82a4e57961b21f0f987237c9ce8194993be
 */
class Yandex_Translate {
    protected $rootURL = 'http://translate.yandex.ru/tr.json';
    protected $translatePath = '/translate';
    protected $langCodesPairsListPath = '/getLangs';

    /**
     * @var string - символ или тег конца абзаца
     * Варианты: вывод в браузер - <br />, в файл - \n, может зависеть от ОС
     */
    public $eolSymbol = '<br />';

    /**
     * @var string - разделитель языков в запросе. Пока однозначно так определено Яндексом
     */
    public $langDelimiter = '-';

    protected $cURLHeaders = array(
            'User-Agent' => "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.0.3705; .NET CLR 1.1.4322; Media Center PC 4.0; .NET CLR 2.0.50727)",
            'Accept' => "text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8",
            'Accept-Language' => "ru,en-us;q=0.7,en;q=0.3",
            'Accept-Encoding' => "gzip,deflate",
            'Accept-Charset' => "windows-1251,utf-8;q=0.7,*;q=0.7",
            'Keep-Alive' => '300',
            'Connection' => 'keep-alive',
        );

    protected function yandexConnect($path, $transferData = array()) {
        $res = curl_init();
        $url = $this->rootURL.$path.'?'.http_build_query($transferData);
        $options = array(
            CURLOPT_URL => $url,
            CURLOPT_HTTPHEADER => $this->cURLHeaders,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CONNECTTIMEOUT => 30,
            //CURLOPT_PROXY => '192.168.250.1:3128',
            //CURLOPT_PROXYUSERPWD => 'kurushina-os-8:ahquieie'
        );
        curl_setopt_array($res, $options);
        $response = curl_exec($res);
        curl_close($res);

        return $response;
    }

    /**
     * @return mixed Получаем пары перевода from-to в виде 'ru-uk', 'en-fr'
     */
    public function yandexGetLangsPairs(){

        $jsonLangsPairs = $this->yandexConnect($this->langCodesPairsListPath);

        $rawOut =  json_decode($jsonLangsPairs, true);

        return $rawOut['dirs'];
    }

    /**
     * @return получаем все языки FROM
     */
    public function yandexGet_FROM_Langs(){

        $langPairs = $this->yandexGetLangsPairs();

        foreach ($langPairs as $langPair){
            $smallArray = explode($this->langDelimiter, $langPair);
            $outerArray[$smallArray[0]] = $smallArray[0];
        }
        return $outerArray;
    }

    /**
     * @return получаем все языки TO
     */
    public function yandexGet_TO_Langs(){

        $langPairs = $this->yandexGetLangsPairs();

        foreach ($langPairs as $langPair){
            $smallArray = explode($this->langDelimiter, $langPair);
            $outerArray[$smallArray[1]] = $smallArray[1];
        }
        return $outerArray;
    }

    /**
     * Собственно перевод
     * @param  $fromLang - с какого, код языка, 'ru' напр.
     * @param  $toLang - на какой, код языка. Следите: не все языки FROM доступны в TO
     * @param  $text - переводимый текст
     * @return mixed - перевод. Следите за разделителями eolSymbol
     */
    public function yandexTranslate($fromLang, $toLang, $text) {

        /* if ($fromLang != 'ru' AND $toLang != 'ru'){
            return 'Sorry, translation directly from '.$fromLang.' to '.$toLang.' is impossible';
        }

        $transferData = array(
            'lang' => $fromLang.'-'.$toLang,
            'text' => $text,
        );

        $rawTranslate = $this->yandexConnect($this->translatePath, $transferData);

        $rawTranslate = trim($rawTranslate, '"');

        $translate = str_replace('\n', $this->eolSymbol, $rawTranslate); */
        
        $key = "trnsl.1.1.20131002T164919Z.c65ad52826e287de.4a4ee82a4e57961b21f0f987237c9ce8194993be";
        $xml = simplexml_load_file('https://translate.yandex.net/api/v1.5/tr/translate?key='.$key.'&lang='.$fromLang.'-'.$toLang.'&text='.$text);
        return (string)$xml->text;

    }
}