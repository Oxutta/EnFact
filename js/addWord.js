$(document).ready(function() {
  $('.eng').each(function(){
    var $p = $(this);
    $p.html('<w>' + $p.html());
    $p.html($p.html().replace(/ /ig, '</w> <w>'));
    $p.html($p.html().replace(/<w>____<\/w>/ig, '____'));
    $p.html($p.html().replace(/<w>([0-9]+\.)<\/w>/, '$1'));
    $p.html($p.html().replace(/<w>([0-9]+)<\/w>/, '$1'));
  });
  $('w').click(function(){
    var w=$(this).text().replace(/[\.!?:,]/,'');
    w=w.toLowerCase();
    $.post(
      "addWord.php",
      {
        word:w
      },
      message
    );
  });
  $("<div id='message'></div>").prependTo('#container');
  $("#message").hide();
});
  function message(data) {
    $("#message").text(data);
    $("#message").fadeIn(300).delay(1500).fadeOut(400);
  }