<?php
include "globals.php";
$_GET['ID'] = abs((int) $_GET['ID']);
$id=$db->query("SELECT iv.*,it.* FROM inventory iv LEFT JOIN items it ON iv.inv_itemid=it.itmid WHERE iv.inv_id={$_GET['ID']} AND iv.inv_userid=$userid LIMIT 1");
if($db->num_rows($id)==0)
{
print "Invalid item ID";
$h->endpage();
exit;
}
else
{
$r=$db->fetch_row($id);
}
if(!$r['braclet'])
{
print "This item cannot be equipped to this slot.";
$h->endpage();
exit;
}
if($_GET['type'])
{
if(!in_array($_GET['type'], array("equip_braclet")))
{
print "This slot ID is not valid.";
$h->endpage();
exit;
}
if($ir[$_GET['type']])
{
item_add($userid, $ir[$_GET['type']], 1);
}
item_remove($userid, $r['itmid'], 1);
$db->query("UPDATE users SET {$_GET['type']} = {$r['itmid']} WHERE userid={$userid}");
print "Item {$r['itmname']} equipped successfully.";
}
else
{
print "<h3>Equip Braclet</h3><hr />
<form action='equip_braclet.php' method='get'>
<input type='hidden' name='ID' value='{$_GET['ID']}' />
Click Equip Braclet to equip {$r['itmname']} as your braclet, if you currently have any braclets equipped it will be removed back to your inventory.
 
<input type='hidden' name='type' value='equip_braclet'  />
<input type='submit' value='Equip Braclet' /></form>";
}
$h->endpage();
?>