<?php
/*
* Competition System
* Free Modification
* DidNotCompute - http://www.makewebgames.com/member.php/70333-DidNotCompute
*/
 
include "globals.php";
 
if ($ir['user_level'] == 2) {
echo "<a href='competition_control.php'><u>Click to access Competition Control Panel</u></a>";
}
 
if ($set['competition_type'] == "Crimes") {
$type = "crimes";
} elseif ($set['competition_type'] == "Jail Busts") {
$type = "jail_busts";
}
 
echo "<h2>Competition</h2>";
 
if (isset($_POST['enter'])) {
if ($set['competition'] == "Inactive") {
echo "There are currently no active competitions!";
} else {
if ($ir['competition'] == 1) {
echo "You are already entered in this competition!";
} else {
$db->query("UPDATE users SET competition='1', competition_starting='$ir[$type]' WHERE userid='$userid'");
echo "You have successfully entered the competition!";
}}
}
 
$color = $set['competition'] == "Inactive" ? "FF0000" : "32CD32";
 
echo "<table width='70%' class='table' cellspacing='1'>
       <tr>
        <th>Status: <span style='color: #$color'>{$set['competition']}</span></th>
       </tr>
       <tr>
        <td>";
 
if ($set['competition'] == "Inactive") {
echo "<div align='center' style='font-weight: bold;'>There is currently no active competition. Check back soon!</div>";
} else {
echo "<div align='center' style='font-weight: bold;'>{$set['competition_type']} Competition</div>";
if ($set['competition_type'] == "Crimes") {
echo "<div align='center'>The aim of the competition is to commit as many crimes as possible. The prizes for the top 3 users are:</div>";
} elseif ($set['competition_type'] == "Jail Busts") {
echo "<div align='center'>The aim of the competition is to do as many jail busts as possible. The prizes for the top 3 users are:</div>";
}
echo "<div align='center'>1. ".(money_formatter($set['competition_prize_1']))."</div>";
echo "<div align='center'>2. ".(money_formatter($set['competition_prize_2']))."</div>";
echo "<div align='center'>3. ".(money_formatter($set['competition_prize_3']))."</div>";
 
if ($ir['competition'] == 0) {
echo "<div align='center'><form method='post'><input type='submit' name='enter' class='button' value='Enter Competition' /></form></div>";
} else {
$current = $ir[$type] - $ir['competition_starting'];
echo "<div align='center' style='font-weight: bold;'>{$set['competition_type']}: $current</div>";
}
}
 
echo "</td>
       </tr>
      </table>";
 
if ($set['competition'] == "Active") {
echo "<h3>Top 10</h3>";
echo "<table width='50%' class='table' cellspacing='1'>
       <tr>
        <th>#</th>
        <th>Username</th>
        <th>{$set['competition_type']}</th>
       </tr>";
 
$get_top10 = $db->query("SELECT userid, username, $type, competition_starting FROM users WHERE competition='1' ORDER BY $type-competition_starting DESC LIMIT 10");
 
$n = 1;
while ($top10 = mysql_fetch_object($get_top10)) {
$value = $top10->$type - $top10->competition_starting;
 
echo "<tr>
       <td>$n</td>
       <td><a href='viewuser.php?u=$top10->userid'>$top10->username</a></td>
       <td>$value</td>
      </tr>";
$n++;
}
echo "</table>";
}
 
$h->endpage();
?>