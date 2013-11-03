var rightAns, rightAnsId, ans, cur_word=0, righta=0;  
function noimage() {
    $("#image").html('');  
}  
function insertImage(img) {
    $("#image").html('<img src="'+img+'" style="max-height:215px;max-width:260px;border:1px solid black;" onError="noimage()" />');  
}  
function right(t) {
    ans=t;
    $(t).css({'background-color':'#61bf43'});
    $("#rw").text("Верный ответ");
    $("#rw").removeClass('wrong');
    $("#rw").addClass('right');
    $.post("getImage.php", 
           {
               image:rightAns
           },
           insertImage
    );
    righta++;  
}  
function wrong(t) {
    ans=t;
    $(t).css({'background-color':'#F74B36'});
    $("#"+rightAnsId).css({'background-color':'#61bf43'});
    $("#rw").text("Неверный ответ");
    $("#rw").removeClass('right');
    $("#rw").addClass('wrong');
    $.post("getImage.php",
          {
           image:$("#word").text()
          },
          insertImage
    );  
}  
function loadWord() {
    mesh.shuffle();
    rightAns=voc[cur_word][how];
    var ind=mesh.indexOf(rightAns);
    if(ind>=4) {
      a=Math.floor(Math.random()*4);
      mesh[ind]=mesh[a];
      mesh[a]=rightAns;
      ind=a;
    }
    var n=ind+1;
    rightAnsId="trans"+n;
    $("#word").text(voc[cur_word][1-how]);
    $("#trans1").text(mesh[0]);
    $("#trans2").text(mesh[1]);
    $("#trans3").text(mesh[2]);
    $("#trans4").text(mesh[3]);
    $(".trans").click(clickWord);
    $("#cur").text(cur_word+1);  
}  

function clicknextWord() {
    $("#image").html("");
    $("#rw").text("");
    $("#nextWord").hide();
    $(ans).css({'background-color':'#FFF'});
    $("#"+rightAnsId).css({'background-color':'#FFF'});
    if(cur_word==4) {
      $("#game").html('<h3>Верных ответов: '+righta+' из 5!</h3><a href="train.html" class="link-style3" title="К списку тренировок">К списку тренировок</a>');
      $.post("addRight.php",
        {
          right:righta
        }
      );
    }
    else  {
        cur_word++;
        loadWord();
    }  
}  
function clickWord(){
    $(".trans").unbind('click');  
    if($(this).text()==rightAns) right(this);  
    else wrong(this);  
    $("#nextWord").show();  
}
$(document).ready(function() {
    voc.shuffle();
    loadWord();
    $("#nextWord").click(clicknextWord);
});