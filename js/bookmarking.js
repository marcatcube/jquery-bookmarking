var home_url = "https://www.marcatcube.com/wp-json/wp/v2/";

$('.sp_menu_button').on('click',function(){
    if($(this).hasClass('off')){
        $('.sp_menu_button').removeClass('off').addClass('on');
    }else {
        $('.sp_menu_button').removeClass('on').addClass('off'); 
    }
});



/*COOKIE取得*/
function getCookieArray(){
  var arr = new Array();
  if(document.cookie != ''){
    var tmp = document.cookie.split('; ');
    for(var i=0;i<tmp.length;i++){
      var data = tmp[i].split('=');
      arr[data[0]] = decodeURIComponent(data[1]);
    }
  }
  return arr;
}
var arr = getCookieArray();
var bookmarking_arr = [];
for(let k in arr) {
    if ( k.match(/bookmarking/)) {
        bookmarking_arr.push(arr[k]);
    }
}


var str = bookmarking_arr.join(',');
url = home_url + 'MarcatGiaInPosts/?post_ids='+str;
console.log(url);
$.getJSON(url, function (postdata) {
    $.each(postdata, function(i, item) {
        $('.bookmarking_post').append('<li class="pushu_button_bookmarking off" data-post_id="'+item['id']+'"><h2>'+item['title']+'</h2></li>').hide().fadeIn(500);
    });
    $(".pushu_button_bookmarking").each(function(i, elem) {
        for(let k in arr) {
            if(arr[k] == $(this).data('post_id')){
                $(this).removeClass('off').addClass('on');
            }
        }
    });
    $('.pushu_button_bookmarking').on('click',function(){
        var bookmarking = "bookmarking[" + $(this).data('post_id') + "]";
        var value = $(this).data('post_id');
        if($(this).hasClass('off')){
        }else {            
            $.removeCookie(bookmarking, { path: "/" });
            $(this).fadeOut(500);
        }
    });
});

$(".pushu_button").each(function(i, elem) {
    for(let k in arr) {
        if(arr[k] == $(this).data('post_id')){
            $(this).removeClass('off').addClass('on');
        }
    }
});
$('.pushu_button').on('click',function(){
    var bookmarking = "bookmarking[" + $(this).data('post_id') + "]";
    var value = $(this).data('post_id');
    if($(this).hasClass('off')){
        $(this).removeClass('off').addClass('on');
        $.cookie(bookmarking, value, { expires: 7 , path: "/" });
    }else {
        $(this).removeClass('on').addClass('off'); 
        $.removeCookie(bookmarking, { path: "/" });
    }
});

$('.dummy_button').on('click',function(){
	$.cookie('test', 'test', { expires: 7 , path: "/" });
});