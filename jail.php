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

include "globals.php";
print "


<div class='generalinfo_txt'>
<div><img src='images/info_left.jpg' alt='' /></div>
<div class='info_mid'><h2 style='padding-top:10px;'> White Widow Detainment Facility </h2></div>
<div><img src='images/info_right.jpg' alt='' /></div> </div>
<div class='generalinfo_simple'><br> <br><br>
<table class='tablee'><tr><td><center><img src='http://scrapetv.com/News/News%20Pages/Business/images-5/big-prison.jpg' /></td></tr></table><br>



<table width='80%' class=\"table\" border=\"0\" cellspacing=\"1\"><tr bgcolor=gray><th>Name</th> <th>Level</th> <th>Time</th><th>Reason</th> <th>Actions</th></tr>";
$q=$db->query("SELECT u.*,c.* FROM users u LEFT JOIN gangs c ON u.gang=c.gangID WHERE u.jail > 0 ORDER BY u.jail DESC");
while($r=$db->fetch_row($q))
{
print "\n<tr><td>{$r['gangPREFIX']} <a href='viewuser.php?u={$r['userid']}'>{$r['username']}</a> [{$r['userid']}]</td><td>{$r['level']}</td><td><div id='{$r['userid']}'></div>
<div id='notifier'></div>
 
<script type='text/javascript'>
 
(function () {
  function display( notifier, str ) {
    document.getElementById(notifier).innerHTML = str;
  }
     
  function toMinuteAndSecond( x ) {
    return Math.floor(x/60) + ':' + (x%60<10?'0':'')+x%60;
  }
     
  function setTimer( remain, actions ) {
    var action;
    (function countdown() {
       display('{$r['userid']}', toMinuteAndSecond(remain));        
       if (action = actions[remain]) {
         action();
       }
       if (remain > 0) {
         remain -= 1;
         setTimeout(arguments.callee, 1000);
       }
    })(); // End countdown
  }
 
  setTimer({$r['jail']}*60, {
     
  });   
})();
 
</script></td><td>{$r['jail_reason']}</td> <td>
[<a href='jailbust.php?ID={$r['userid']}'>Bust</a>]
[<a href='jailbail.php?ID={$r['userid']}'>Bail</a>]
";

// Woo, new feature!
	if($r['userid'] === $_SESSION['userid']){
		echo "
		[<a href='jailbailuser.php?ID={$r['userid']}'>Bail Yourself</a>]
		</td></tr>";
	}
}
print "</table></div><div><img src='images/generalinfo_btm.jpg' alt='' /></div><br></div></div></div></div></div> 
Note: Bailing yourself out of jail costs your level x 2 in Crystals.
";
$h->endpage();
?>
