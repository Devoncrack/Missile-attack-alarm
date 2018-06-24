<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en-CA" prefix="og: http://ogp.me/ns#">
<!--
Title:				Missile Alert Joke
URL:				https://www.grifare.net/examples/jokes/missile-alert/index
Author:				Armagan Tekdoner
Author website:		grifare.info
First launched on:	February 2018 
-->
<head>
  <!-- prevents compatibility view -->
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- specifies the character encoding for the document --> 
      <meta charset="utf-8" />
  <!-- specifies the base URL/target for all relative URLs -->        
      <base href="https://www.grifare.net/examples/jokes/missile-alert/" />      
      <title>Armagan TEKDONER - Studio Gri Fare | Missile Alert Joke</title>
<link rel="icon" type="image/x-icon" href="https://www.grifare.info/favicon.ico" />
<link rel="icon" href="https://www.grifare.info/logos/fare-only-180x180.png" sizes="32x32" />
<link rel="icon" href="https://www.grifare.info/logos/fare-only-192x192.png" sizes="192x192" />
<link rel="apple-touch-icon-precomposed" href="https://www.grifare.info/logos/fare-only-180x180.png" />
<meta name="msapplication-TileImage" content="https://www.grifare.info/logos/fare-only-270x270.png" />
    <!--[if lte IE 9]>
    <link rel="shortcut icon" href="https://www.grifare.info/favicon.ico"> 
    <![endif]-->
  <!-- browser renders the width of the page at the width of its own screen -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />                     
  <meta name="description" content="An overzealously-designed user interface joke that unnecessarily validates the input of authorised personnel in case of emergency. Demonstration of pitfalls to avoid, inspired by the Hawaiian false alert issued on January 2018" />
  <meta name="keywords" content="Armagan Tekdoner,Missile Alert Joke,issue missile alert,overzealous validations,session storage,countdown javascript" />
  <meta name="subject" content="Web Development" />
  <meta name="dcterms.rightsHolder" content="Stüdyo Gri Fare" />
  <meta name='yandex-verification' content='6b436cee2fb23859' />
<!-- social media -->
  <!-- facebook and linkedin-->
  <meta property="og:title" content="Armagan TEKDONER - Studio Gri Fare | Missile Alert Joke" />
  <meta property="og:image" content="https://www.grifare.net/examples/jokes/missile-alert/images/missile-alert-screenshot.png" />
  <meta property="og:description" content="An overzealously-designed user interface joke that unnecessarily validates the input of authorised personnel in case of emergency. Demonstration of pitfalls to avoid, inspired by the Hawaiian false alert issued on January 2018" />  
  <meta property="og:url" content="https://www.grifare.net/examples/jokes/missile-alert/index" /> 
  <meta property="og:type" content="website" />  
  <meta property="og:locale" content="en_CA" />
  <!-- twitter -->
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:site" content="@grifare" />
  <meta name="twitter:title" content="Armagan TEKDONER - Studio Gri Fare | Missile Alert Joke" />
  <meta name="twitter:description" content="An overzealously-designed user interface joke that unnecessarily validates the input of authorised personnel in case of emergency. Demonstration of pitfalls to avoid, inspired by the Hawaiian false alert issued on January 2018" />  
  <meta name="twitter:creator" content="@grifare" />
  <meta name="twitter:image:alt" content="Screenshot of Missile Alert Joke app" />   
    <!-- displays one static page for IE6 or earlier versions -->          
    <!--[if lte IE 6]>
      <meta http-equiv="refresh" content="0; url=https://www.grifare.net/info/older-browsers.html" />
    <![endif]-->  
    <!-- helps IE8 and IE7 recognise HTML5 elements AND uses an earlier jQuery version -->
    <!--[if lt IE 9]>
      <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>  
      <script type="text/javascript" src="js/html5shiv.min.js"></script>
      <script type="text/javascript" src="js/selectivizr-min.js"></script>    
    <![endif]-->
  <!-- app-specific stylesheet never cached -->
    <link rel="stylesheet" href="system/missile-alert.css?version=<?php echo rand(000,999); ?>" type="text/css" />
  <!-- jQuery CDN -->    
    <script src="https://code.jquery.com/jquery-2.1.4.min.js" type="text/javascript" integrity="sha256-8WqyJLuWKRBVhxXIL1jBDD7SDxU936oZkCnxQbWwJVw=" crossorigin="anonymous"></script>  
<?php 
/* redirections to originating pages to practically disable back and forth navigation */
if ( $_SESSION["welcome3"] == true && $_SESSION["cancelHacked"] == true ){
	header("Location: https://www.grifare.net/examples/jokes/missile-alert/pages/cancel-hacked");
	exit;
}
if ( $_SESSION["welcome3"] == true ){
	header("Location: https://www.grifare.net/examples/jokes/missile-alert/pages/alert-cancel");
	exit;
}
$_SESSION["welcome"] = true;
?>    
<?php 
  if ($_SESSION["summaryViewed"] == true ){
	/* prevents revalidation of terms and conditions */
	echo "<script>var summaryViewed = true;</script>";
  };
  if ($_SESSION["promptSurvived"] == true ){
	/* prevents stupid prompt */
	echo "<script>var promptSurvived = true;</script>";
  };
?>
  <!-- app-specific js never cached -->    
	<script type="text/javascript" src="system/missile-alert.js?version=<?php echo rand(000,999); ?>"></script>
</head>
<body>
<?php 
include_once ('../../geoplugin.class.php');
$geoplugin = new geoPlugin();
$geoplugin->locate();
?>
<?php
/* Armagan is emailed each time the show is viewed */
$message = "Missile Alert app INDEX page opened from {$geoplugin->city} / {$geoplugin->countryName}";
include_once "system/mailer.php";
?>
<section>
<h1>Inbound Missile to <?php echo "{$geoplugin->city} / {$geoplugin->countryName}"; ?>!</h1>
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
    <h2>Activate Emergency Alert</h2>
    <form id="issue_alert" autocomplete="off" method="post" action="pages/missile-alert">
      <img src="system/captcha.php" alt="captcha" />
      <label for="user_input">Text on the left: <input type="text" name="user_input" id="user_input" maxlength="8" size="8" pattern="[a-zA-Z0-9]{8}" autofocus required /></label>
      <br />
      <input type="checkbox" name="agree" id="agree" />
      <label for="agree">I acknowledge that I have read the legalese inside terms and conditions, understand, and accept all the consequences</label>
      <input type="submit" value="Issue Missile Alert Now" title="Be cautious and carefully hit the button! You are about to cause chaos!" />
    </form>            
    <details>
      <summary>Terms and Conditions</summary>
      <small>In case of no inbound missile, I, the button-pusher, will be the scapegoat to compensate the whole world for the inconvenience caused. This means that I can be jailed, all my assets can be seized, and the arm by which I clicked the button may be cut off. Even if the missile arrives but misses, I will be held responsible. If the missile hits but has no warhead, I will clean up the scene.
      <br />As if I am here to read your never-ending gibberish, I have carefully read this <a href="documentation/legal-ipsum.html">document</a> as well.</small>
    </details>
  </section>
  <!-- /h2 -->
</section>
<!-- /h1 -->
<?php require_once "pages/footer.inc"; ?>