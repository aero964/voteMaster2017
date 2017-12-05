<!DOCTYPE html>
<html>
<head>
	<title>○○祭Web投票サイト - 詳細</title>
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
		width: 100%;
		/*border: 1px solid;*/
		margin-bottom:7px;
		/*text-align: center;*/
		display: block;
	}

	table,tr,td,th{

	}


	th{
		text-align: left;
		background-color: #ffeeee;
	}


	td,th{
		width: 100%;
	    display: block;
	    padding-top: 5px;
	    padding-bottom: 5px;
	    padding-left: 15px;
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
	  font-size: 20pt;
	  border-radius: 3px;
	  box-shadow: 1px 2px 4px #d4842c;
	  bottom: 10px;
	  position: fixed;
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
	  width: 180px;
	  text-decoration: none;
	  background: #22938a;
	  color: #fff;
	  line-height: 37px;
	  text-align: center;
	  border-radius: 3px;
	  box-shadow: 1px 2px 4px #19514c;
	}
	a.bk:active{  /* クリック時の設定 */
	  -ms-transform: translateY(2px);
	  -webkit-transform: translateY(2px);
	  transform: translateY(2px);
	  box-shadow:none;
	}


/*	button{
		font-size: 12pt;
		width: 100%;
	}*/



</style>


</head>
<body>
<div class="nav"><h1><a onclick="location.href='/index.php';" style="cursor:pointer;">XYZFestival2017</a></h1></div>
<div class="wrapper">
	<div class="content">


<br><br><br><br>


<?php

include("./php/mysqli.php");
include("./cookieController.php");

$result2 = <<< EOM
<!--php-->
EOM;


if(isset($_GET["memberID"])){
	$memberID			= $_GET["memberID"];
	$result 			= $mysqli->query("SELECT * FROM voteMaster INNER JOIN userComment ON (voteMaster.memberID = userComment.memberID) WHERE voteMaster.memberID = $memberID");
	$trcss				= 1;
}else{
	die("引数が正しくありません");
}



//if($result){

while($row = $result->fetch_object()){


    $memberID	 		= htmlspecialchars($row->memberID);
    $point 		 		= htmlspecialchars($row->point);

    $name 		 		= htmlspecialchars($row->name);
    $furigana 	 		= htmlspecialchars($row->furigana);
    $availability		= htmlspecialchars($row->availability);

    $gakunen			= htmlspecialchars($row->gakunen);
    $gakubu				= htmlspecialchars($row->gakubu);
    $msmr_01koukouep	= htmlspecialchars($row->msmr_01koukouep);
    $msmr_02tokuiry		= htmlspecialchars($row->msmr_02tokuiry);
    $msmr_03kikkake		= htmlspecialchars($row->msmr_03kikkake);
    $msmr_04jiman		= htmlspecialchars($row->msmr_04jiman);
    $msmr_05sakunen		= htmlspecialchars($row->msmr_05sakunen);
    $msmr_06type		= htmlspecialchars($row->msmr_06type);
    $msmr_07date		= htmlspecialchars($row->msmr_07date);
    $krok_comment		= htmlspecialchars($row->krok_comment);

  }
//}

$mysqli->close();


   $attr				= substr($memberID , 0, 2);


