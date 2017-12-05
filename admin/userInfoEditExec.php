<?php


include("../php/mysqli.php");


$result2 = <<< EOM

<h3>編集画面</h3>

EOM;


if(isset($_GET["editmode"])){
	$editid				= $_GET["editmode"];
	$result 			= $mysqli->query("SELECT * FROM voteMaster INNER JOIN userComment ON (voteMaster.memberID = userComment.memberID) WHERE voteMaster.memberID = $editid");
	$trcss				= 1;
}else{
	die("引数が正しくありません");
}


if(isset($_GET["editallow"])){
	echo "<h1 style=color:blue;>下記青枠の通り，編集内容を反映しました。間違いがないかご確認下さい。</h1>";
	echo "<style>.now{color:blue;font-weight:bold;}</style>";
}



//if($result){


  while($row = $result->fetch_object()){


    $memberID	 		= htmlspecialchars($row->memberID);
    $point 		 		= htmlspecialchars($row->point);

    $zzname 		 	= htmlspecialchars($row->name);
    $zzfurigana 	 	= htmlspecialchars($row->furigana);
    $zzavailability		= htmlspecialchars($row->availability);

    $zzgakunen			= htmlspecialchars($row->gakunen);
    $zzgakubu			= htmlspecialchars($row->gakubu);
    $zzmsmr_01koukouep	= htmlspecialchars($row->msmr_01koukouep);
    $zzmsmr_02tokuiry	= htmlspecialchars($row->msmr_02tokuiry);
    $zzmsmr_03kikkake	= htmlspecialchars($row->msmr_03kikkake);
    $zzmsmr_04jiman		= htmlspecialchars($row->msmr_04jiman);
    $zzmsmr_05sakunen	= htmlspecialchars($row->msmr_05sakunen);
    $zzmsmr_06type		= htmlspecialchars($row->msmr_06type);
    $zzmsmr_07date		= htmlspecialchars($row->msmr_07date);
    $zzkrok_comment		= htmlspecialchars($row->krok_comment);

  }
//}

$mysqli->close();


///////////////////////////////////////////////////編集実行

	# まずGETの内容取得


	    $name 		 		= $_GET["name"];
	    $furigana 	 		= $_GET["furigana"];
	    $availability		= $_GET["availability"];

	    $gakunen			= $_GET["gakunen"];
	    $gakubu				= $_GET["gakubu"];
	    $msmr_01koukouep	= $_GET["msmr_01koukouep"];
	    $msmr_02tokuiry		= $_GET["msmr_02tokuiry"];
	    $msmr_03kikkake		= $_GET["msmr_03kikkake"];
	    $msmr_04jiman		= $_GET["msmr_04jiman"];
	    $msmr_05sakunen		= $_GET["msmr_05sakunen"];
	    $msmr_06type		= $_GET["msmr_06type"];
	    $msmr_07date		= $_GET["msmr_07date"];
	    $krok_comment		= $_GET["krok_comment"];


	if(isset($name) && isset($furigana) && isset($gakunen) && isset($gakubu) && isset($msmr_01koukouep
	) && isset($msmr_02tokuiry) && isset($msmr_03kikkake) && isset($msmr_04jiman) && isset($msmr_05sakunen) && isset($msmr_06type) && isset($msmr_07date) && isset($krok_comment)){
		//echo "OK";
	}else{
		die("because of some error occurred, this operation was terminated. ");
	}



		include("../php/mysqli.php");

		$exec 			= $mysqli->query("UPDATE voteMaster SET name = '$name', furigana = '$furigana', availability = $availability WHERE memberID = $memberID");
		$exec2 			= $mysqli->query("UPDATE userComment SET gakunen = '$gakunen', gakubu = '$gakubu', msmr_01koukouep = '$msmr_01koukouep', msmr_02tokuiry = '$msmr_02tokuiry', msmr_03kikkake = '$msmr_03kikkake', msmr_04jiman = '$msmr_04jiman', msmr_05sakunen = '$msmr_05sakunen', msmr_06type = '$msmr_06type', msmr_07date = '$msmr_07date' , krok_comment = '$krok_comment' WHERE memberID = $memberID");

		//var_dump($exec);
		$mysqli->close();


	////////////////////////再取得
			include("../php/mysqli.php");
			$exec9 			= $mysqli->query("SELECT * FROM voteMaster INNER JOIN userComment ON (voteMaster.memberID = userComment.memberID) WHERE voteMaster.memberID = $editid");

	  		while($exec99 = $exec9->fetch_object()){
				$xzzname 		 	= htmlspecialchars($exec99->name);
			    $xzzfurigana 	 	= htmlspecialchars($exec99->furigana);
			    $xzzavailability	= htmlspecialchars($exec99->availability);

			    $xzzgakunen			= htmlspecialchars($exec99->gakunen);
			    $xzzgakubu			= htmlspecialchars($exec99->gakubu);
			    $xzzmsmr_01koukouep	= htmlspecialchars($exec99->msmr_01koukouep);
			    $xzzmsmr_02tokuiry	= htmlspecialchars($exec99->msmr_02tokuiry);
			    $xzzmsmr_03kikkake	= htmlspecialchars($exec99->msmr_03kikkake);
			    $xzzmsmr_04jiman	= htmlspecialchars($exec99->msmr_04jiman);
			    $xzzmsmr_05sakunen	= htmlspecialchars($exec99->msmr_05sakunen);
			    $xzzmsmr_06type		= htmlspecialchars($exec99->msmr_06type);
			    $xzzmsmr_07date		= htmlspecialchars($exec99->msmr_07date);
			    $xzzkrok_comment	= htmlspecialchars($exec99->krok_comment);
			}

		    $mysqli->close();
	////////////////////////再取得


