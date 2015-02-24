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
if($ir['jail'])
{
  die("You cannot heal people whilst in Jail.");
}
$_GET['ID']=abs((int) $_GET['ID']);
$r=$db->fetch_row($db->query("SELECT * FROM users WHERE userid={$_GET['ID']}"));
if(!$r['userid'])
{
  die("Invalid user");
}
if(!$r['hospital'])
{
  die("That user is not in hospital!");
}
$cost=$r['level']*2000;
$cf=number_format($cost);
if($ir['money'] < $cost)
{
  die("Sorry, you do not have enough money to pay for {$r['username']}'s treatment, you need \$$cf.");
}
  print "You successfully healed {$r['username']} for \$$cf.<br />
  &gt; <a href='hospital.php'>Back</a>";
  $db->query("UPDATE users SET money=money-{$cost} WHERE userid=$userid");
  $db->query("UPDATE users SET hospital=0 WHERE userid={$r['userid']}");
  event_add($r['userid'], "<a href='viewuser.php?u={$ir['userid']}'>{$ir['username']}</a> paid for better hospital treatment!", $c);
$h->endpage();
?>
