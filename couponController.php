
<!DOCTYPE html>
<html>
<head>
	<title>白亜祭Web投票サイト</title>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<!--script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script-->

<style type="text/css">
	
	html{
		margin: 0;
	}

	body{
		margin: 0;
		font-family: meiryo UI;
	}

	.wrapper{
		height: 100%;
		margin: 0;
		/*background-color: #00ff00;*/
		padding: 5px;
	}

	.nav{
		padding-left: 20px;
		padding: 1px;
		margin: 0;
		position: fixed;
		width: 100%;
		background-color: #11a394;
		color: #ffffff;
		box-shadow: 0 3px 4px #2f6d67;
	}

	h1{
		padding-left: 20px;
		font-size: 14pt;
	}
	h3{
		text-align: center;
	}

	tr{
		width: 99%;
		border: 1px solid;
		margin-bottom:7px;
		text-align: center;
		display: block;
		padding: 8px;
	}

	table{
		text-align: center;
		width: 100%;
	}

	td,th{
		width: 99%;
		margin-bottom: 1.1em;
	    display: block;
	}

	th{
		text-align: center;
	}

	.mb_00{
		background-color: #cccccc;
		display: none;
	}

	.mb_10{
		background-color: #42f4b9;
		display: none;
	}

	.mb_11{
		background-color: #42f4b9;
	}

	a.bk{
	  display: block;
	  height: 35px;
	  width: 100%;
	  text-decoration: none;
	  background: #22938a;
	  color: #fff;
	  line-height: 37px;
	  text-align: center;
	  border-radius: 3px;
	  box-shadow: 1px 2px 4px #19514c;
	  position: fixed;
	  bottom: 10px;
	}
	a.bk:active{  /* クリック時の設定 */
	  -ms-transform: translateY(2px);
	  -webkit-transform: translateY(2px);
	  transform: translateY(2px);
	  box-shadow:none;
	}



	a.vote{
	  display: block;
	  height: 35px;
	  width: 100%;
	  text-decoration: none;
	  background: #22938a;
	  color: #fff;
	  line-height: 37px;
	  text-align: center;
	  font-weight: bold;
	  font-size: 21pt;
	  border-radius: 3px;
	  box-shadow: 1px 2px 4px #19514c;
	  padding-top: 5px;
	  padding-bottom: 5px;
	}
	a.vote:active{  /* クリック時の設定 */
	  -ms-transform: translateY(2px);
	  -webkit-transform: translateY(2px);
	  transform: translateY(2px);
	  box-shadow:none;
	}



	a.voted{
	  display: block;
	  height: 35px;
	  width: 100%;
	  text-decoration: none;
	  background: #c66e15;
	  color: #fff;
	  line-height: 37px;
	  text-align: center;
	  font-weight: bold;
	  border-radius: 3px;
	  box-shadow: 1px 2px 4px #603e1d;
	  padding-top: 5px;
	  padding-bottom: 5px;
	}
	a.voted:active{  /* クリック時の設定 */
	  -ms-transform: translateY(2px);
	  -webkit-transform: translateY(2px);
	  transform: translateY(2px);
	  box-shadow:none;
	}




</style>


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