$result2 .= "<div align=center><img src='memberphoto/$memberID.jpg' style='width:300px;'></div>";


   switch ($attr) {
    	case '11': 
    		# ms

$result2 .= <<<EOM

<table>
	<tr>
		<th>氏名（ふりがな）</th>
		<td>$name($furigana)</td>
	</tr>
	<tr>
		<th>学年</th>
		<td>{$gakunen}年</td>
	</tr>
	<tr>
		<th>学部</th>
		<td>$gakubu</td>
	</tr>
	<tr>
		<th>高校時代のエピソード</th>
		<td>$msmr_01koukouep</td>
	</tr>
	<tr>
		<th>得意料理は？</th>
		<td>$msmr_02tokuiry</td>
	</tr>
	<tr>
		<th>出場しようと思ったきっかけは?</th>
		<td>$msmr_03kikkake</td>
	</tr>
	<tr>
		<th>自分の自慢できるところ</th>
		<td>$msmr_04jiman</td>
	</tr>
	<tr>
		<th>昨年のMsMrより可愛いかっこいいと思う?</th>
		<td>$msmr_05sakunen</td>
	</tr>
	<tr>
		<th>好きなタイプは?</th>
		<td>$msmr_06type</td>
	</tr>
	<tr>
		<th>どんなデートがしたい?</th>
		<td>$msmr_07date</td>
	</tr>
</table>

<a class="bk" onclick="history.back(1)" href="/?attr=ms">←前に戻る</a>
<br><br><br><br><br><br><br><br><br><br>
	

EOM;


/*
<a class="bc" onclick="if(confirm('本当に投票しますか？\\n一度投票するとやり直すことは出来ません。\\n\\n\\n※公正公平な投票にするため，不正な投票は固く禁じられています。\\nもし不正行為が見つかった場合は，あなたにアクセス禁止の措置がかけられます。')){waku.location='voteFunctionController.php?memberID=$memberID&userprivkey=$userID_0';}" href="#">この人に投票する！</a>

*/





    		break;

    	case '12':
    		# mr

$result2 .= <<<EOM

<table>
	<tr>
		<th>氏名（ふりがな）</th>
		<td>$name($furigana)</td>
	</tr>
	<tr>
		<th>学年</th>
		<td>{$gakunen}年</td>
	</tr>
	<tr>
		<th>学部</th>
		<td>$gakubu</td>
	</tr>
	<tr>
		<th>高校時代のエピソード</th>
		<td>$msmr_01koukouep</td>
	</tr>
	<tr>
		<th>得意料理は？</th>
		<td>$msmr_02tokuiry</td>
	</tr>
	<tr>
		<th>出場しようと思ったきっかけは?</th>
		<td>$msmr_03kikkake</td>
	</tr>
	<tr>
		<th>自分の自慢できるところ</th>
		<td>$msmr_04jiman</td>
	</tr>
	<tr>
		<th>昨年のMsMrより可愛いかっこいいと思う?</th>
		<td>$msmr_05sakunen</td>
	</tr>
	<tr>
		<th>好きなタイプは?</th>
		<td>$msmr_06type</td>
	</tr>
	<tr>
		<th>どんなデートがしたい?</th>
		<td>$msmr_07date</td>
	</tr>
</table>

<a class="bk" onclick="history.back(1)" href="/?attr=mr">←前に戻る</a>
<br><br><br><br><br><br><br><br><br><br>

	
EOM;


/*
<a class="bc" onclick="if(confirm('本当に投票しますか？\\n一度投票するとやり直すことは出来ません。\\n\\n\\n※公正公平な投票にするため，不正な投票は固く禁じられています。\\nもし不正行為が見つかった場合は，あなたにアクセス禁止の措置がかけられます。')){waku.location='voteFunctionController.php?memberID=$memberID&userprivkey=$userID_0';}" href="#">この人に投票する！</a>

*/



    		break;

    	case '19':
    		# dms

$result2 .= <<<EOM

N/A

EOM;

    		break;

    	case '21':
    		# hidems

$result2 .= <<<EOM

<table>
	<tr>
		<th>氏名（ふりがな）</th>
		<td>$name($furigana)</td>
	</tr>
	<tr>
		<th>学年</th>
		<td>{$gakunen}年</td>
	</tr>
	<tr>
		<th>学部</th>
		<td>$gakubu</td>
	</tr>
	<tr>
		<th>高校時代のエピソード</th>
		<td>$msmr_01koukouep</td>
	</tr>
	<tr>
		<th>得意料理は？</th>
		<td>$msmr_02tokuiry</td>
	</tr>
	<tr>
		<th>出場しようと思ったきっかけは?</th>
		<td>$msmr_03kikkake</td>
	</tr>
	<tr>
		<th>自分の自慢できるところ</th>
		<td>$msmr_04jiman</td>
	</tr>
	<tr>
		<th>昨年のMsMrより可愛いかっこいいと思う?</th>
		<td>$msmr_05sakunen</td>
	</tr>
	<tr>
		<th>好きなタイプは?</th>
		<td>$msmr_06type</td>
	</tr>
	<tr>
		<th>どんなデートがしたい?</th>
		<td>$msmr_07date</td>
	</tr>
</table>

<a class="bk" onclick="history.back(1)" href="/?attr=hidems">←前に戻る</a>
<br><br><br><br><br><br><br><br><br><br>

<a class="bc" onclick="if(confirm('本当に投票しますか？\\n一度投票するとやり直すことは出来ません。\\n\\n\\n※公正公平な投票にするため，不正な投票は固く禁じられています。\\nもし不正行為が見つかった場合は，あなたにアクセス禁止の措置がかけられます。')){waku.location='voteFunctionController.php?memberID=$memberID&userprivkey=$userID_0';}" href="#">この人に投票する！</a>


EOM;

    		break;

    	case '22':


$result2 .= <<<EOM
<table>
	<tr>
		<th>氏名（ふりがな）</th>
		<td>$name($furigana)</td>
	</tr>
	<tr>
		<th>学年</th>
		<td>{$gakunen}年</td>
	</tr>
	<tr>
		<th>学部</th>
		<td>$gakubu</td>
	</tr>
	<tr>
		<th>高校時代のエピソード</th>
		<td>$msmr_01koukouep</td>
	</tr>
	<tr>
		<th>得意料理は？</th>
		<td>$msmr_02tokuiry</td>
	</tr>
	<tr>
		<th>出場しようと思ったきっかけは?</th>
		<td>$msmr_03kikkake</td>
	</tr>
	<tr>
		<th>自分の自慢できるところ</th>
		<td>$msmr_04jiman</td>
	</tr>
	<tr>
		<th>昨年のMsMrより可愛いかっこいいと思う?</th>
		<td>$msmr_05sakunen</td>
	</tr>
	<tr>
		<th>好きなタイプは?</th>
		<td>$msmr_06type</td>
	</tr>
	<tr>
		<th>どんなデートがしたい?</th>
		<td>$msmr_07date</td>
	</tr>
</table>

<a class="bk" onclick="history.back(1)" href="/?attr=hidems">←前に戻る</a>
<br><br><br><br><br><br><br><br><br><br>

<a class="bc" onclick="if(confirm('本当に投票しますか？\\n一度投票するとやり直すことは出来ません。\\n\\n\\n※公正公平な投票にするため，不正な投票は固く禁じられています。\\nもし不正行為が見つかった場合は，あなたにアクセス禁止の措置がかけられます。')){waku.location='voteFunctionController.php?memberID=$memberID&userprivkey=$userID_0';}" href="#">この人に投票する！</a>


EOM;

    		break;

    	case '31':
    		# karaoke

$result2 .= <<<EOM

<table>
	<tr>
		<th>グループ</th>
		<td>$name($furigana)</td>
	</tr>
	<tr>
		<th>コメント</th>
		<td>$krok_comment</td>
	</tr>
</table>

<a class="bk" onclick="history.back(1)" href="/?attr=karaoke">←前に戻る</a>
<br><br><br><br><br><br><br><br><br><br>

EOM;


/*

<a class="bc" onclick="if(confirm('本当に投票しますか？\\n一度投票するとやり直すことは出来ません。\\n\\n\\n※公正公平な投票にするため，不正な投票は固く禁じられています。\\nもし不正行為が見つかった場合は，あなたにアクセス禁止の措置がかけられます。')){waku.location='voteFunctionController.php?memberID=$memberID&userprivkey=$userID_0';}" href="#">この人・グループに投票する！</a>

*/

    		break;

    	default:
    		# boku

$result2 .= <<<EOM

<table>
	<tr>
		<th>氏名（ふりがな）</th>
		<td>$name($furigana)</td>
	</tr>
	<tr>
		<th>学年</th>
		<td>{$gakunen}年</td>
	</tr>
	<tr>
		<th>学部</th>
		<td>$gakubu</td>
	</tr>
	<tr>
		<th>高校時代のエピソード</th>
		<td>$msmr_01koukouep</td>
	</tr>
	<tr>
		<th>得意料理は？</th>
		<td>$msmr_02tokuiry</td>
	</tr>
	<tr>
		<th>出場しようと思ったきっかけは?</th>
		<td>$msmr_03kikkake</td>
	</tr>
	<tr>
		<th>自分の自慢できるところ</th>
		<td>$msmr_04jiman</td>
	</tr>
	<tr>
		<th>昨年のMsMrより可愛いかっこいいと思う?</th>
		<td>$msmr_05sakunen</td>
	</tr>
	<tr>
		<th>好きなタイプは?</th>
		<td>$msmr_06type</td>
	</tr>
	<tr>
		<th>どんなデートがしたい?</th>
		<td>$msmr_07date</td>
	</tr>
</table>

<a class="bk" onclick="history.back(1)" href="/?attr=boku">←前に戻る</a>
<br><br><br><br><br><br><br><br><br><br>

<a class="bc" onclick="if(confirm('本当に投票しますか？\\n一度投票するとやり直すことは出来ません。\\n\\n\\n※公正公平な投票にするため，不正な投票は固く禁じられています。\\nもし不正行為が見つかった場合は，あなたにアクセス禁止の措置がかけられます。')){waku.location='voteFunctionController.php?memberID=$memberID&userprivkey=$userID_0';}" href="#">この人に投票する！</a>

EOM;

    		break;
    }





?>



<?=$result2;?>

<iframe name="waku" style="visibility: hidden;" width="1" height="1"></iframe>