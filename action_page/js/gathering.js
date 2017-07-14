x = 0;
$("tbody").scroll(function(){
    $("span").text(x += 1);
});