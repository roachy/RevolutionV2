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

include "config.php";
include "language.php";
global $_CONFIG;
define("MONO_ON", 1);
require "class/class_db_{$_CONFIG['driver']}.php";
$db=new database;
$db->configure($_CONFIG['hostname'],
 $_CONFIG['username'],
 $_CONFIG['password'],
 $_CONFIG['database'],
 $_CONFIG['persistent']);
$db->connect();
$c=$db->connection_id;
$db->query("UPDATE fedjail set fed_days=fed_days-1");
$q=$db->query("SELECT * FROM fedjail WHERE fed_days=0");
$ids=array();
while($r=$db->fetch_row($q))
{
$ids[]=$r['fed_userid'];
}
if(count($ids) > 0)
{
$db->query("UPDATE users SET fedjail=0 WHERE userid IN(".implode(",", $ids).")");
}
$db->query("DELETE FROM fedjail WHERE fed_days=0");
$db->query("UPDATE users SET daysingang=daysingang+1 WHERE gang > 0");
$db->query("UPDATE users SET daysold=daysold+1, boxes_opened=0");
$db->query("UPDATE users SET mailban=mailban-1 WHERE mailban > 0");
$db->query("UPDATE users SET donatordays=donatordays-1 WHERE donatordays > 0");
$db->query("UPDATE users SET cdays=cdays-1 WHERE course > 0");
$db->query("UPDATE users SET bankmoney=bankmoney+(bankmoney/50) where bankmoney>0");
$db->query("UPDATE users SET cybermoney=cybermoney+(cybermoney/100*7) where cybermoney>0");
$db->query("UPDATE users SET turns=25");
$db->query("UPDATE users SET rob=0"); 
$db->query("UPDATE users SET rates=1");
$db->query("UPDATE users SET warehouse=0"); 
$db->query("UPDATE users SET guess=0");
$db->query("UPDATE users SET brothel=0");
$q=$db->query("SELECT * FROM users WHERE cdays=0 AND course > 0");

while($r=$db->fetch_row($q))
{
$cd=$db->query("SELECT * FROM courses WHERE crID={$r['course']}");
$coud=$db->fetch_row($cd);
$userid=$r['userid'];
$db->query("INSERT INTO coursesdone VALUES({$r['userid']},{$r['course']})");
$upd="";
$ev="";
if($coud['crSTR'] > 0)
{
$upd.=",us.strength=us.strength+{$coud['crSTR']}";
$ev.=", {$coud['crSTR']} strength";
}
if($coud['crGUARD'] > 0)
{
$upd.=",us.guard=us.guard+{$coud['crGUARD']}";
$ev.=", {$coud['crGUARD']} guard";
}
if($coud['crLABOUR'] > 0)
{
$upd.=",us.labour=us.labour+{$coud['crLABOUR']}";
$ev.=", {$coud['crLABOUR']} labour";
}
if($coud['crAGIL'] > 0)
{
$upd.=",us.agility=us.agility+{$coud['crAGIL']}";
$ev.=", {$coud['crAGIL']} agility";
}
if($coud['crIQ'] > 0)
{
$upd.=",us.IQ=us.IQ+{$coud['crIQ']}";
$ev.=", {$coud['crIQ']} IQ";
}
$ev=substr($ev,1);
if ($upd) {
$db->query("UPDATE users u LEFT JOIN userstats us ON u.userid=us.userid SET us.userid=us.userid $upd WHERE u.userid=$userid");
}
$db->query("INSERT INTO events VALUES('',$userid,unix_timestamp(),0,'Congratulations, you completed the {$coud['crNAME']} and gained $ev!')");
}
$db->query("UPDATE users SET course=0 WHERE cdays=0");
$db->query("TRUNCATE TABLE votes;");


$db->query("UPDATE `businesses` SET `brank` = '100000' WHERE `brank` > '100000'");

$select_businesses = $db->query("SELECT * FROM `businesses` LEFT JOIN `businesses_classes` ON (`classId` = `busClass`) ORDER BY `busId` ASC");

