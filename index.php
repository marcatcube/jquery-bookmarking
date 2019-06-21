<!DOCTYPE html>
<html>
<head>
	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-30309196-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-30309196-3');
</script>
<title></title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
.sp_menu_button,
.sp_menu_button span {
  display: inline-block;
  transition: all .4s;
  box-sizing: border-box;
}
.sp_menu_button {
  position: relative;
  width: 50px;
  height: 44px;
}
.sp_menu_button span {
  position: absolute;
  left: 0;
  width: 100%;
  height: 5px;
  background-color: #000;
  border-radius: 0px;
}
.sp_menu_button span:nth-of-type(1) {
  top: 0;
}
.sp_menu_button span:nth-of-type(2) {
  top: 20px;
}
.sp_menu_button span:nth-of-type(3) {
  bottom: 0;
}
.sp_menu_button.on span:nth-of-type(1) {
  -webkit-transform: translateY(20px) rotate(-45deg);
  transform: translateY(20px) rotate(-45deg);
}
.sp_menu_button.on span:nth-of-type(2) {
  opacity: 0;
}
.sp_menu_button.on span:nth-of-type(3) {
  -webkit-transform: translateY(-20px) rotate(45deg);
  transform: translateY(-20px) rotate(45deg);
}
.pushu_button {
    transition-duration: 0.5s;
}
.pushu_button.off {
    color: #000;
}
.pushu_button.on {
    color: #FF0000;
}
</style>
</head>
<body>

    <ul class="bookmarking_ul">
        <li class="pushu_button off" data-post_id="49">お気に入りボタン</li>
        <li class="pushu_button off" data-post_id="59">お気に入りボタン</li>
        <li class="pushu_button off" data-post_id="52">お気に入りボタン</li>
    </ul>

<script type='text/javascript' src='//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script type='text/javascript' src='//cdnjs.cloudflare.com/ajax/libs/jquery-migrate/1.4.1/jquery-migrate.min.js' defer charset='UTF-8'></script>
<script type="text/javascript" src="js/jquery.cookie.min.js"></script>
<script type="text/javascript" src="js/bookmarking.js"></script>
</body>
</html>
