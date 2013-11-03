var rightAns, cur_word=0, righta=0;
function noimage() {
    $("#image").html('');
}
function insertImage(img) {
    $("#image").html('<img src="'+img+'" style="max-height:215px;max-width:260px;border:1px solid black;" onError="noimage()" />');
}
function right() {
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
function wrong() {
    $("#rw").text("Неверный ответ");
    $("#rw").removeClass('right');
    $("#rw").addClass('wrong');
    $("#rightansw").text($("#word2").text()+' - '+rightAns);
    $.post("getImage.php",
        {
          image:rightAns
        },
        insertImage
    );
}
function clicknextWord() {
    $("#image").html("");
    $("#rw").text("");
    $("#rightansw").text("");
    $("#nextWord").hide();
    if(cur_word==4) {
        $("#game").html('<h3>Верных ответов: '+righta+' из 5!</h3><a href="train.html" class="link-style3" title="К списку тренировок">К списку тренировок</a>');
        $.post("addRight.php",
            {
              right:righta
            }
        );
    }
    else {
        cur_word++;
        loadWord();
    }
}
function loadWord() {
    rightAns=voc[cur_word][how];
    $("#word2").text(voc[cur_word][1-how]);
    $("#cur").text(cur_word+1);
    $("#trans21").val('');
    $("#but").click(getAns);
}
function getAns() {
    $("#but").unbind('click');
    if($("#trans21").val()==rightAns) right();
    else wrong();
    $("#nextWord").show();
}
$(document).ready(function() {
    voc.shuffle();
    loadWord();
    //$("#but").click(getAns);
    $("#nextWord").click(clicknextWord);
});