while($bs=$db->fetch_row($select_businesses))
{
$amount = $db->num_rows($db->query(sprintf("SELECT * FROM `businesses_members` WHERE `bmembBusiness` = '%u'", $bs['busId'])));
$active = $db->num_rows($db->query(sprintf("SELECT * FROM `users` WHERE `business` = '%u' AND active='%d'", $bs['busId'], 1)));

$new_customers = ($bs['brank']*($active)+ rand(10, 20)*$bs['classCost'] / 200);
$new_profit = (($new_customers)+ rand(110, 990));
$new_rank = ($bs['classId']*($active)/2);
$db->query(sprintf("UPDATE `businesses` SET `busYCust` = `busCust`, `busYProfit` = `busProfit`, `busCust` = '%d', `busProfit` = '%d', `busCash` = '%d' WHERE `busId` = '%u'", $new_customers, $new_profit, ($new_profit + $bs['busCash']), $bs['busId']));
$db->query(sprintf("UPDATE `businesses` SET `busDays` = `busDays` + '1'"));
$db->query(sprintf("UPDATE `users` SET `activedays` = `activedays` + '1' WHERE `active` = '1'"));
$db->query(sprintf("UPDATE `users` SET `active` = '0' WHERE `active` = '1'"));
$db->query(sprintf("UPDATE `businesses` SET `brank` = `brank` + '%d' WHERE `busId` = '%u'",  $new_rank, $bs['busId']));
$fetch_members = $db->query(sprintf("SELECT * FROM `businesses_members` LEFT JOIN `users` ON (`userid` = `bmembMember`) LEFT JOIN `businesses_ranks` ON (`rankId` = `bmembRank`) WHERE `bmembBusiness` = '%u'", $bs['busId'])) OR die('Cron not run');
$db->query("UPDATE userstats SET labour = labour + 50, IQ = IQ + 50, strength = strength + 50 WHERE userid = {$bs['busDirector']}");
$db->query("UPDATE users SET comppoints = comppoints + 1 WHERE userid = {$bs['busDirector']}");

while($fm=$db->fetch_row($fetch_members))
{

$db->query(sprintf("UPDATE `userstats` SET `{$fm['rankPrim']}` = `{$fm['rankPrim']}` + '%.6f', `{$fm['rankSec']}` = `{$fm['rankSec']}` + '%.6f' WHERE (`userid` = '%u')", $fm['rankPGain'], $fm['rankSGain'], $fm['userid'])) OR die('Cron not run');

$db->query(sprintf("UPDATE `users` SET `money` = `money` + '%d' WHERE `userid` = '%u'", $fm['bmembCash'], $fm['userid'])) OR die('Cron not run');

$db->query(sprintf("UPDATE `users` SET `comppoints` = `comppoints` + '1' WHERE `userid` = '%u'", $fm['userid'])) OR die('Cron not run');




if($bs['busCash'] < $fm['bmembCash'])
{
$text = "Member ID {$fm['bmembMember']} was not paid their \$".number_format($fm['bmembCash'])." due to lack of funds." OR die('Cron not run');
$db->query(sprintf("INSERT INTO `businesses_alerts` (`alertId`, `alertBusiness`, `alertText`, `alertTime`) VALUES ('NULL', '%u', '%s', '%d')", $bs['busId'], $text, time())) OR die('Cron not run');
$db->query(sprintf("UPDATE `businesses` SET `busDebt` = `busDebt` + '%d' WHERE `busId` = '%u'", $fm['bmembCash'], $bs['busId'])) OR die('Cron not run');
}
else
{
$db->query(sprintf("UPDATE `businesses` SET `busCash` = `busCash` - '%d' WHERE `busId` = '%u'", $fm['bmembCash'], $bs['busId'])) OR die('Cron not run');
}
}
if($bs['busDebt'] > $bs['classCost'])
{
$send_event = $db->query(sprintf("SELECT `bmembMember` FROM WHERE `bmembBusiness` = '%u' ORDER BY `bmembId` DESC", $bs['busId'])) OR die('Cron not run') ;
while($se=$db->fetch_row($send_event))
{
$text = "The {$bs['busName']} business went bankrupt\, all members have been made redundent." OR die('Cron not run');
insert_event($se['bmembMember'], $text);
}
$db->query(sprintf("DELETE FROM `businesses_members` WHERE (`bmembBusiness` = '%u')", $bs['busId'])) OR die('Cron not run');
$db->query(sprintf("DELETE FROM `businesses` WHERE (`busId` = '%u')", $bs['busId'])) OR die('Cron not run');
}
}

