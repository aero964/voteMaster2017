<?php

//mysqliクラスのオブジェクトを作成
$mysqli = new mysqli('localhost', 'hoge', 'fuga', 'xyzfestival2017');
//エラーが発生したら
if ($mysqli->connect_error){
  print("データベース接続確立エラー:" . $mysqli->connect_error);
  exit();
}

// 文字化け対策 なぜかlatainになり日本語が正常に表示されないため。
if (!$mysqli->set_charset("utf8")) {
    printf("Error loading character set utf8: %s\n", $mysqli->error);
    exit();
} else {
    //printf("Current character set: %s\n", $mysqli->character_set_name());
}