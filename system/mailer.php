<?php
$armagan_mail = "a@grifare.info";
$subject = "Missile Alert";
//to send an html-formatted email these headers are needed, but they can be spoofed as well
$header .= "From:missile@grifare-intelligence.com\n";
$header .= "MIME-Version:1.0\n";
$header .= "Content-type: text/html; charset=us-ascii\n";
// the PHP function that does the mailing job
mail($armagan_mail,$subject,$message,$header);