<?php
/*
* Competition System
* Free Modification
* DidNotCompute - http://www.makewebgames.com/member.php/70333-DidNotCompute
*/
 
include "config.php";
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
 
$set = array();
$settq = $db->query("SELECT * FROM settings");
while($r=$db->fetch_row($settq))
{
$set[$r['conf_name']]=$r['conf_value'];
}
 
if ($set['competition'] == "Active") {
 
if ($set['competition_type'] == "Crimes") {
$type = "crimes";
} elseif ($set['competition_type'] == "Jail Busts") {
$type = "jail_busts";
}
 
$get_top3 = $db->query("SELECT userid, $type, competition_starting FROM users WHERE competition='1' ORDER BY $type-competition_starting DESC LIMIT 3");
 
$n = 1;
while ($top3 = mysql_fetch_object($get_top3)) {
 
switch ($n) {
 case 1:
  $prize = $set['competition_prize_1'];
  break;
 case 2:
  $prize = $set['competition_prize_2'];
  break;
 case 3:
  $prize = $set['competition_prize_3'];
  break;
}
 
$db->query("UPDATE users SET money=money+$prize WHERE userid='$top3->userid'");
$n++;
}
 
$db->query("UPDATE users SET competition='0' WHERE competition='1'");
$db->query("UPDATE settings SET conf_value='Inactive' WHERE conf_name='competition'");
$db->query("UPDATE settings SET conf_value='' WHERE conf_name='competition_type'");
$db->query("UPDATE settings SET conf_value='' WHERE conf_name='competition_prize_1'");
$db->query("UPDATE settings SET conf_value='' WHERE conf_name='competition_prize_2'");
$db->query("UPDATE settings SET conf_value='' WHERE conf_name='competition_prize_3'");
 
}
 
?>