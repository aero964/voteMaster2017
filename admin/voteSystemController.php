<div align=center>
	<h1>本当に投票を締め切りますか？</h1>
	<h1 style="color:red">この作業を行った場合，取り消すことは出来ません。<br>ユーザーからの投票は受け付けなくなります。</h1>
	<hr>

<?php

$min = 9901;

switch ($_GET["attr"]) {
	case 'ms':
		$execattr = "ms";
		$desc	  = "ミス";

		$min	  = 1101;
		$max	  = 1110;
		break;
	case 'mr':
		$execattr = "mr";
		$desc	  = "ミスター";

		$min	  = 1201;
		$max	  = 1210;
		break;
	case 'hidems':
		$execattr = "hidems";
		$desc	  = "裏ミス";

		$min	  = 2101;
		$max	  = 2110;
		break;
	case 'hidemr':
		$execattr = "hidemr";
		$desc	  = "裏ミスター";

		$min	  = 2201;
		$max	  = 2210;
		break;
	case 'dsm':
		$execattr = "dsm";
		$desc	  = "ドレスショーモデル";

		$min	  = 1901;
		$max	  = 1955;
		break;
	case 'karaoke':
		$execattr = "karaoke";
		$desc	  = "カラオケ";

		$min	  = 3101;
		$max	  = 3160;
		break;
	default:
		$execattr = "boku";
		$desc	  = "謎の人";

		$max	  = 9901;
		break;
}



	include("../php/mysqli.php");
	$check 	= $mysqli->query("SELECT * FROM voteMaster WHERE memberID = $min");
	while($row = $check->fetch_object()){
		$availabilityck	 	= htmlspecialchars($row->availability);
	}

	$mysqli->close();




if($_GET["shimekiri"] == "execute"){

	if($availabilityck == 11 || $availabilityck == 10){
		echo "<h1 style=color:blue>投票は既に締め切られています。</h1><br><br><button onclick=\"location.href='sqltest.php'\"><h2 style=\"width: 300px;\">戻る</h2></button>";
		exit;
	}

	for ($i= $min; $i <= $max; $i++) {

		include("../php/mysqli.php");
		$exec 	= $mysqli->query("UPDATE voteMaster SET availability = availability + 10 WHERE memberID = $i");
		$mysqli->close();
	}



	print("<h1 style=color:blue>投票を締め切りました。</h1>");
	$bd = " disabled";
}

?>

<h2>投票を締め切る属性：<?=$desc?></h2>
<button onclick="location.href='voteSystemController.php?attr=<?=$execattr?>&shimekiri=execute'"<?=$bd?>><h2 style="color:red;width: 300px;">締め切る</h2></button><br><br>
<button onclick="location.href='sqltest.php'"><h2 style="width: 300px;">戻る</h2></button>