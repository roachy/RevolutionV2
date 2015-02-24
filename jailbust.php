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
if($ir['energy'] < 10)
{
  die("Sorry, it costs 10 energy to bust someone. You only have {$ir['energy']} energy. Come back later.");
}
if($ir['jail'])
{
 die("<font style='color:red;> You are in Jail! </font>");
}
$_GET['ID']=abs((int) $_GET['ID']);
$r=$db->fetch_row($db->query("SELECT * FROM users WHERE userid={$_GET['ID']}"));
if(!$r['userid'])
{
  die("Invalid user");
}
if(!$r['jail'])
{
  die("That user is not in jail!");
}
$mult=$r['level']*$r['level']; // Multiplier is User Level times User Level what.
$chance=min(($ir['crimexp']/$mult)*50+1, 95); // Chance of busting them out is Crime XP divided by the Multiplier times 51.
if(rand(1,100) < $chance)
{
  $gain=$r['level']*5;
  print "You successfully busted {$r['username']} out of jail.<br />
  &gt; <a href='jail.php'>Back</a>";
$db->query("UPDATE users SET crimexp=crimexp+{$gain}, jail_busts=jail_busts+1 WHERE userid=$userid", $c);
  mysql_query("UPDATE users SET bustdone=bustdone+1 WHERE userid=$userid",$c);
  $db->query("UPDATE users SET jail=0 WHERE userid={$r['userid']}");
  event_add($r['userid'], "<a href='viewuser.php?u={$ir['userid']}'>{$ir['username']}</a> busted you out of jail.", $c);
}
else
{
  print "While trying to bust out your friend, a guard spotted you and dragged you into jail yourself. Unlucky!<br />
  &gt; <a href='jail.php'>Back</a>";
  $time=min($mult, 100);
  $db->query("UPDATE users SET jail=$time, jail_reason='Caught trying to bust out {$r['username']}' WHERE userid=$userid");
  mysql_query("UPDATE users SET bustfailed=bustfailed+1 WHERE userid=$userid",$c);
  event_add($r['userid'], "<a href='viewuser.php?u={$ir['userid']}'>{$ir['username']}</a> was caught trying to bust you out of jail.", $c);
}
$h->endpage();
?>
