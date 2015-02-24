<?php
include "globals.php";
$q=$db->query("SELECT * FROM items WHERE itmid IN({$ir['equip_primary']}, {$ir['equip_secondary']}, {$ir['equip_armor']}, {$ir['equip_helmet']}, {$ir['equip_boots']}, {$ir['equip_amulet']}, {$ir['equip_braclet']}, {$ir['equip_ring']}, {$ir['equip_special']})");
print "<h3>Equipped Items</h3><hr />";
while($r=$db->fetch_row($q))
{
$equip[$r['itmid']]=$r;
}
print "<table width='75%' cellspacing='1' class='table'>
<tr>
<th>Helmet</th>
<td>";
if($equip[$ir['equip_helmet']]['itmid'])
{
print $equip[$ir['equip_helmet']]['itmname']."</td><td><a href='unequip.php?type=equip_helmet' >Unequip Item</a></td>";
}
else
{
print "None equipped.</td><td> </td>";
}
print "</tr>
<tr>
<th>Amulet</th>
<td>";
if($equip[$ir['equip_amulet']]['itmid'])
{
print $equip[$ir['equip_amulet']]['itmname']."</td><td><a href='unequip.php?type=equip_amulet' >Unequip Item</a></td>";
}
else
{
print "None equipped.</td><td> </td>";
}
print "</tr>
</tr>
<tr>
<th>Primary Weapon</th>
<td>";
if($equip[$ir['equip_primary']]['itmid'])
{
print $equip[$ir['equip_primary']]['itmname']."</td><td><a href='unequip.php?type=equip_primary' >Unequip Item</a></td>";
}
else
{
print "None equipped.</td><td> </td>";
}
print "</tr>
<tr>
<th>Secondary Weapon</th>
<td>";
if($equip[$ir['equip_secondary']]['itmid'])
{
print $equip[$ir['equip_secondary']]['itmname']."</td><td><a href='unequip.php?type=equip_secondary' >Unequip Item</a></td>";
}
else
{
print "None equipped.</td><td> </td>";
}
print "</tr>
<tr>
<th>Braclet</th>
<td>";
if($equip[$ir['equip_braclet']]['itmid'])
{
print $equip[$ir['equip_braclet']]['itmname']."</td><td><a href='unequip.php?type=equip_braclet' >Unequip Item</a></td>";
}
else
{
print "None equipped.</td><td> </td>";
}
print "</tr>
<tr>
<th>Ring</th>
<td>";
if($equip[$ir['equip_ring']]['itmid'])
{
print $equip[$ir['equip_ring']]['itmname']."</td><td><a href='unequip.php?type=equip_ring' >Unequip Item</a></td>";
}
else
{
print "None equipped.</td><td> </td>";
}
print "</tr>
<tr>
<th>Armor</th>
<td>";
if($equip[$ir['equip_armor']]['itmid'])
{
print $equip[$ir['equip_armor']]['itmname']."</td><td><a href='unequip.php?type=equip_armor' >Unequip Item</a></td>";
}
else
{
print "None equipped.</td><td> </td>";
}
print "</tr>
<tr>
<th>Boots</th>
<td>";
if($equip[$ir['equip_boots']]['itmid'])
{
print $equip[$ir['equip_boots']]['itmname']."</td><td><a href='unequip.php?type=equip_boots' >Unequip Item</a></td>";
}
else
{
print "None equipped.</td><td> </td>";
}
print "</tr>
<tr>
<th>Special Item</th>
<td>";
if($equip[$ir['equip_special']]['itmid'])
{
print $equip[$ir['equip_special']]['itmname']."</td><td><a href='unequip.php?type=equip_special' >Unequip Item</a></td>";
}
else
{
print "None equipped.</td><td> </td>";
}
 
