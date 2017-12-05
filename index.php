<!DOCTYPE html>
<html>
<head>
	<title>○○祭Web投票サイト</title>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

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
		margin-bottom:14px;
		text-align: center;
		display: block;
		padding: 8px;
	}

	table{
		left: 0;
		right: 0;
		text-align: center;
		width: 100%;
		max-width: 790px;
	}

	td,th{
		width: 99%;
		margin-bottom: 1.1em;
	    display: block;
	}

	th{
		text-align: center;
	}

	img{
		max-width: 300px;
		max-height: 400px; 
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
		/*background-color: #42f4b9;*/
	}
	
	
	
	
	
	a.bc{
	  display: block;
	  height: 35px;
	  width: 100%;
	  padding-top:5px;
	  padding-bottom: 5px;
	  text-decoration: none;
	  background: #fdc689;
	  line-height: 37px;
	  text-align: center;
	  font-size: 16pt;
	  border-radius: 3px;
	  box-shadow: 1px 2px 4px #d4842c;
	  color: red;
	  font-weight: bold;
	}
	a.bc:active{  /* クリック時の設定 */
	  -ms-transform: translateY(2px);
	  -webkit-transform: translateY(2px);
	  transform: translateY(2px);
	  box-shadow:none;
	}
	
	
	
	
	

	a.bk{
	  display: block;
	  height: 35px;
	  width: 100%;
	  max-width: 500px;
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
	  max-width: 500px;
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
	  max-width: 500px;
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
<div class="nav"><h1><a onclick="location.href='/index.php';" style="cursor:pointer;">XYZFestival2017</a></h1></div>
<div class="wrapper">
	<div class="content" align="center">

<br><br><br><br>
<!--//////////////////////////////////////////////////////////////////////////////////////////-->


<?php

include("cookieController.php");
include("./php/mysqli.php");


//クッキーの強制更新

if(isset($_GET["couponEdit"]) && $_GET["couponEdit"] == "ok"){
	echo "<script>location.href=\"index.php?couponrefreshed\";</script>";
	exit;
}





if(!isset($_GET["attr"])){

if($_COOKIE["HK17CouponExpiration"]){
	$maxvotetimes = $_COOKIE["HK17CouponExpiration"];
}else{
	$maxvotetimes = 1;
}

echo <<< EOM

<h3>投票するグループを選択して下さい！</h3>

<div align=center>
<a href="?attr=ms" class="vote" style="background: #c41da0;box-shadow: 1px 2px 4px #72135e;">Ms</a><br>
<a href="?attr=mr" class="vote" style="background: #8daf05;box-shadow: 1px 2px 4px #49590a;">Mr</a><br>
<a href="?attr=karaoke" class="vote" style="background: #0b8fb7;box-shadow: 1px 2px 4px #104a5b;">カラオケ</a><br>
<br>
<span style="color:blue;"><h2>投票受付はすべて終了しました。<br>今年も多数のご投票ありがとうございました！</h2></span>

</div>
<br><br>
<hr>
<h3>マイページ</h3>
<center>
<strong>あなたが1日に投票できる回数:<br>Ms・Mr それぞれ<span style="color:red">{$maxvotetimes}回</span>ずつ</strong>
<br><br>
<p style="font-size:10pt;">
※↓のフォームから、お持ちのクーポンを登録することが出来ます。<br>
クーポンを登録することで，1日に投票できる回数を増やすことが出来ます。</p>
<form action="couponController.php" method="get">
<input type="text" name="couponEdit">
<input type="submit">
</form>
</center>
<br><br>

</div>
</div>

</body>
</html>


EOM;


	exit;

}else{

	$attrget = $_GET["attr"];




}



	$ms_member 			= "<h3>所属：Ms</h3>"							.PHP_EOL."<table>".PHP_EOL;//"<tr><td>ID</td><td>写真</td><th>氏名</th><td>点数</td><td></td></tr>".PHP_EOL;
	$mr_member 			= "<h3>所属：Mr</h3>"							.PHP_EOL."<table>".PHP_EOL;//"<tr><td>ID</td><td>写真</td><th>氏名</th><td>点数</td><td></td></tr>".PHP_EOL;
	$dsm_member 		= "<h3>所属：ドレスショーモデル</h3>"			.PHP_EOL."<table>".PHP_EOL;//"<tr><td>ID</td><td>写真</td><th>氏名</th><td>点数</td><td></td></tr>".PHP_EOL;
	$hidems_member 		= "<h3>所属：裏ミス・ミスター</h3>"							.PHP_EOL."<table>".PHP_EOL;//"<tr><td>ID</td><td>写真</td><th>氏名</th><td>点数</td><td></td></tr>".PHP_EOL;
	$hidemr_member 		= "<h3>所属：裏Mr</h3>"							.PHP_EOL."<table>".PHP_EOL;//"<tr><td>ID</td><td>写真</td><th>氏名</th><td>点数</td><td></td></tr>".PHP_EOL;
	$karaoke_member 	= "<h3>所属：カラオケ</h3>"						.PHP_EOL."<table>".PHP_EOL;//"<tr><td>ID</td><td>写真</td><th>氏名</th><td>点数</td><td></td></tr>".PHP_EOL;
	$boku_member 		= "<h3>所属：謎の人</h3>"						.PHP_EOL."<table>".PHP_EOL;//"<tr><td>ID</td><td>写真</td><th>氏名</th><td>点数</td><td></td></tr>".PHP_EOL;



	$result 		= $mysqli->query("SELECT * FROM voteMaster INNER JOIN userComment ON (voteMaster.memberID = userComment.memberID)");

if($result){


  while($row = $result->fetch_object()){


    $memberID	 	= htmlspecialchars($row->memberID);
    $point 		 	= htmlspecialchars($row->point);
    $name 		 	= htmlspecialchars($row->name);
    $furigana 	 	= htmlspecialchars($row->furigana);
    $availability	= htmlspecialchars($row->availability);

    $attr			= substr($memberID , 0, 2);

    if($availability == 1){
    	$trcss		= "01";
    }else if($availability == 11){
    	$trcss		= "11";
    }else{
    	$trcss 		= "00";
    }

    switch ($attr) {
    	case '11':
    		# code...

    		$ms_member 			.= "<tr class=\"mb_".$trcss."\"><td><img src=\"memberphoto/$memberID.jpg\"></td> <th>$name($furigana)</th>  <td><div align=center><a href=\"detail.php?memberID=".$memberID."\" class=\"voted\">この人の詳細</a></div></td></tr>".PHP_EOL;

    		break;

    	case '12':
    		# code...

    	    $mr_member 			.= "<tr class=\"mb_".$trcss."\"><td><img src=\"memberphoto/$memberID.jpg\"></td> <th>$name($furigana)</th>  <td><div align=center><a href=\"detail.php?memberID=".$memberID."\" class=\"voted\">この人の詳細</a></div></td></tr>".PHP_EOL;

    		break;

    	case '19':
    		# code...

    	    $dsm_member 		.= "<tr class=\"mb_".$trcss."\"><td><img src=\"memberphoto/$memberID.jpg\"></td> <th>$name($furigana)</th>  <td><div align=center><a href=\"detail.php?memberID=".$memberID."\" class=\"voted\">この人の詳細</a></div></td></tr>".PHP_EOL;

    		break;



# 裏MS
    	case '21':
    		# code...

    	    $hidems_member 		.= "<tr class=\"mb_".$trcss."\"><td>&nbsp;</td> <th>$name</th>  <td><div align=center><a class=\"bc\" onclick=\"if(confirm('本当に投票しますか？\\n一度投票するとやり直すことは出来ません。\\n\\n\\n※公正公平な投票にするため，不正な投票は固く禁じられています。\\nもし不正行為が見つかった場合は，あなたにアクセス禁止の措置がかけられます。')){waku.location='voteFunctionController.php?memberID=$memberID&userprivkey=$userID_0';}\" href=\"#\">この人に投票する！</a></div></td></tr>".PHP_EOL;
    	    
    	    
/*


*/

    		break;

# 裏MR

    	case '22':
    		# code...

    	    $hidemr_member 		.= "<tr class=\"mb_".$trcss."\"><td>&nbsp;</td> <th>$name</th>  <td><div align=center><a class=\"bc\" onclick=\"if(confirm('本当に投票しますか？\\n一度投票するとやり直すことは出来ません。\\n\\n\\n※公正公平な投票にするため，不正な投票は固く禁じられています。\\nもし不正行為が見つかった場合は，あなたにアクセス禁止の措置がかけられます。')){waku.location='voteFunctionController.php?memberID=$memberID&userprivkey=$userID_0';}\" href=\"#\">この人に投票する！</a></div></td></tr>".PHP_EOL;

    		break;

    	case '31':
    		# code...

    	    $karaoke_member 	.= "<tr class=\"mb_".$trcss."\"><td><img src=\"memberphoto/$memberID.jpg\"></td> <th>$name($furigana)</th>  <td><div align=center><a href=\"detail.php?memberID=".$memberID."\" class=\"voted\">この人・グループの詳細</a></div></td></tr>".PHP_EOL;

    		break;

    	default:
    		# code...

    	    $boku_member 		.= "<tr class=\"mb_".$trcss."\"><td><img src=\"memberphoto/$memberID.jpg\"></td> <th>$name($furigana)</th>  <td><div align=center><a href=\"detail.php?memberID=".$memberID."\" class=\"voted\">この人の詳細</a></div></td></tr>".PHP_EOL;

    		break;
    }



  }
}

$mysqli->close();


$ms_member 		.= "</table><br><br><br><br><a class=\"bk\" onclick=\"location.href='/';\" href=\"#\">←前に戻る</a>".PHP_EOL;
$mr_member 		.= "</table><br><br><br><br><a class=\"bk\" onclick=\"location.href='/';\" href=\"#\">←前に戻る</a>".PHP_EOL;
$dsm_member  	.= "</table><br><br><br><br><a class=\"bk\" onclick=\"location.href='/';\" href=\"#\">←前に戻る</a>".PHP_EOL;
$hidems_member  .= "</table><br><br><br><br><a class=\"bk\" onclick=\"location.href='/';\" href=\"#\">←前に戻る</a>".PHP_EOL;
$hidemr_member 	.= "</table><br><br><br><br><a class=\"bk\" onclick=\"location.href='/';\" href=\"#\">←前に戻る</a>".PHP_EOL;
$karaoke_member .= "</table><br><br><br><br><a class=\"bk\" onclick=\"location.href='/';\" href=\"#\">←前に戻る</a>".PHP_EOL;
$boku_member 	.= "</table><br><br><br><br><a class=\"bk\" onclick=\"location.href='/';\" href=\"#\">←前に戻る</a>".PHP_EOL;

?>


<?php
switch ($attrget) {

	case 'ms':
		echo $ms_member;
		break;
	case 'mr':
		echo $mr_member;
		break;
	case 'dsm':
		echo $dsm_member;
		break;
	case 'hidems':
		echo $hidems_member;
		break;
	case 'hidemr':
		echo $hidemr_member;
		break;
	case 'karaoke':
		echo $karaoke_member;
		break;
	default:
		echo "不明なエラーが発生しました。";
		break;
}

?>





<!--//////////////////////////////////////////////////////////////////////////////////////////-->



</div>
</div>
<iframe name="waku" style="visibility: hidden;" width="1" height="1"></iframe>
</body>



</html>