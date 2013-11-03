<?
class User {
  private static $_instance=null;
  private static $id;
  private static $voc;
  private static $sizeVoc;
  private static $fav;
  private static $sizeFav;
  private static $rightAns;
  private static $train;
  private static $lessons;
  private function __construct() {
      if(isset($_COOKIE['id']) && $_COOKIE['id']!='') {
          self::$id=$_COOKIE['id'];
          require "connect_db.php";
          $query = 'SELECT *
                    FROM words
                    WHERE id_user="'.self::$id.'"
                    ORDER BY word';
                
          $words = mysql_query($query);
          
          include_once 'Yandex_Translate.php';
          $translator = new Yandex_Translate();
          
          self::$sizeVoc=mysql_num_rows($words);
          for($i = 0; $i < self::$sizeVoc; $i++) {
            $l = mysql_fetch_array($words,MYSQL_BOTH);
            self::$voc[$i][0]=$l["word"];
            self::$voc[$i][1] = $translator->yandexTranslate('en', 'ru', $l["word"]);
          }
          
          $query = 'SELECT *
          FROM favorites
          WHERE id_user="'.self::$id.'"';
          $fav = mysql_query($query);
          self::$sizeFav=mysql_num_rows($fav);
          for($i = 0; $i < self::$sizeFav; $i++) {
            $l = mysql_fetch_array($fav,MYSQL_BOTH);
            self::$fav[$i][0]=$l["id_les"];
            self::$fav[$i][1]=$l["name"];
          }
          $query = 'SELECT * FROM statistic WHERE id = "'.self::$id.'"';
          $result=mysql_query($query);
          $r=mysql_fetch_array($result,MYSQL_BOTH);
          self::$rightAns=$r['right_answ'];
          self::$train=$r['train'];
          self::$lessons=$r['lessons'];
        }
      else {
          self::$id=0;
          if(isset($_COOKIE['rightAns']))self::$rightAns=$_COOKIE['rightAns'];
          else self::$rightAns=0;
          
          if(isset($_COOKIE['train']))self::$train=$_COOKIE['train'];
          else self::$train=0;
          
          if(isset($_COOKIE['sizeVoc']) && $_COOKIE['sizeVoc']!=0) {
            self::$voc=unserialize(stripslashes($_COOKIE['voc']));
            self::$sizeVoc=$_COOKIE['sizeVoc'];
          }
          else {
            self::$voc='';
            self::$sizeVoc=0;
          }
          if(isset($_COOKIE['sizeFav']) && $_COOKIE['sizeFav']!=0) {
            self::$fav=unserialize(stripslashes($_COOKIE['fav']));
            self::$sizeFav=$_COOKIE['sizeFav'];
          }
          else {
            self::$fav='';
            self::$sizeFav=0;
          }
          if(isset($_COOKIE['lessons']))
            self::$lessons=$_COOKIE['lessons'];
          else self::$lessons=0;
      } 
   }
  private function __clone(){}
  public static function getInstance() {
        if (null === self::$_instance) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }
  public function init($i,$l) {
    self::$id=$i;
  }
  public function getVoc() {
    return self::$voc;
  }
  public function getSizeVoc() {
    return self::$sizeVoc;
  }
  public function getFav() {
    return self::$fav;
  }
  public function getSizeFav() {
    return self::$sizeFav;
  }
  public function getTrain() {
    return self::$train;
  }
  public function getRightAns() {
    return self::$rightAns;
  }

  public function getId() {
    return self::$id;
  }
  public function getLessons() {
    return self::$lessons;
  }
  public function addBalls($b) {
    if(isset($_COOKIE['id']) && $_COOKIE['id']!=0)
        {
          self::$id=$_COOKIE['id'];
          require "connect_db.php";
          $query = 'UPDATE statistic SET right_answ=right_answ+'.$b.' WHERE id = "'.self::$id.'"';
          $result=mysql_query($query);
        }
    else {
      self::$rightAns+=$b;
    }
  }
  public function addLesson() {
    if(self::$id!=0)
        {
          self::$lessons++;
          require "connect_db.php";
          $query = 'UPDATE statistic SET lessons=lessons+1 WHERE id = "'.self::$id.'"';
          $result=mysql_query($query);
        }
        else {
    self::$lessons++;
    //setcookie('lessons',self::$lessons);
    }
  }
}
?>