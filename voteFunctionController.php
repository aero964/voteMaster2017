<?php

include("cookieController.php");
include("./php/mysqli.php");

if(isset($_GET["memberID"]) && isset($_GET["userprivkey"])){
}else{
	die("エラー:URLの構文が間違っています。確認をお願いします。");
}

/*不正投票確認→IPアドレスで弾く*/


if($_SERVER["REMOTE_ADDR"] == "127.128.129.130" || $_SERVER["REMOTE_ADDR"] == "127.126.125.124"){
	die("<script>alert('あなたの端末から不正投票が検知されたため，アクセス禁止の措置が掛けられました。');parent.location.href='/index.php?unfair';</script>");
}

//各種変数の指定

//	$voteattr		=	$_GET["voteattr"];				// 投票機能の属性を指定する変数です。
	$memberID 		=	$_GET["memberID"];				// 投票者のIDを指定する変数です。
	$userip 		=	$_GET["userip"];				// ip2longに変形したユーザのIPアドレスを指定する変数です。
	$userprivkey	=	$_GET["userprivkey"];			// ユーザのプライベートキー(cookieにより生成)を指定する変数です。
	$userprivkey	=	$_GET["userprivkey"];			// ユーザのプライベートキー(UAにより生成)を指定する変数です。



// まずはデータベースから，ユーザのこれまでの投票内容を取得する。

$result = $mysqli->query("SELECT * FROM webUserInformation WHERE userprivkey = '$userprivkey'");

while($row = $result->fetch_object()){

    $couponHash		 = htmlspecialchars($row->couponHash); //インサート用
    $v_ms		 	 = htmlspecialchars($row->v_ms);
    $v_mr		 	 = htmlspecialchars($row->v_mr);
    $v_dms		 	 = htmlspecialchars($row->v_dms);
    $v_hidems		 = htmlspecialchars($row->v_hidems);
    $v_hidemr		 = htmlspecialchars($row->v_hidemr);
    $v_karaoke		 = htmlspecialchars($row->v_karaoke);
    $v_boku			 = htmlspecialchars($row->v_boku);

}


$mysqli->close();


/////////////初回の場合は，そもそもユーザの情報がないので新規インサート

	include("./php/mysqli.php");

	if(!$couponHash){
		$sql = "INSERT INTO webUserInformation (
			userprivkey, IP, UA, couponHash, v_ms, v_mr, v_dms, v_hidems, v_hidemr, v_karaoke, v_boku
		) VALUES (
			'".$userprivkey."', '".$ip."', '".$ua."', 'NORMAL', 0, 0, 0, 0, 0, 0, 0
		)";

		$res = $mysqli->query($sql);
	}

	$mysqli->close();

/////////////初回のインサートここまで。

    $attr			= substr($memberID , 0, 2);

    switch ($attr) {
    	case '11':

    		$calc = $cexp - $cv_ms;
    		if($calc <= 0){
    			echo ("<script>alert('【投票失敗！】\\n投票数の上限を越えています。また明日投票して下さい。');</script>");
    			exit;
    		}else{
    			$pointplusone = $cv_ms + 1;
    			setcookie("HK17Voted_ms",		  $pointplusone, $tomorrow,'/');
    		}

    		break;

    	case '12':

    		$calc = $cexp - $cv_mr;
    		if($calc <= 0){
    			echo ("<script>alert('【投票失敗！】\\n投票数の上限を越えています。また明日投票して下さい。');</script>");
    			exit;
    		}else{
    			$pointplusone = $cv_mr + 1;
    			setcookie("HK17Voted_mr",		  $pointplusone, $tomorrow,'/');
    		}

    		break;

    	case '21':

    		$calc = $cexp - $cv_hidems;
    		if($calc <= 0){
    			echo ("<script>alert('【投票失敗！】\\n投票数の上限を越えています。また明日投票して下さい。');</script>");
    			exit;
    		}else{
    			$pointplusone = $cv_hidems + 1;
    			setcookie("HK17Voted_hidems",	  $pointplusone, $tomorrow,'/');
    		}

    		break;

    	case '22':

    		$calc = $cexp - $cv_hidemr;
    		if($calc <= 0){
    			echo ("<script>alert('【投票失敗！】\\n投票数の上限を越えています。また明日投票して下さい。');</script>");
    			exit;
    		}else{
    			$pointplusone = $cv_hidemr + 1;
    			setcookie("HK17Voted_hidemr",	  $pointplusone, $tomorrow,'/');
    		}

    		break;

    	case '31':

    		$calc = $cexp - $cv_karaoke;
    		if($calc <= 0){
    			echo ("<script>alert('【投票失敗！】\\n投票数の上限を越えています。また明日投票して下さい。');</script>");
    			exit;
    		}else{
    			$pointplusone = $cv_karaoke + 1;
    			setcookie("HK17Voted_karaoke",	  $pointplusone, $tomorrow,'/');
    		}

    		break;

    	default:

    		die("エラー");

    		break;
    }


/////////////////////////////////////////////投票実行/////////////////////////////////////////////////////////

include("./php/mysqli.php");

$exec 	= $mysqli->query("UPDATE voteMaster SET `point` = `point` + 1 WHERE memberID = $memberID");


 $a = fopen("./log/sql_update.log", "a");
 @fwrite($a, "新しく投票を受け付けました！>>>投票対象者:".$memberID."/ IPアドレス:".$ip."/ ユーザエージェント:".$ua."/ ユーザプライベートキー:".$userprivkey.PHP_EOL);
 fclose($a);




$mysqli->close();

//var_dump($exec);

print("<script>alert('【投票成功】\\n\\n投票を受けつけました！\\nありがとうございました！！！');parent.location.href='index.php';</script>");