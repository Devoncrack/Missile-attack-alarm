<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en-CA">
<?php require_once "head.inc"; ?>
</head>
<body>
<?php
/* redirects direct requests */
if ( $_SESSION["welcome"] == false ){
	header("Location: https://www.grifare.net/examples/jokes/missile-alert/index");
	exit;
}
/* redirections to originating pages to practically disable back and forth navigation */
if ( $_SESSION["welcome3"] == true && $_SESSION["cancelHacked"] == true ){
	header("Location: https://www.grifare.net/examples/jokes/missile-alert/pages/cancel-hacked");
	exit;
}
if ( $_SESSION["welcome3"] == true ){
	header("Location: https://www.grifare.net/examples/jokes/missile-alert/pages/alert-cancel");
	exit;
}
$_SESSION["welcome2"] = true;
/* to prevent revalidation of terms and conditions */
$_SESSION["summaryViewed"] = true;
/* to prevent stupid prompt */	
$_SESSION["promptSurvived"] = true;
?>
<?php 
include_once ('../../../geoplugin.class.php');
$geoplugin = new geoPlugin();
$geoplugin->locate();
?>
<?php
// server-side validations
if( isset($_POST["user_input"]) && $_POST["user_input"]!=="" && isset($_POST["agree"]) && $_POST["agree"]!=="" && ($_SESSION["generated_code"] == $_POST["user_input"]) ) {
/* alert issued */	
?>
<script>falseAlarm();</script>
<section>
<h1>Missile Alert Issued</h1>
<figure>
<img src="images/Nuclear_symbol.png" alt="Nuclear Attack Symbol" />
</figure>
<p>"BALLISTIC MISSILE THREAT INBOUND TO <strong><?php echo "{$geoplugin->city} / {$geoplugin->countryName}"; ?></strong>.
<br />SEEK IMMEDIATE SHELTER. THIS IS NOT A DRILL."</p>

  <!--placeholders for dynamically-created values -->
  <aside>
    <span></span><!-- countdown -->
    <br />
    <span></span><!-- impact time -->
  </aside>
  
  <!-- content -->
  <section>
    <h2>You'd better run!</h2>
    <small>(If no missile arrives, you, the operator, will pay for this.)</small>
  </section>
  <!-- /h2 -->
</section>
<!-- /h1 -->
<?php
/* Armagan is emailed each time the show is viewed */
$message = "Missile Alert app MISSILE ALERT ISSUED page opened from {$geoplugin->city} / {$geoplugin->countryName}";
include_once "../system/mailer.php";
?>
<?php
} else {
/* alert NOT issued */
?>
<section>
<h1>Incorrect Code!</h1>
<figure>
<img src="images/Nuclear_symbol.png" alt="Nuclear Attack Symbol" />
</figure>

  <!--placeholders for dynamically-created values -->
  <aside>
    <span></span><!-- countdown -->
    <br />
    <span></span><!-- impact time -->
  </aside>
  
  <!-- content -->  
  <section>
    <h2>No alert issued and no one knows anything yet. You can still walk away, the inbound missile might miss as well.</h2>
      <p>This was what you entered: <b><?php echo $_POST["user_input"] ?></b></p>
      <p>This was the captcha: <b><?php echo $_SESSION["generated_code"] ?></b></p>

      <form method="post" action="javascript:history.go(-1);">
          <input type="submit" value="Please Try Again!" title="Are you sure??" />
      </form>
  </section>
  <!-- /h2 -->
</section>
<!-- /h1 -->
<?php
/* Armagan is emailed each time the show is viewed */
$message = "Missile Alert app MISSILE ALERT NO ALERT page opened from {$geoplugin->city} / {$geoplugin->countryName}";
include_once "../system/mailer.php";
?>
<?php
}// close if
?>
<?php require_once "footer.inc"; ?>