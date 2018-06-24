// JavaScript Document
/* if page is refreshed after the show ends */
if( sessionStorage.getItem( "missileAlreadyHit" ) == "yesItDid" ){
window.location="https://www.grifare.net/examples/jokes/missile-alert/pages/missile-already-hit.min.html";// end of show
}

var summaryViewed;
var promptSurvived;

/* prevents the same code from appearing on back button */
if(!!window.performance && window.performance.navigation.type == 2){
    window.location.reload();
}

/* loads redirection to hacked page function */
if ( window.location.pathname == "/examples/jokes/missile-alert/pages/alert-cancel" ){
  window.onload = function() {
    redirectTocancelHacked();
  };	
}

//disables google cookie
//window['ga-disable-UA-76285604-1'] = true;
 
$(document).ready(function(){
/* events at the ending ------------------------------------------------ */
/* cancel-hacked page */
if ( window.location.pathname == "/examples/jokes/missile-alert/pages/cancel-hacked" ){
	setTimeout(function(){
	 $( "#ko_laugh" ).html('<source src="sounds/KoreanLaughter.ogg" type="audio/ogg"><source src="sounds/KoreanLaughter.mp3" type="audio/mpeg">');// korean laughter plays
	  $('body').css( { "background-image":"url('images/Kim-Jong-un.svg')","background-size":"contain","background-repeat":"no-repeat","z-index":"0" } );// inserts Kim
	}, 1000);
	setTimeout(function(){
	  $( "#translation + button" ).css( "visibility","visible" );// translate button appears later
	}, 3500);	
}// close if

/* translation displays on button click */
$("#translation + button").click(function(event) {
   $( "#translation" ).css( "visibility","visible" );// translation appears
	  setTimeout(function(){ 
		$( "#en_laugh" ).html('<source src="sounds/Evillaugh.ogg" type="audio/ogg"><source src="sounds/Evillaugh.mp3" type="audio/mpeg">');// evil English laughter plays
	  }, 2500);// with delay
	  $(this).hide(300);// button disappears
   return;
});
/* END of events at the ending ----------------------------------------- */
/* Impact Time ------------------------------------------------ */
  var timeSet;  
  var impactTime;
  var IMPACT_TIME;// will store hours as string

  timeSet = new Date();
  timeSet.setTime(timeSet.getTime());
	/* advances the timestamp by 4 minutes */  
	timeSet.setMinutes(timeSet.getMinutes() + 3);
	/* advances the timestamp by 40 seconds */  
	timeSet.setSeconds(timeSet.getSeconds() + 20);
	  
  /* converts the numerical format to hh:mm:ss */
  var hours = ('0' + timeSet.getHours()).slice(-2);
  var minutes = ('0' + timeSet.getMinutes()).slice(-2);
  var seconds = ('0' + timeSet.getSeconds()).slice(-2);
  impactTime = hours + ":" + minutes + ":" + seconds;  
  IMPACT_TIME = impactTime.toString(); // converts numbers to text to create fixed time

/* countdown ------------------------------------------------ */
  var count = 0;
  var counter = null;
  window.onload = function() {
    initiateCounter();
  };

  function initiateCounter() {
    /* get count from sessionStorage, or set to initial value of 3 minutes 20 seconds */
    count = getSessionStorage('count') || 200; // makes sure the counter does not start again after a page refresh
	if (count > -1) {	
	  counter = setInterval(timer, 1000); // runs every 1 second
	}
  }// close function initiateCounter

  function timer() {
    count = setSessionStorage('count', count - 1);
	visualTricks();// calls the style-related function
	if ( count < 0 ) {
	/* code to implement when countdown reaches zero
	 * it displays zero only on pages in which no alert is issued
	 * alert issued pages do not display the counters
	 */		
	  clearInterval(counter);// stops count down for all pages
	  /* function works only on the below-specified pages */
		if ( window.location.pathname === "/examples/jokes/missile-alert/index" || window.location.pathname === "/examples/jokes/missile-alert/pages/missile-alert" ){
		  sessionStorage.setItem( "missileAlreadyHit","yesItDid" );// stores end of show reached			
		  missileHits();// end of show version1
		}// close inner if	  
	}// close outer if

    var secondsLeft = count % 60;
    var minutesLeft = Math.floor(count / 60);
    minutesLeft %= 60;
    /* displays the counter */
    document.querySelector("aside span:nth-of-type(1)").innerHTML = "Time to Impact: " + minutesLeft +  ":"   + ('0' + secondsLeft).slice(-2);
  }// close function timer
  
  function setSessionStorage(key, val) {
    if (window.sessionStorage) {
      window.sessionStorage.setItem(key, val);
    }
    return val;
  }

  function getSessionStorage(key) {
    return window.sessionStorage ? window.sessionStorage.getItem(key) : '';
  }
	
  if ( sessionStorage.getItem("fixedTime") == null ){
	  document.querySelector("aside span:nth-of-type(2)").innerHTML = "Impact Time: "+IMPACT_TIME;
	  sessionStorage.setItem("fixedTime", IMPACT_TIME);
  }else{
	  document.querySelector("aside span:nth-of-type(2)").innerHTML = "Impact Time: "+sessionStorage.getItem("fixedTime");
  }	  	  

/* STYLE  ------------------------------------------- */
  function visualTricks(){
			function blinkThem(){ //blinking elements
			  $('h1,figure>img').fadeOut(700);
			  $('h1,figure>img').fadeIn(2300);
			}
			if (count <= 197 ) {
			setInterval(blinkThem, 3000);
			}
			
			/* replaces nuclear clipart with NK clipart */
			if (count <= 180 && window.location.pathname != "/examples/jokes/missile-alert/pages/alert-cancel" ) {
			$('figure>img').attr( "src","images/Roundel_of_North_Korea.png" );
			}
			
			/* starts rotating NK clipart - codes are in CSS file */	
			if (count <= 172  && window.location.pathname != "/examples/jokes/missile-alert/pages/alert-cancel" ) {
			  $('figure>img').attr( "id","roundel");
			}
  }// close function visualTricks
/* STYLE ends---------------------------------------- */
/* FRONT-END validations ---------------------------- */
	/* index page */
	$("details").click(function(){
	  summaryViewed = true;
	});
		
	function validationGroup1(){
		/* regex for 8-digit-and-letter captcha stored in a variable */
		var enteredCaptcha = /[a-zA-Z0-9]{8}/;
		/* captcha validation with warning */
		if( !enteredCaptcha.test( $("#user_input").val() )){
			$( "label[for='user_input']" ).css( "color","#cc0000");
			return false;
		}		
		/* checkbox validation with warning */
		if( !$("#agree").is(":checked") ) {
			$( "label[for='agree']" ).text( "Check the checkbox, check the checkbox" ).css( {"color":"#cc0000","background-color":"rgba(255,255,255,0.7)"} );
			return false;
		}
		/* summary read validation */
		if( summaryViewed != true ) {
			$( "label[for='agree']" ).text( "You liar, you did not even open the terms and conditions." ).css( {"color":"#cc0000","background-color":"rgba(255,255,255,0.7)"} );
			return false;
		}
		return true;
	}
	$("#issue_alert").on("submit", function (event) {
	  if ( !validationGroup1() ){// if1
			event.preventDefault();// makes sure validations succeed before prompt
	  }// if1 close
	  else// else1 
	  {// if first group of validations ok
		  /* prompt does not restart if missile-alert page has been reached before */
		  if ( promptSurvived != true ){// if2
			  /* stupid prompt */
			  var confirmIssue = prompt("Please type 'yes' to assume such a responsibility that even your grandchildren will suffer its consequences");
			  
			  if( confirmIssue == '' || confirmIssue == null ) {// if4
				  event.preventDefault();
				  $( "input[type='submit']" ).val( "Nice try pal, issue Missile Alert NOW" );
			  }// if4 close
			  				  
			  while( !confirmIssue.match(/^yes$/i) ) { // keeps prompting until getting yes
				  event.preventDefault();
				  confirmIssue = prompt("Please type 'yes' to save lives that may or may not be in danger");
			  }// close while
			  
			  if( confirmIssue.match(/^yes$/i) ) {// if yes ok		  				  
				  $(this).unbind('submit').submit();// form submitted
			  }// else if close		
	  
		  }// if2 close
		  else// else2
		  {// if prompt already survived
				$("#issue_alert").unbind('submit').submit();// form submitted
		  }// else2 close
	  }// else1 close
	});// close on submit 
/* events at the ending ------------------------------------------------ */
  function missileHits(){// end of show, missile hits version
		setInterval(function(){
		/* page imitates monitor disconnection */
			$( "html" ).css( 'background','#040380' );
			$( "html" ).html("No Input Signal").css( {'color':'#ffffff','font-family':'"Lucida Console", Monaco, monospace','font-size':'4vw','text-align':'center','margin-top':'20%'} );
		}, 600);// after a short hesitation
	//return;
  }// close function missileHits()
});// close doc dot ready  

function falseAlarm(){
  setTimeout(function(){ window.location.replace("pages/alert-cancel");}, 6000);
  return;
}

function redirectTocancelHacked(){
	$( "input[type='submit']" ).mouseover( "window.location.replace('cancel-hacked')" );
	return;	
}

/* end of file */