///////////////////////////////////////////////////編集実行



$result2 .= <<< EOM

<h4>編集対象</h4>
<p>メンバーID:			<strong>$memberID</strong></p>

<hr>

<form action="userInfoEditExec.php" method="get">

<input type="hidden" name="editmode" value="$editid">
<input type="hidden" name="editallow" value="1">
<table>
<tr>
	<th>項目</th>
	<th>変更前</th>
	<th>変更後</th>
</tr>
<tr>
	<th>氏名</th>
	<td class="old">$zzname</td>
	<td class="now">$xzzname</td>
</tr>
<tr>
	<th>ふりがな</th>
	<td class="old">$zzfurigana</td>
	<td class="now">$xzzfurigana</td>
</tr>
<tr>
	<th>学年</th>
	<td class="old">$zzgakunen</td>
	<td class="now">$xzzgakunen</td>
</tr>
<tr>
	<th>学部</th>
	<td class="old">$zzgakubu</td>
	<td class="now">$xzzgakubu</td>
</tr>
<tr>
	<th>[MsMr]高校時代のエピソード</th>
	<td class="old">$zzmsmr_01koukouep</td>
	<td class="now">$xzzmsmr_01koukouep</td>
</tr>
<tr>
    <th>[MsMr]得意料理は？</th>
    <td class="old">$zzmsmr_02tokuiry</td>
    <td class="now">$xzzmsmr_02tokuiry</td>
</tr>
<tr>
    <th>[MsMr]出場しようと思ったきっかけは?</th>
    <td class="old">$zzmsmr_03kikkake</td>
    <td class="now">$xzzmsmr_03kikkake</td>
</tr>
<tr>
    <th>[MsMr]自分の自慢できるところ</th>
    <td class="old">$zzmsmr_04jiman</td>
    <td class="now">$xzzmsmr_04jiman</td>
</tr>
<tr>
    <th>[MsMr]昨年のMsMrより可愛いかっこいいと思う?</th>
    <td class="old">$zzmsmr_05sakunen</td>
    <td class="now">$xzzmsmr_05sakunen</td>
</tr>
<tr>
    <th>[MsMr]好きなタイプは?</th>
    <td class="old">$zzmsmr_06type</td>
    <td class="now">$xzzmsmr_06type</td>
</tr>
<tr>
    <th>[MsMr]どんなデートがしたい?</th>
    <td class="old">$zzmsmr_07date</td>
    <td class="now">$xzzmsmr_07date</td>
</tr>
<tr>
    <th>[カラオケ]コメント</th>
    <td class="old">$zzkrok_comment</td>
    <td class="now">$xzzkrok_comment</td>
</tr>
<tr>
    <th>メンバーの表示(1)／非表示(0)</th>
    <td class="old">$zzavailability</td>
    <td class="now">$xzzavailability</td>
</tr>
<tr>
    <th>現在のポイント数</th>
    <td class="old">$point</td>
    <td class="now">$point</td>
</tr>
</table>
<br><br>
<p>※公正公平な投票結果にするため，ポイントの変更は許可していません。</p>
<input class="button" type="submit" value="上記の内容で編集を実行する（一度クリックすると元に戻せません！！！）" disabled /><br><br>
<input class="button" type="button" value="前のページに戻る" onclick="history.back(-1);" /><br><br>
<input class="button" type="button" value="最新の情報に更新" onclick="location.reload(true);" />
</form>

EOM;




?>


<style type="text/css">
	

	table,tr,td,th{
		border: 1px solid;
	}

	th,td{
	}

	th{
		text-align: left;
	}

	.button{
		font-size: 18pt;
		font-weight: bold;
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
	}

</style>


<?=$result2;?>
