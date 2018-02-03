
<!DOCTYPE html>
<html>
<head>
	<title>白亜祭Web投票サイト</title>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="deploy/top.css" type="text/css">
	
</head>
<body>
<div class="nav"><h1><a onclick="location.href='/index.php';" style="cursor:pointer;">Hakuasai2017</a></h1></div>
<div class="wrapper">
<div class="content">

<br><br><br><br>
<h3>
<?php

include("cookieController.php");
include("enabledCoupon.php");


if(in_array($_GET["couponEdit"], $enabledCoupon)){
	$couponDetail = "JIZEN1069";
}else{
	$couponDetail = $_GET["couponEdit"];
}


    switch ( $couponDetail ) {
        case 'JIZEN1069':
            # code...
        setcookie("HK17CouponHash", 'JIZEN1069', time()+365*365*36,'/');
        print("クーポンが適用されました！<br>あなたは，1日につき4回投票できるようになりました！");
        $cpe = "ok";
        break;
        case 'HKA171106JT':
            # code...
        setcookie("HK17CouponHash", 'HKA171106JT', time()+365*365*36,'/');
        print("クーポンが適用されました！<br>あなたは，1日につき65536回投票できるようになりました！");
        $cpe = "ok";
            break;
        default:
            # code...
		print("このクーポンは使用できません。");
		$cpe = "ng";
            break;
    }


?>

</h3>
<a class="bk" onclick="location.href='index.php?couponEdit=<?=$cpe?>'">←前に戻る</a>
</div>
</div>
