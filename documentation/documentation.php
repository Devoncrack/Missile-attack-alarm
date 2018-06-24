<!DOCTYPE html>
<html lang="en-CA">
<head>
  <!-- prevents compatibility view -->
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- specifies the character encoding for the document --> 
      <meta charset="utf-8" />
  <!-- specifies the base URL/target for all relative URLs -->        
      <base href="https://www.grifare.net/examples/jokes/missile-alert/" />
<title>Armagan TEKDONER - Studio Gri Fare | Missile Alert Joke DOCUMENTATION</title>
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
  <style>
  article{
	  width: 80%;
	  margin: auto;
  }
  </style>
</head>
<body>
<article>
<a rel="license" href="http://creativecommons.org/licenses/by/4.0/"><img alt="Creative Commons Licence" style="border-width:0" src="https://i.creativecommons.org/l/by/4.0/88x31.png" /></a><br />This work is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by/4.0/">Creative Commons Attribution 4.0 International License</a>.
<h1>Nothing here is actually copyrighted</h1>
<p>It is UNCONDITIONALLY free to use everything I created. However, although they are free to use as well, I cannot license those listed as third-party artworks.</p>

  <section>
  <h2>The following files provide detailed information about every aspect of this study</h2>
  <ul>
  <li><a href="documentation/MissileAlertJoke-RequirementsDocument-ArmaganTekdoner-February2018.pdf">Product Requirements and Specifications</a> document explains what this study is intended for</li>
  <li>Quality Assurance shows the results of the white-box testing (<a href="documentation/MissileAlertJoke-UserAcceptanceTesting-ArmaganTekdoner-February2018.pdf">user acceptance testing</a>) conducted, along with the test cases</li>
  <li><a href="documentation/licences-credits.txt" rel="license">Credits</a> file lists the authors of the third-party artworks used</li>
  </ul>
  </section>
  <section>
  <h2>Criteria</h2>
  <p>Create an app that</p>
    <ol>
       <li>displays a deadline in hours, minutes, and seconds in user’s local time. The deadline will not be updated on events. That means it will remain the same even if the user refreshes the page or navigates back and forth within the app;</li>
       <li>incorporates a minutes-seconds countdown clock that reaches zero at the displayed deadline, in local time. The countdown process will not be updated on events. That means it should keep counting down without ever going back to its original value, even if the user refreshes the page or navigates back and forth within the app;</li>
       <li>provides interactive features to do something before the given deadlines reached. However, buttons should not trigger events unless certain conditions are met;</li>
       <li>displays user geolocation;</li>
       <li>emails data to the author about usage statistics;</li>
       <li>has a story with alternative endings; and</li>
       <li>is entertaining</li>
    </ol>
  </section>
  <aside>
  <h3>Please note that</h3>
  <ul>
    <li>this app has no database connection</li>
    <li>session variables expire once the browser is closed</li>
    <li>for statistical purposes, auto-generated emails are sent to me each time a page is visited</li>
    <li>of course, Google and the like track every breath we take on the Net and this app is no exception</li>
  </ul>
  </aside>
<br />
Have fun and try to break the app!
<br />
Sincerely,
<br />
Armagan Tekdoner, Web Developer
<br />
a at grifare dot info
</article>
<?php 
include_once ('../../../geoplugin.class.php');
$geoplugin = new geoPlugin();
$geoplugin->locate();
?>
<?php
/* Armagan is emailed each time the show is viewed */
$message = "Missile Alert app DOCUMENTATION page opened from {$geoplugin->city} / {$geoplugin->countryName}";
//include_once "../system/mailer.php";
?>
</body>
</html>
