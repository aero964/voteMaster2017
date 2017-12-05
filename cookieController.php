<?php


/*
 このプログラムは必ず読み込ませておいて下さい。

## strtotime関数で翌日0:00:00(正確には本日23:59:59)の日付と時刻を取得。
## たいていのブラウザでJST-9(GMT)で記録されるが，正常に動作するので問題なさそう。

*/


$tomorrow 		    = 	strtotime('tomorrow');

$ua 	  		    = 	$_SERVER['HTTP_USER_AGENT'];
$ip 	  		    = 	$_SERVER['REMOTE_ADDR'];
$ip0                =   ip2long($ip);

$userID_0 		    = 	$_COOKIE["HK17PublicUserID"];

if( isset( $userID_0 ) ) {
    $cookieinfo = true;

    // クーポン制御

    $couponController   =   $_COOKIE["HK17CouponHash"];


    if( isset( $couponController ) ){
        switch ( $couponController ) {
            case 'JIZEN1069':
                # code...
            setcookie("HK17CouponExpiration", 4, $tomorrow,'/');
            break;
            case 'HKA171106JT':
                # code...
            setcookie("HK17CouponExpiration", 65536, $tomorrow,'/');
                break;
            default:
                # code...
            setcookie("HK17CouponExpiration", 1, $tomorrow,'/');
                break;
        }
    }

    // クーポン制御


}else {
    # echo '要素は空なので新しく生成します<br><br>';
    setcookie("HK17PublicUserID", md5( uniqid( mt_rand() , true ) ), time()+365*365*365,'/');

    # とりあえず作っておく
    setcookie("HK17Voted_ms",		  0, $tomorrow,'/');
    setcookie("HK17Voted_mr",		  0, $tomorrow,'/');
    setcookie("HK17Voted_hidems",	  0, $tomorrow,'/');
    setcookie("HK17Voted_hidemr",	  0, $tomorrow,'/');
    setcookie("HK17Voted_karaoke",	  0, $tomorrow,'/');
    setcookie("HK17Voted_kouyasai0",  0, $tomorrow,'/');
    setcookie("HK17Voted_kouyasai1",  0, $tomorrow,'/');
    setcookie("HK17Voted_reserved0",  0, $tomorrow,'/');
    setcookie("HK17Voted_reserved1",  0, $tomorrow,'/');
    setcookie("HK17Voted_reserved2",  0, $tomorrow,'/');
    setcookie("HK17Voted_reserved3",  0, $tomorrow,'/');
    # echo '生成しました。ブラウザを更新すれば結果が表示されます。';

    # クーポン
    setcookie("HK17CouponHash",       0, time()+365*365*365,'/');
    //setcookie("HK17CouponExpiration", 1, $tomorrow,'/');

    $userID_0       = "null";
}






if(!isset($_COOKIE["HK17Voted_ms"])){
	setcookie("HK17Voted_ms",		  0, $tomorrow,'/');
    setcookie("HK17Voted_mr",		  0, $tomorrow,'/');
    setcookie("HK17Voted_hidems",	  0, $tomorrow,'/');
    setcookie("HK17Voted_hidemr",	  0, $tomorrow,'/');
    setcookie("HK17Voted_karaoke",	  0, $tomorrow,'/');
    setcookie("HK17Voted_kouyasai0",  0, $tomorrow,'/');
    setcookie("HK17Voted_kouyasai1",  0, $tomorrow,'/');
    setcookie("HK17Voted_reserved0",  0, $tomorrow,'/');
    setcookie("HK17Voted_reserved1",  0, $tomorrow,'/');
    setcookie("HK17Voted_reserved2",  0, $tomorrow,'/');
    setcookie("HK17Voted_reserved3",  0, $tomorrow,'/');
}




$cv_ms          =    $_COOKIE["HK17Voted_ms"];
$cv_mr          =    $_COOKIE["HK17Voted_mr"];
$cv_hidems      =    $_COOKIE["HK17Voted_hidems"];
$cv_hidemr      =    $_COOKIE["HK17Voted_hidemr"];
$cv_karaoke     =    $_COOKIE["HK17Voted_karaoke"];

$cexp           =    $_COOKIE["HK17CouponExpiration"];