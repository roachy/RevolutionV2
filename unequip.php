<?php
include "globals.php";
if(!in_array($_GET['type'], array("equip_primary", "equip_secondary", "equip_armor", "equip_helmet", "equip_boots", "equip_amulet", "equip_braclet", "equip_ring", "equip_special")))
{
print "This slot ID is not valid.";
$h->endpage();
exit;
}
if(!$ir[$_GET['type']])
{
print "You do not have anything equipped in this slot.";
$h->endpage();
exit;
}
item_add($userid, $ir[$_GET['type']], 1);
$db->query("UPDATE users SET {$_GET['type']}=0 WHERE userid={$ir['userid']}");
$names=array(
"equip_primary" => "Primary Weapon",
"equip_secondary" => "Secondary Weapon",
"equip_armor" => "Armor",
"equip_helmet" => "Helmet",
"equip_boots" => "Boots",
"equip_amulet" => "Amulet",
"equip_braclet" => "Braclet",
"equip_ring" => "Ring",
"equip_special" => "Special",
);
print "The item in your {$names[$_GET['type']]} slot was successfully unequiped.";
$h->endpage();
?>