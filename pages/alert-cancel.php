<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en-CA">
<?php require_once "head.inc"; ?>
</head>
<body>
<?php
/* page can only be requsted after missile-alert page visited */
if ( $_SESSION["welcome2"] == false ){
	header("Location: https://www.grifare.net/examples/jokes/missile-alert/index");
	exit;
}
/* redirections to originating pages to practically disable back and forth navigation */
if ( $_SESSION["cancelHacked"] == true ){
	header("Location: https://www.grifare.net/examples/jokes/missile-alert/pages/cancel-hacked");
	exit;
}
$_SESSION["welcome3"] = true;
?>
<?php 
include_once ('../../../geoplugin.class.php');
$geoplugin = new geoPlugin();
$geoplugin->locate();
?>
<section>
<h1>FALSE ALARM Issued</h1>
<figure>
<img src="images/no_face_by_lemmino.png" alt="Negative Face" />
</figure>
<p>"BALLISTIC MISSILE THREAT INBOUND TO <strong><?php echo "{$geoplugin->city} / {$geoplugin->countryName}"; ?></strong>.
<br />SEEK IMMEDIATE SHELTER. THIS IS NOT A DRILL."</p>
  <!-- content -->
  <section>
    <h2>You are screwed.<br />Messages are still being sent as displayed above.</h2>
    <form autocomplete="off" method="post" action="pages/cancel-hacked">
      <input type="checkbox" name="understand" id="understand" required />
      <label for="understand">I understand that some trigger-happy officer will come running like a horse if I do not cancel this thing now and my body will be photographed with machetes in both hands</label>
      <br />      
      <input type="submit" value="CANCEL the Alert NOW" title="Do it fast!" />
    </form>
  </section>
  <!-- /h2 -->
</section>
<!-- /h1 -->
<?php
/* Armagan is emailed each time the show is viewed */
$message = "Missile Alert app ALERT CANCEL page opened from {$geoplugin->city} / {$geoplugin->countryName}";
include_once "../system/mailer.php";
?>
<?php require_once "footer.inc"; ?>