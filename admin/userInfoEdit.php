
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



if($result){


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

    $attr				= substr($memberID , 0, 2);


// プルダウンボックス
if($availability == 0){
	$pdb999 = 1;
}else if($availability == 10 || $availability == 11){
	$shimekiri = " disabled";
}else{
	$pdb999 = 0;
}



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
	<th>現在の内容</th>
	<th>変更先</th>
</tr>
<tr>
	<th>氏名</th>
	<td class="now">$name</td>
	<td><input type="text" name="name" value="$name" size="20" /></td>
</tr>
<tr>
	<th>ふりがな</th>
	<td class="now">$furigana</td>
	<td><input type="text" name="furigana" value="$furigana" size="20" /></td>
</tr>
<tr>
	<th>学年</th>
	<td class="now">$gakunen</td>
	<td><input type="text" name="gakunen" value="$gakunen" size="5" /></td>
</tr>
<tr>
	<th>学部</th>
	<td class="now">$gakubu</td>
	<td>
		<select name="gakubu">
			<option value="$gakubu" selected>$gakubu</option>
			<option value="総合管理学部総合管理学科">総合管理学部総合管理学科</option>
			<option value="文学部日本語日本文学科">文学部日本語日本文学科</option>
			<option value="文学部英語英米文学科">文学部英語英米文学科</option>
			<option value="環境共生学部環境資源学科">環境共生学部環境資源学科</option>
			<option value="環境共生学部居住環境学科">環境共生学部居住環境学科</option>
			<option value="環境共生学部食健康科学科">環境共生学部食健康科学科</option>
		</select>

	</td>
</tr>
<tr>
	<th>[MsMr]高校時代のエピソード</th>
	<td class="now">$msmr_01koukouep</td>
	<td><textarea name="msmr_01koukouep">$msmr_01koukouep</textarea></td>
</tr>
<tr>
    <th>[MsMr]得意料理は？</th>
    <td class="now">$msmr_02tokuiry</td>
    <td><textarea name="msmr_02tokuiry">$msmr_02tokuiry</textarea></td>
</tr>
<tr>
    <th>[MsMr]出場しようと思ったきっかけは?</th>
    <td class="now">$msmr_03kikkake</td>
    <td><textarea name="msmr_03kikkake">$msmr_03kikkake</textarea></td>
</tr>
<tr>
    <th>[MsMr]自分の自慢できるところ</th>
    <td class="now">$msmr_04jiman</td>
    <td><textarea name="msmr_04jiman">$msmr_04jiman</textarea></td>
</tr>
<tr>
    <th>[MsMr]昨年のMsMrより可愛いかっこいいと思う?</th>
    <td class="now">$msmr_05sakunen</td>
    <td><textarea name="msmr_05sakunen">$msmr_05sakunen</textarea></td>
</tr>
<tr>
    <th>[MsMr]好きなタイプは?</th>
    <td class="now">$msmr_06type</td>
    <td><textarea name="msmr_06type">$msmr_06type</textarea></td>
</tr>
<tr>
    <th>[MsMr]どんなデートがしたい?</th>
    <td class="now">$msmr_07date</td>
    <td><textarea name="msmr_07date">$msmr_07date</textarea></td>
</tr>
<tr>
    <th>[カラオケ]コメント</th>
    <td class="now">$krok_comment</td>
    <td><textarea name="krok_comment">$krok_comment</textarea></td>
</tr>
<tr>
    <th>メンバーの表示(1)／非表示(0)</th>
    <td class="now">$availability</td>
    <td>
    	<select name="availability"$shimekiri>
    		<option value="$availability" selected>$availability</option>
    		<option value="{$pdb999}">{$pdb999}</option>
    	</select>
    </td>
</tr>
<tr>
    <th>現在のポイント数</th>
    <td class="now">$point</td>
    <td><input type="text" name="point" value="$point" size="5" disabled/></td>
</tr>
</table>
<br><br>
<p>※公正公平な投票結果にするため，ポイントの変更は許可していません。</p>
<input class="button" type="submit" value="上記の内容で編集を実行する（一度クリックすると元に戻せません！！！）" /> <br><br>
<input class="button" type="button" value="前のページに戻る" onclick="history.back(-1);" /><br><br>
<input class="button" type="button" value="最新の情報に更新" onclick="location.reload(true);" />
</form>

EOM;


  }
}

$mysqli->close();


$result2 		.= "</table>".PHP_EOL;

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
	}

	.mb_11{
		background-color: #42f4b9;
	}
</style>


<?=$result2;?>