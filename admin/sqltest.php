<h1>管理ページ</h1>
<p>メンバーの各種情報を編集することが出来ます。IDをクリックすると編集画面に遷移します。<br>※青緑色で塗りつぶされたセルは，投票が締め切りされている物になります。</p>
<p><a href="../">メインページに戻る</a></p>
<hr>



<?php


include("../php/mysqli.php");


	$ms_member 			= "<h3>所属：Ms</h3>[<a href=\"voteSystemController.php?shimekiri=true&attr=ms\">投票締め切り</a>]"							.PHP_EOL."<table>".PHP_EOL."<tr><td>ID</td><th>氏名</th><td>点数</td></tr>".PHP_EOL;
	$mr_member 			= "<h3>所属：Mr</h3>[<a href=\"voteSystemController.php?shimekiri=true&attr=mr\">投票締め切り</a>]"							.PHP_EOL."<table>".PHP_EOL."<tr><td>ID</td><th>氏名</th><td>点数</td></tr>".PHP_EOL;
	$dsm_member 		= "<h3>所属：ドレスショーモデル</h3>[<a href=\"voteSystemController.php?shimekiri=true&attr=dsm\">投票締め切り</a>]"		.PHP_EOL."<table>".PHP_EOL."<tr><td>ID</td><th>氏名</th><td>点数</td></tr>".PHP_EOL;
	$hidems_member 		= "<h3>所属：裏Ms</h3>[<a href=\"voteSystemController.php?shimekiri=true&attr=hidems\">投票締め切り</a>]"					.PHP_EOL."<table>".PHP_EOL."<tr><td>ID</td><th>氏名</th><td>点数</td></tr>".PHP_EOL;
	$hidemr_member 		= "<h3>所属：裏Mr</h3>[<a href=\"voteSystemController.php?shimekiri=true&attr=hidemr\">投票締め切り</a>]"					.PHP_EOL."<table>".PHP_EOL."<tr><td>ID</td><th>氏名</th><td>点数</td></tr>".PHP_EOL;
	$karaoke_member 	= "<h3>所属：カラオケ</h3>[<a href=\"voteSystemController.php?shimekiri=true&attr=karaoke\">投票締め切り</a>]"				.PHP_EOL."<table>".PHP_EOL."<tr><td>ID</td><th>氏名</th><td>点数</td></tr>".PHP_EOL;
	$boku_member 		= "<h3>所属：謎の人</h3>[<a href=\"voteSystemController.php?shimekiri=true&attr=boku\">投票締め切り</a>]"					.PHP_EOL."<table>".PHP_EOL."<tr><td>ID</td><th>氏名</th><td>点数</td></tr>".PHP_EOL;


if(isset($_GET["editmode"])){
	$editid			= $_GET["editmode"];
	$result 		= $mysqli->query("SELECT * FROM voteMaster WHERE memberID = $editid");
	$trcss			= 1;
}else{
	$result 		= $mysqli->query("SELECT * FROM voteMaster");
	$trcss			= 0;
}


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
        $trcss      = "11";
    }else{
    	$trcss 		= "00";
    }

    switch ($attr) {
    	case '11':
    		# code...

    		$ms_member 			.= "<tr class=\"mb_".$trcss."\"><td><a href=\"userInfoEdit.php?editmode=$memberID\">$memberID</a></td> <th>$name($furigana)</th> <td>$point</td> </tr>".PHP_EOL;

    		break;

    	case '12':
    		# code...

    	    $mr_member 			.= "<tr class=\"mb_".$trcss."\"><td><a href=\"userInfoEdit.php?editmode=$memberID\">$memberID</a></td> <th>$name($furigana)</th> <td>$point</td> </tr>".PHP_EOL;

    		break;

    	case '19':
    		# code...

    	    $dsm_member 		.= "<tr class=\"mb_".$trcss."\"><td><a href=\"userInfoEdit.php?editmode=$memberID\">$memberID</a></td> <th>$name($furigana)</th> <td>$point</td> </tr>".PHP_EOL;

    		break;

    	case '21':
    		# code...

    	    $hidems_member 		.= "<tr class=\"mb_".$trcss."\"><td><a href=\"userInfoEdit.php?editmode=$memberID\">$memberID</a></td> <th>$name($furigana)</th> <td>$point</td> </tr>".PHP_EOL;

    		break;

    	case '22':
    		# code...

    	    $hidemr_member 		.= "<tr class=\"mb_".$trcss."\"><td><a href=\"userInfoEdit.php?editmode=$memberID\">$memberID</a></td> <th>$name($furigana)</th> <td>$point</td> </tr>".PHP_EOL;

    		break;

    	case '31':
    		# code...

    	    $karaoke_member 	.= "<tr class=\"mb_".$trcss."\"><td><a href=\"userInfoEdit.php?editmode=$memberID\">$memberID</a></td> <th>$name($furigana)</th> <td>$point</td> </tr>".PHP_EOL;

    		break;

    	default:
    		# code...

    	    $boku_member 		.= "<tr class=\"mb_".$trcss."\"><td><a href=\"userInfoEdit.php?editmode=$memberID\">$memberID</a></td> <th>$name($furigana)</th> <td>$point</td> </tr>".PHP_EOL;

    		break;
    }



  }
}

$mysqli->close();


$ms_member 		.= "</table>".PHP_EOL;
$mr_member 		.= "</table>".PHP_EOL;
$dsm_member 	.= "</table>".PHP_EOL;
$hidems_member  .= "</table>".PHP_EOL;
$hidemr_member 	.= "</table>".PHP_EOL;
$karaoke_member .= "</table>".PHP_EOL;
$boku_member 	.= "</table>".PHP_EOL;

?>


<style type="text/css">
	
	table,tr,td,th{
		border: 1px solid;
	}

	th{
		width: 280px;
		text-align: left;
	}

	.mb_00{
		background-color: #cccccc;
	}

	.mb_10{
		background-color: #42f4b9;
        display: none;
	}

    .mb_11{
        background-color: #42f4b9;
        color: #fb28ff;
        text-decoration: italic;
    }
</style>


<?=$ms_member;?>
<?=$mr_member;?>
<?=$dsm_member;?>
<?=$hidems_member;?>
<?=$hidemr_member;?>
<?=$karaoke_member;?>
<?=$boku_member;?>