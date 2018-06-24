<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ko-KP">
<?php require_once "head.inc"; ?>
<?php
/* page can only be requsted after alert-cancel page visited */
if ( $_SESSION["welcome3"] == false ){
	header("Location: https://www.grifare.net/examples/jokes/missile-alert/index");
	exit;
}
$_SESSION["cancelHacked"] = true;
?>      
</head>
<body>
<section>
  <section>
    <h2>귀하의 시스템은 현재 김정은 총사령관의 통제하에 있습니다.</h2>
    <p>발급 한 알림을 취소 할 수 없습니다.</p>
    <p><strong>하하 하하 하하하하</strong></p>
  </section>
  <!-- section displayed on button click -->
  <section id="translation" lang="en">
    <h2>Your system is now under the control of Marshal Kim Jong-un.</h2>
    <p>You will not be allowed to cancel the alert you issued.</p>
    <p><strong>mwa-he-ha-hahaha-ha-ha-ha ha - haa- haaaaaaaaaaaaaaaaaaaaaa</strong></p>
  </section>
  <button type="submit" lang="en" title="mwa-he-ha-hahaha-ha-ha-ha ha - haa- haaaaaaaaaaaaaaaaaaaaaa">Translate from <i>North Korean</i> to <i>American</i></button>
</section>
<!-- /h1 -->
<!-- placeholders for evil laughs in 2 languages -->
<audio id="ko_laugh" autoplay></audio>
<audio id="en_laugh" autoplay></audio>
<?php 
include_once ('../../../geoplugin.class.php');
$geoplugin = new geoPlugin();
$geoplugin->locate();
?>
<?php
/* Armagan is emailed each time the show is viewed */
$message = "Missile Alert app CANCEL HACKED page opened from {$geoplugin->city} / {$geoplugin->countryName}";
include_once "../system/mailer.php";
?>
<?php require_once "footer.inc"; ?>