$d=$db->query("SELECT * FROM drugs where drugid=1");
$t=$db->fetch_row($d);
$chance6 = rand(50,100); 
$db->query("UPDATE drugs SET price=$chance6 WHERE drugid=1");
 
if ($t['lowprice'] > $chance6)
{
$db->query("UPDATE drugs SET lowprice=$chance6 WHERE drugid=1");
}
if ($t['highprice'] < $chance6)
{
$db->query("UPDATE drugs SET highprice=$chance6 WHERE drugid=1");
}
 
 
$d=$db->query("SELECT * FROM drugs where drugid=2");
$t=$db->fetch_row($d);
$chance7 = rand(75,125);
$db->query("UPDATE drugs SET price=$chance7 WHERE drugid=2");
 
if ($t['lowprice'] > $chance7)
{
$db->query("UPDATE drugs SET lowprice=$chance7 WHERE drugid=2");
}
if ($t['highprice'] < $chance7)
{
$db->query("UPDATE drugs SET highprice=$chance7 WHERE drugid=2");
}
 
 
$d=$db->query("SELECT * FROM drugs where drugid=3");
$t=$db->fetch_row($d);
$chance8 = rand(100,150); 
$db->query("UPDATE drugs SET price=$chance8 WHERE drugid=3");
 
if ($t['lowprice'] > $chance8)
{
$db->query("UPDATE drugs SET lowprice=$chance8 WHERE drugid=3");
}
if ($t['highprice'] < $chance8)
{
$db->query("UPDATE drugs SET highprice=$chance8 WHERE drugid=3");
}
 
 
$d=$db->query("SELECT * FROM drugs where drugid=4");
$t=$db->fetch_row($d);
$chance1 = rand(125,175); 
$db->query("UPDATE drugs SET price=$chance1 WHERE drugid=4");
 
if ($t['lowprice'] > $chance1)
{
$db->query("UPDATE drugs SET lowprice=$chance1 WHERE drugid=4");
}
if ($t['highprice'] < $chance1)
{
$db->query("UPDATE drugs SET highprice=$chance1 WHERE drugid=4");
}
 
 
$d=$db->query("SELECT * FROM drugs where drugid=5");
$t=$db->fetch_row($d);
$chance2 = rand(150,200);
$db->query("UPDATE drugs SET price=$chance2 WHERE drugid=5");
 
if ($t['lowprice'] > $chance2)
{
$db->query("UPDATE drugs SET lowprice=$chance2 WHERE drugid=5");
}
if ($t['highprice'] < $chance2)
{
$db->query("UPDATE drugs SET highprice=$chance2 WHERE drugid=5");
}
 
 
$d=$db->query("SELECT * FROM drugs where drugid=6");
$t=$db->fetch_row($d);
$chance3 = rand(175,225); 
$db->query("UPDATE drugs SET price=$chance3 WHERE drugid=6");
 
if ($t['lowprice'] > $chance3)
{
$db->query("UPDATE drugs SET lowprice=$chance3 WHERE drugid=6");
}
if ($t['highprice'] < $chance3)
{
$db->query("UPDATE drugs SET highprice=$chance3 WHERE drugid=6");
}
 
 
$d=$db->query("SELECT * FROM drugs where drugid=7");
$t=$db->fetch_row($d);
$chance4 = rand(200,250); 
$db->query("UPDATE drugs SET price=$chance4 WHERE drugid=7");
 
if ($t['lowprice'] > $chance4)
{
$db->query("UPDATE drugs SET lowprice=$chance4 WHERE drugid=7");
}
if ($t['highprice'] < $chance4)
{
$db->query("UPDATE drugs SET highprice=$chance4 WHERE drugid=7");
}
 
 
$d=$db->query("SELECT * FROM drugs where drugid=8");
$t=$db->fetch_row($d);
$chance5 = rand(225,275);
$db->query("UPDATE drugs SET price=$chance5 WHERE drugid=8");
 
if ($t['lowprice'] > $chance5)
{
$db->query("UPDATE drugs SET lowprice=$chance5 WHERE drugid=8");
}
if ($t['highprice'] < $chance5)
{
$db->query("UPDATE drugs SET highprice=$chance5 WHERE drugid=8");
}



?>
