<?php

/**************************************************************************************************
| Software Name        : Ravan Scripts Online Mafia Game
| Software Author      : Ravan Soft Tech
| Software Version     : Version 2.0.1 Build 2101
| Website              : http://www.ravan.info/
| E-mail               : support@ravan.info
|**************************************************************************************************
| The source files are subject to the Ravan Scripts End-User License Agreement included in License Agreement.html
| The files in the package must not be distributed in whole or significant part.
| All code is copyrighted unless otherwise advised.
| Do Not Remove Powered By Ravan Scripts without permission .         
|**************************************************************************************************
| Copyright (c) 2010 Ravan Scripts . All rights reserved.
|**************************************************************************************************/

require "core.php";

if(file_exists("install.php"))
{
die("<p><strong><font color='#ff0000'>Warning ! </font></strong></p>
<p>For security reasons you have to delete install.php before accessing this page !</p>
<p>Please delete or rename install.php file and try again !</p>");
} 

$IP = $IP = $_SERVER['REMOTE_ADDR'];

if(file_exists('ipbans/'.$IP))
{
die("<b><font color=red size=+1>$ipban</font></b></body></html>");
}
$year=date('Y');


?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<style>
.button {
   border-top: 1px solid #ffffff;
   background: #000000;
   background: -webkit-gradient(linear, left top, left bottom, from(#9c3e3e), to(#000000));
   background: -webkit-linear-gradient(top, #9c3e3e, #000000);
   background: -moz-linear-gradient(top, #9c3e3e, #000000);
   background: -ms-linear-gradient(top, #9c3e3e, #000000);
   background: -o-linear-gradient(top, #9c3e3e, #000000);
   padding: 11.5px 23px;
   -webkit-border-radius: 40px;
   -moz-border-radius: 40px;
   border-radius: 40px;
   -webkit-box-shadow: rgba(0,0,0,1) 0 1px 0;
   -moz-box-shadow: rgba(0,0,0,1) 0 1px 0;
   box-shadow: rgba(0,0,0,1) 0 1px 0;
   text-shadow: rgba(0,0,0,.4) 0 1px 0;
   color: white;
   font-size: 16px;
   font-family: 'Lucida Grande', Helvetica, Arial, Sans-Serif;
   text-decoration: none;
   vertical-align: middle;
   }
.button:hover {
   border-top-color: white;
   background: black;
   color: red;
   }
.button:active {
   border-top-color: #000000;
   background: #000000;
   }
   </style>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
<title><?php echo "{$set['game_name']} - $metal"; ?></title>
<meta name="keywords" content="RPG, Online Games, Online Mafia Game, Text based mafia rpg, mafia rpg, text based rpg" />
<meta name="description" content=" {$set['game_name']} - Text Based Mafia RPG" />
<meta name="author" content="Roach " />
<meta name="copyright" content="Copyright {$_SERVER['HTTP_HOST']} " />
<link rel="SHORTCUT ICON" href="favicon.ico" />
<link rel="stylesheet" href="css/stylenew.css" type="text/css" />
<link rel='stylesheet' href='css/lightbox.css' type='text/css' media='screen' />
<script type="text/javascript" src="js/prototype.js"></script>
<script type="text/javascript" src="js/scriptaculous.js?load=effects,builder"></script>
<script type="text/javascript" src="js/lightbox.js"></script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-50235462-3', 'auto');
  ga('send', 'pageview');

</script>

</head>
<body>
<div id="pagecontainer">
<!-- Header Part Starts -->
<div class="headerpart">
<div ></div>
<div class="toplist">          

</div>
</div>
<!--<script language="JavaScript" type="text/javascript">
function countd(){
var wesinurodz= new Date("10/15/2009 13:30:00");
var wesinnow = new Date();
var wesinile = wesinurodz.getTime() - wesinnow.getTime();
var nday = Math.floor(wesinile / 86400000);
if(nday<=0){nday=0;}
var nhor = Math.floor((wesinile-nday*86400000)/3600000);
if(nhor<=0){nhor=0;}
var nmin = Math.floor((wesinile-nday*86400000-nhor*3600000)/60000);
if(nmin<=0){nmin=0;}
var nsec = Math.floor((wesinile-nday*86400000-nhor*3600000-nmin*60000)/1000);
if(nsec<=0){nsec=0;}
var ttttt = nday+' days '+nhor+' hours '+nmin+' minutes '+nsec+' seconds';
document.getElementById('countdown').innerHTML = ttttt;  
}
setInterval("countd()",200);
</script>
-->



<script type="text/javascript">
<!--
function MM_swapImgRestore() { //v3.0
var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
function MM_nbGroup(event, grpName) { //v6.0
var i,img,nbArr,args=MM_nbGroup.arguments;
if (event == "init" && args.length > 2) {
if ((img = MM_findObj(args[2])) != null && !img.MM_init) {
img.MM_init = true; img.MM_up = args[3]; img.MM_dn = img.src;
if ((nbArr = document[grpName]) == null) nbArr = document[grpName] = new Array();
nbArr[nbArr.length] = img;
for (i=4; i < args.length-1; i+=2) if ((img = MM_findObj(args[i])) != null) {
if (!img.MM_up) img.MM_up = img.src;
img.src = img.MM_dn = args[i+1];
nbArr[nbArr.length] = img;
} }
} else if (event == "over") {
document.MM_nbOver = nbArr = new Array();
for (i=1; i < args.length-1; i+=3) if ((img = MM_findObj(args[i])) != null) {
if (!img.MM_up) img.MM_up = img.src;
img.src = (img.MM_dn && args[i+2]) ? args[i+2] : ((args[i+1])? args[i+1] : img.MM_up);
nbArr[nbArr.length] = img;
}
} else if (event == "out" ) {
for (i=0; i < document.MM_nbOver.length; i++) {
img = document.MM_nbOver[i]; img.src = (img.MM_dn) ? img.MM_dn : img.MM_up; }
} else if (event == "down") {
nbArr = document[grpName];
if (nbArr)
for (i=0; i < nbArr.length; i++) { img=nbArr[i]; img.src = img.MM_up; img.MM_dn = 0; }
document[grpName] = nbArr = new Array();
for (i=2; i < args.length-1; i+=2) if ((img = MM_findObj(args[i])) != null) {
if (!img.MM_up) img.MM_up = img.src;
img.src = img.MM_dn = (args[i+1])? args[i+1] : img.MM_up;
nbArr[nbArr.length] = img;
} }
}

  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-50235462-3', 'auto');
  ga('send', 'pageview');

//-->

</script>






<!-- //Header Part End -->        
<!-- Flash Part Starts -->
<center>
<a href="http://rpaintdead.com"/><img src="images/logo.png"/></a>
</center>

<!-- Menu Part Starts -->

    


<div class="menu">
<ul>
<li class="home_active"><a href="login.php" title="Home">&nbsp;</a></li>
<li class="story"><a href="story.php" title="The Story">&nbsp;</a></li>
<li class="contact"><a href="contact.php" title="Contact Us">&nbsp;</a></li>
<li class="signup"><a href="signup.php" title="Sign Up">&nbsp;</a></li>
</ul>            
</div>



<!-- Menu Part End -->
<!-- Center Part Starts -->
<div class="centerpart">
<div class="column1">                    
<div class="col1_top"><img src="images/col1_top.gif" alt="" /></div>

<div class="welpart">
<div class="column1_left">
<?php

$stmt_ann = $db->query("SELECT * FROM announcements ORDER BY a_time DESC LIMIT 10;");

// Announcements \\

echo "<table border='1' class ='table'>";
echo "  <tr class='info'>";
echo "      <td>Time</td>";
echo "      <td>Announcement</td>";
echo "  </tr>";


for($i = 0; $i < 10; $i++){
$row = mysql_fetch_array($stmt_ann);
echo "  <tr>";
echo "      <td>".date('F j Y, g:i:s a', $row['a_time'])."</td>";
echo "      <td>".$row['a_text']."</td>";
echo "  </tr>";
}
echo "</table>";


 ?>

<script type="text/javascript">
(function() {
var s=document.createElement('script');s.type='text/javascript';s.async = true;
s.src='http://s1.smartaddon.com/share_addon.js';
var j =document.getElementsByTagName('script')[0];j.parentNode.insertBefore(s,j);
})();
</script>

</div>
<div class="column1_right">
                        
</div>
</div>         
           

<div class="col1_btm"><img src="images/col1_btm.jpg" alt="Bottom" /></div>                                
</div>

<div class="column2">
<form method="post" action="authenticate.php" name="loginform" id="loginform">

<p>Username :<span></span>Password :</p>
<div class="formpart">
<div class="uname_box"><input type="text" name="username" id="uname" /></div>
<div class="uname_box"><input type="password" name="password" id="upass" style="margin-left:7px;"/></div>
<div class="loginbtn"><input type="submit" value="Login" title="Login" /></div>            



</div>


<div class="userchoice">
<div class="server">
</div>
<div class="forgot_txt"><input type="checkbox" name="remember" value="1" > Remember &nbsp; <a href="forgot.php" title="Forgot password ?">Forgot password ?</a></div>

</div>
</form>


<div class="redbg">
<div class="red_txt1">Total Gangsters:&nbsp;&nbsp;<span> <?php echo $membs; ?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Online Now: <span><?php echo $online; ?></span>&nbsp;</div> 
<table width='180' border='0' cellspacing='0' cellpadding='0'>
<tr>&nbsp;&nbsp;
<style type='text/css'>
.style1 {
text-align: center;
}
</style>

<div class='style1'>
<h3><u><?php echo $gameinfo; ?></h3></u><br>
<?php echo $players; echo $membs; ?> <br>
<?php echo $mal; echo $male; ?> <br>
<?php echo $fems; echo $fem; ?></div> <br /></td></tr>
</table> <br/>      <br>
<div align="center"><a href="signup.php" ><button class="button">Create a FREE account!</button></a><br />
</div> </div> </div> </div></div>        
</div>
<div class="clear">
</div>

<?php

include "lfooter.php";

?>