print "</tr>
</table><hr />
<h3>Inventory</h3><hr />";
$inv=$db->query("SELECT iv.*,i.*,it.* FROM inventory iv LEFT JOIN items i ON iv.inv_itemid=i.itmid LEFT JOIN itemtypes it ON i.itmtype=it.itmtypeid WHERE iv.inv_userid={$userid} ORDER BY i.itmtype ASC, i.itmname ASC");
if ($db->num_rows($inv) == 0)
{
print "<b>You have no items!</b>";
}
else
{
print "<b>Your items are listed below.</b>
 
<table width=90% class=\"table\" border=\"0\" cellspacing=\"1\">
<tr>
<td class=\"h\">Visual</td>
<td class=\"h\">Item</td>
<td class=\"h\">Sell Value</td>
<td class=\"h\">Total Sell Value</td>
<td class=\"h\">Actions</td>
</tr>";
$lt="";
while($i=$db->fetch_row($inv))
{
if($lt!=$i['itmtypename'])
{
$lt=$i['itmtypename'];
print "\n<tr><td colspan=5><b>{$lt}</b></td></tr>";
}
if($i['weapon'])
{
  $i['itmname']="<font color='red'>*</font>".$i['itmname'];
}
if($i['armor'])
{
  $i['itmname']="<font color='green'>*</font>".$i['itmname'];
}
if($i['helmet'])
{
  $i['itmname']="<font color='blue'>*</font>".$i['itmname'];
}
if($i['boots'])
{
  $i['itmname']="<font color='pink'>*</font>".$i['itmname'];
}
if($i['amulet'])
{
  $i['itmname']="<font color='brown'>*</font>".$i['itmname'];
}
if($i['braclet'])
{
  $i['itmname']="<font color='yellow'>*</font>".$i['itmname'];
}
if($i['ring'])
{
  $i['itmname']="<font color='lime'>*</font>".$i['itmname'];
}
if($i['special'])
{
  $i['itmname']="<font color='darkorange'>*</font>".$i['itmname'];
}
print "<tr><td><img width=75px src='{$i['itmimg']}'/>";
print "<td>{$i['itmname']}";
if ($i['inv_qty'] > 1)
{
print " x{$i['inv_qty']}";
}

$usershop=$db->query("select * from usershops where userid=$userid");
if(mysql_num_rows($usershop)!=0)
{
$addtoshop="[<a href='addtoshop.php?ID={$i['inv_id']}'>Put in Shop</a>]";
}
print "</td><td>\${$i['itmsellprice']}</td><td>";
print "$".($i['itmsellprice']*$i['inv_qty']);
print "</td><td>[<a href='iteminfo.php?ID={$i['itmid']}' >Info</a>]";
if($i['inv_lent'] == 0)
{
print" [<a href='itemsend.php?ID={$i['inv_id']}'>Send</a>] [<a href='itemsell.php?ID={$i['inv_id']}' >Sell</a>] [<a href='imadd.php?ID={$i['inv_id']}' >Add To Market</a>] [<a href='itemuse.php?ID={$i['inv_id']}' >Use</a>] $addtoshop";
}
if($i['itmtypename'] == 'Food' || $i['itmtypename'] == 'Medical' || $i['itmtypename'] == 'Donator Pack')
 
if($i['effect1_on'] || $i['effect2_on'] || $i['effect3_on']) {
print " [<a href='itemuse.php?ID={$i['inv_id']}' >Use</a>]";
}
if($i['weapon'])
{
print " [<a href='equip_weapon.php?ID={$i['inv_id']}' >Equip as Weapon</a>]";
}
if($i['armor'])
{
print " [<a href='equip_armor.php?ID={$i['inv_id']}' >Equip as Armor</a>]";
}
if($i['helmet'])
{
print " [<a href='equip_helmet.php?ID={$i['inv_id']}' >Equip as Helmet</a>]";
}
if($i['boots'])
{
print " [<a href='equip_boots.php?ID={$i['inv_id']}' >Equip as Boots</a>]";
}
if($i['amulet'])
{
print " [<a href='equip_amulet.php?ID={$i['inv_id']}' >Equip as Amulet</a>]";
}
if($i['braclet'])
{
print " [<a href='equip_braclet.php?ID={$i['inv_id']}' >Equip as Braclet</a>]";
}
if($i['ring'])
{
print " [<a href='equip_ring.php?ID={$i['inv_id']}' >Equip as Ring</a>]";
}
if($i['special'])
{
print " [<a href='equip_special.php?ID={$i['inv_id']}' >Equip as Special Item</a>]";
}
print "</td></tr>";
}
print "</table>";
print "<b>NB:</b>
Items with a small red <font color='red'>*</font> next to their name can be used as weapons in combat.<br>
 
Items with a small green <font color='green'>*</font> next to their name can be used as armor in combat.<br>
 
Items with a small blue <font color='blue'>*</font> next to their name can be used as a helmet in combat.<br>
 
Items with a small pink <font color='pink'>*</font> next to their name can be used as boots in combat.<br>
 
Items with a small brown <font color='brown'>*</font> next to their name can be used as amulets in combat.<br>
 
Items with a small lime <font color='lime'>*</font> next to their name can be used as braclets in combat.<br>
 
Items with a small yellow <font color='yellow'>*</font> next to their name can be used as rings in combat.<br>
 
Items with a small dark orange <font color='darkorange'>*</font> next to their name can be used as special items in combat.<br>";
}
$h->endpage();
?>