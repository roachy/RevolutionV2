<?php
/*
* Competition System
* Free Modification
* DidNotCompute - http://www.makewebgames.com/member.php/70333-DidNotCompute
*/
 
include "globals.php";
 
if ($ir['user_level'] != 2) {
exit("You do not have permission to view this page");
}
 
if ($set['competition'] == "Active") {
 
echo "<h3>Cancel Competition</h3>";
echo "There is currently a {$set['competition_type']} competition in progress. If you want to cancel this competition then <a href='?cancel=true' style='font-weight: bold;'>click here</a>.";
 
} else {
 
echo "<h3>Create Competition</h3>";
echo "<form method='post'>
<div>Type: <select name='type'><option value='Crimes'>Crimes</option><option value='Jail Busts'>Jail Busts</option></select></div>
<div>1st Place Prize: <input type='text' name='first_prize' /></div>
<div>2nd Place Prize: <input type='text' name='second_prize' /></div>
<div>3rd Place Prize: <input type='text' name='third_prize' /></div>
<div><input type='submit' name='create_competition' class='button' value='Create Competition' /></div>
</form>";
 
}
 
if (isset($_GET['cancel'])) {
$db->query("UPDATE users SET competition='0' WHERE competition='1'");
$db->query("UPDATE settings SET conf_value='Inactive' WHERE conf_name='competition'");
$db->query("UPDATE settings SET conf_value='' WHERE conf_name='competition_type'");
$db->query("UPDATE settings SET conf_value='' WHERE conf_name='competition_prize_1'");
$db->query("UPDATE settings SET conf_value='' WHERE conf_name='competition_prize_2'");
$db->query("UPDATE settings SET conf_value='' WHERE conf_name='competition_prize_3'");
echo "The competition has been cancelled!";
}
 
if (isset($_POST['create_competition'])) {
$type = htmlspecialchars($_POST['type']);
$prize1 = abs(intval($_POST['first_prize']));
$prize2 = abs(intval($_POST['second_prize']));
$prize3 = abs(intval($_POST['third_prize']));
 
$valid_type = array("Crimes", "Jail Busts");
 
if (!in_array($type, $valid_type)) {
echo "The competition type you selected is invalid!";
} else {
if (!$prize1 || !$prize2 || !$prize3) {
echo "You must fill in all prize fields!";
} else {
$db->query("UPDATE settings SET conf_value='Active' WHERE conf_name='competition'");
$db->query("UPDATE settings SET conf_value='$type' WHERE conf_name='competition_type'");
$db->query("UPDATE settings SET conf_value='$prize1' WHERE conf_name='competition_prize_1'");
$db->query("UPDATE settings SET conf_value='$prize2' WHERE conf_name='competition_prize_2'");
$db->query("UPDATE settings SET conf_value='$prize3' WHERE conf_name='competition_prize_3'");
echo "The competition has been successfully created!";
}}
}
 
$h->endpage();
?>