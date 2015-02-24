<?php
include "sglobals.php";

// This contains item stuffs

switch ($_GET['action'])
	{
case 'newitem':
	new_item_form();
	break;

case 'newitemsub':
	new_item_submit();
	break;

case 'giveitem':
	give_item_form();
	break;

case 'giveitemsub':
	give_item_submit();
	break;

case 'killitem':
	kill_item_form();
	break;

case 'killitemsub':
	kill_item_submit();
	break;

case 'edititem':
	edit_item_begin();
	break;

case 'edititemform':
	edit_item_form();
	break;

case 'edititemsub':
	edit_item_sub();
	break;

case 'newitemtype':
	newitemtype();
	break;

default:
	echo "Error: This script requires an action.";
	break;
	}

function new_item_form()
	{
	global $db, $ir, $c;
	if ($ir['user_level'] > 2)
		{
		die("403");
		}

	echo "<h3>Adding an item to the game</h3><form action='staff_items.php?action=newitemsub' method='post'>
Item Name: <input style='color:black;' type='text' name='itmname' value='' /><br />
 
Item Desc.: <input style='color:black;' type='text' name='itmdesc' value='' /><br />
 
Item Type: " . itemtype_dropdown($c, 'itmtype') . "<br />

Item Image: <input type='text' STYLE='color: black;  background-color: white;' name='itmimg' value='' /><br />
 
Item Buyable: <input type='checkbox' name='itmbuyable' checked='checked' /><br />
 
Item Price: <input style='color:black;' type='text' name='itmbuyprice' /><br />
 
Item Sell Value: <input style='color:black;' type='text' name='itmsellprice' /><br />
 
 
<hr />
<b>Usage Form</b><hr /><br />
<b><u>Effect 1</u></b><br />
 
On? <input type='radio' name='effect1on' value='1' /> Yes <input type='radio' name='effect1on' value='0' checked='checked' /> No<br />
 <br />
Stat: <select name='effect1stat' type='dropdown'>
<option value='energy'>Energy</option>
<option value='will'>Will</option>
<option value='brave'>Brave</option>
<option value='hp'>Health</option>
<option value='strength'>Strength</option>
<option value='agility'>Agility</option>
<option value='guard'>Guard</option>
<option value='labour'>Labour</option>
<option value='IQ'>IQ</option>
<option value='hospital'>Hospital Time</option>
<option value='jail'>Jail Time</option>
<option value='money'>Money</option>
<option value='crystals'>Crystals</option>
<option value='cdays'>Education Days Left</option>
<option value='bankmoney'>Bank money</option>
<option value='cybermoney'>Cyber money</option>
<option value='crimexp'>Crime XP</option>
 <br />
</select> Direction: <select name='effect1dir' type='dropdown'>
<option value='pos'>Increase</option>
<option value='neg'>Decrease</option>
 
</select>
 <br />
Amount: <input style='color:black;' type='text' name='effect1amount' value='0' /> <select name='effect1type' type='dropdown'>
<option value='figure'>Value</option>
<option value='percent'>Percent</option>
</select><hr />
<b><u>Effect 2</u></b>
 <br />
On? <input type='radio' name='effect2on' value='1' /> Yes <input type='radio' name='effect2on' value='0' checked='checked' /> No
 <br />
Stat: <select name='effect2stat' type='dropdown'>
<option value='energy'>Energy</option>
<option value='will'>Will</option>
<option value='brave'>Brave</option>
<option value='hp'>Health</option>
<option value='strength'>Strength</option>
<option value='agility'>Agility</option>
<option value='guard'>Guard</option>
<option value='labour'>Labour</option>
<option value='IQ'>IQ</option>
<option value='hospital'>Hospital Time</option>
<option value='jail'>Jail Time</option>
<option value='money'>Money</option>
<option value='crystals'>Crystals</option>
<option value='cdays'>Education Days Left</option>
<option value='bankmoney'>Bank money</option>
<option value='cybermoney'>Cyber money</option>
<option value='crimexp'>Crime XP</option>
 <br />
</select> Direction: <select name='effect2dir' type='dropdown'>
<option value='pos'>Increase</option>
<option value='neg'>Decrease</option>
 <br />
</select>
 <br />
Amount: <input style='color:black;' type='text' name='effect2amount' value='0' /> <select name='effect2type' type='dropdown'>
<option value='figure'>Value</option>
<option value='percent'>Percent</option>
</select><hr />
<b><u>Effect 3</u></b>
 <br />
On? <input type='radio' name='effect3on' value='1' /> Yes <input type='radio' name='effect3on' value='0' checked='checked' /> No
 <br />
Stat: <select name='effect3stat' type='dropdown'>
<option value='energy'>Energy</option>
<option value='will'>Will</option>
<option value='brave'>Brave</option>
<option value='hp'>Health</option>
<option value='strength'>Strength</option>
<option value='agility'>Agility</option>
<option value='guard'>Guard</option>
<option value='labour'>Labour</option>
<option value='IQ'>IQ</option>
<option value='hospital'>Hospital Time</option>
<option value='jail'>Jail Time</option>
<option value='money'>Money</option>
<option value='crystals'>Crystals</option>
<option value='cdays'>Education Days Left</option>
<option value='bankmoney'>Bank money</option>
<option value='cybermoney'>Cyber money</option>
<option value='crimexp'>Crime XP</option>
 <br />
</select> Direction: <select name='effect3dir' type='dropdown'>
<option value='pos'>Increase</option>
<option value='neg'>Decrease</option>
 <br />
</select>
 <br />
Amount: <input style='color:black;' type='text' name='effect3amount' value='0' /> <select name='effect3type' type='dropdown'>
<option value='figure'>Value</option>
<option value='percent'>Percent</option>
</select><hr />
<b>Combat Usage</b>
 <br />
Helmet Defense: <input style='color:black;' type='text' name='helmet' value='0' />
 <br />
Weapon Power: <input style='color:black;' type='text' name='weapon' value='0' />
 <br />
Armor Defense: <input style='color:black;' type='text' name='armor' value='0' />
 <br />
Boots Defense: <input style='color:black;' type='text' name='boots' value='0' />
 <br />
Amulet Power: <input style='color:black;' type='text' name='amulet' value='0' />
 <br />
Braclet Power: <input style='color:black;' type='text' name='braclet' value='0' />
 <br />
Ring Power: <input style='color:black;' type='text' name='ring' value='0' />
 <br />
Special Defense: <input style='color:black;' type='text' name='special' value='0' /><hr />
<input type='submit' value='Add Item To Game' /></form>";
	}

function new_item_submit()
	{
	global $db, $ir, $c, $h;
	if ($ir['user_level'] > 2)
		{
		die("403");
		}

	if (!isset($_POST['itmname']) || !isset($_POST['itmdesc']) || !isset($_POST['itmtype']) || !isset($_POST['itmbuyprice']) || !isset($_POST['itmsellprice']))
		{
		echo "You missed one or more of the fields. Please go back and try again.
 
<a href='admin.php?action=newitem' >> Back</a>";
		$h->endpage();
		exit;
		}

	$itmname = $db->escape($_POST['itmname']);
	$itmdesc = $db->escape($_POST['itmdesc']);
	$weapon = abs((int)$_POST['weapon']);
	$armor = abs((int)$_POST['armor']);
	$helmet = abs((int)$_post['helmet']);
	$boots = abs((int)$_POST['boots']);
	$amulet = abs((int)$_POST['amulet']);
	$braclet = abs((int)$_POST['braclet']);
	$ring = abs((int)$_POST['ring']);
	$special = abs((int)$_POST['special']);
	if ($_POST['itmbuyable'] == 'on')
		{
		$itmbuy = 1;
		}
	  else
		{
		$itmbuy = 0;
		}

	$efx1 = $db->escape(serialize(array(
		"stat" => $_POST['effect1stat'],
		"dir" => $_POST['effect1dir'],
		"inc_type" => $_POST['effect1type'],
		"inc_amount" => abs((int)$_POST['effect1amount'])
	)));
	$efx2 = $db->escape(serialize(array(
		"stat" => $_POST['effect2stat'],
		"dir" => $_POST['effect2dir'],
		"inc_type" => $_POST['effect2type'],
		"inc_amount" => abs((int)$_POST['effect2amount'])
	)));
	$efx3 = $db->escape(serialize(array(
		"stat" => $_POST['effect3stat'],
		"dir" => $_POST['effect3dir'],
		"inc_type" => $_POST['effect3type'],
		"inc_amount" => abs((int)$_POST['effect3amount'])
	)));
	$m = $db->query("INSERT INTO items VALUES(' ', '{$_POST['itmimg']}', '{$_POST['itmtype']}', '$itmname', '$itmdesc', {$_POST['itmbuyprice']}, {$_POST['itmsellprice']}, $itmbuy, '{$_POST['effect1on']}', '$efx1', '{$_POST['effect2on']}', '$efx2', '{$_POST['effect3on']}', '$efx3', '$weapon', '$armor', '$helmet', '$boots', '$amulet', '$braclet', '$ring', '$special')");
	echo "The {$_POST['itmname']} Item was added to the game.";
	stafflog_add("Created item {$_POST['itmname']}");
	}

function give_item_form()
	{
	global $db, $ir, $c;
	if ($ir['user_level'] > 3)
		{
		die("403");
		}

	echo "<h3>Giving Item To User</h3>
<form action='staff_items.php?action=giveitemsub' method='post'>
User: " . user_dropdown($c, 'user') . "
 
Item: " . item_dropdown($c, 'item') . "
 
Quantity: <input style='color:black;' type='text' name='qty' value='1' />
 
<input type='submit' value='Give Item' /></form>";
	}

function give_item_submit()
	{
	global $db, $ir, $c;
	if ($ir['user_level'] > 3)
		{
		die("403");
		}

	$db->query("INSERT INTO inventory VALUES('',{$_POST['item']},{$_POST['user']},{$_POST['qty']},0,0)", $c) or die(mysql_error());
	echo "You gave {$_POST['qty']} of item ID {$_POST['item']} to user ID {$_POST['user']}";
	stafflog_add("Gave {$_POST['qty']} of item ID {$_POST['item']} to user ID {$_POST['user']}");
	}

function kill_item_form()
	{
	global $db, $ir, $c, $h, $userid;
	if ($ir['user_level'] > 2)
		{
		die("403");
		}

	echo "<h3>Deleting Item</h3>
The item will be permanently removed from the game.
 
<form action='staff_items.php?action=killitemsub' method='post'>
Item: " . item_dropdown($c, 'item') . "
 
<input type='submit' value='Kill Item' /></form>";
	}

function kill_item_submit()
	{
	global $db, $ir, $c, $h, $userid;
	if ($ir['user_level'] > 2)
		{
		die("403");
		}

	$d = $db->query("SELECT * FROM items WHERE itmid={$_POST['item']}");
	$itemi = $db->fetch_row($d);
	$db->query("DELETE FROM items WHERE itmid={$_POST['item']}");
	$db->query("DELETE FROM shopitems WHERE sitemITEMID={$_POST['item']}");
	$db->query("DELETE FROM inventory WHERE inv_itemid={$_POST['item']}");
	$db->query("DELETE FROM itemmarket WHERE imITEM={$_POST['item']}");
	echo "The {$itemi['itmname']} Item was removed from the game.";
	stafflog_add("Deleted item {$itemi['itmname']}");
	}

function edit_item_begin()
	{
	global $db, $ir, $c, $h, $userid;
	if ($ir['user_level'] > 2)
		{
		die("403");
		}

	echo "<h3>Editing Item</h3>
You can edit any aspect of this item.
 
<form action='staff_items.php?action=edititemform' method='post'>
Item: " . item_dropdown($c, 'item') . "
 
<input type='submit' value='Edit Item' /></form>";
	}

function edit_item_form()
	{
	global $db, $ir, $c, $h;
	if ($ir['user_level'] > 2)
		{
		die("403");
		}

	$d = $db->query("SELECT * FROM items WHERE itmid={$_POST['item']}");
	$itemi = $db->fetch_row($d);
	echo "<h3>Editing Item</h3>
<form action='staff_items.php?action=edititemsub' method='post'>
<input type='hidden' name='itmid' value='{$_POST['item']}' />
Item Name: <input style='color:black;' type='text' name='itmname' value='{$itemi['itmname']}' /><br>
 
Item Desc.: <input style='color:black;' type='text' name='itmdesc' value='{$itemi['itmdesc']}' /><br>
 
Item Type: " . itemtype_dropdown($c, 'itmtype', $itemi['itmtype']) . "<br>

Item Image: <input type='text' STYLE='color: black;  background-color: white;' name='itmimg' value='{$itemi['itmimg']}' /><br />
 
Item Buyable: <input type='checkbox' name='itmbuyable'";
	if ($itemi['itmbuyable'])
		{
		echo " checked='checked'";
		}

	echo " />
Item Price: <input style='color:black;' type='text' name='itmbuyprice' value='{$itemi['itmbuyprice']}' /><br>
 
Item Sell Value: <input style='color:black;' type='text' name='itmsellprice' value='{$itemi['itmsellprice']}' /><hr /><b>Usage Form</b><hr /><br>";
	$stats = array(
		"energy" => "Energy",
		"will" => "Will",
		"brave" => "Brave",
		"hp" => "Health",
		"strength" => "Strength",
		"agility" => "Agility",
		"guard" => "Guard",
		"labour" => "Labour",
		"IQ" => "IQ",
		"hospital" => "Hospital Time",
		"jail" => "Jail Time",
		"money" => "Money",
		"crystals" => "Crystals",
		"cdays" => "Education Days Left",
		"bankmoney" => "Bank money",
		"cybermoney" => "Cyber money",
		"crimexp" => "Crime XP"
	);
	for ($i = 1; $i <= 3; $i++)
		{
		if ($itemi["effect" . $i])
			{
			$efx = unserialize($itemi["effect" . $i]);
			}
		  else
			{
			$efx = array(
				"inc_amount" => 0
			);
			}

		$switch1 = ($itemi['effect' . $i . '_on'] > 0) ? " checked='checked'" : "";
		$switch2 = ($itemi['effect' . $i . '_on'] > 0) ? "" : " checked='checked'";
		echo "<b><u>Effect {$i}</u></b>
 
On? <input type='radio' name='effect{$i}on' value='1'$switch1 /> Yes <input type='radio' name='effect{$i}on' value='0'$switch2 /><br> No
 
Stat: <select name='effect{$i}stat' type='dropdown'>";
		foreach($stats as $k => $v)
			{
			if ($k == $efx['stat'])
				{
				echo "<option value='{$k}' selected='selected'>{$v}</option>\n";
				}
			  else
				{
				echo "<option value='$k'>{$v}</option>\n";
				}
			}

		if ($efx['dir'] == "neg")
			{
			$str = "<option value='pos'>Increase</option><option value='neg' selected='selected'>Decrease</option>";
			}
		  else
			{
			$str = "<option value='pos' selected='selected'>Increase</option><option value='neg'>Decrease</option>";
			}

		if ($efx['inc_type'] == "percent")
			{
			$str2 = "<option value='figure'>Value</option><option value='percent' selected='selected'>Percent</option>";
			}
		  else
			{
			$str2 = "<option value='figure' selected='selected'>Value</option><option value='percent'>Percent</option>";
			}

		echo "</select> Direction: <select name='effect{$i}dir' type='dropdown'>{$str}
  </select>
 
  Amount: <input style='color:black;' type='text' name='effect{$i}amount' value='{$efx['inc_amount']}' /> <select name='effect{$i}type' type='dropdown'>{$str2}</select><hr />";
		}

	echo "<b>Combat Usage</b>
 
Weapon Power: <input style='color:black;' style='color:black;' type='text' name='weapon' value='{$itemi['weapon']}' /><br>
 
Armor Defense: <input style='color:black;' type='text' name='armor' value='{$itemi['armor']}' /><br>
 
Helmet Defense: <input style='color:black;' type='text' name='helmet' value='{$itemi['helmet']}' /><br>
 
Boots Defense: <input style='color:black;' type='text' name='boots' value='{$itemi['boots']}' /><br>
 
Amulet Power: <input style='color:black;' type='text' name='amulet' value='{$itemi['amulet']}' /><br>
 
Braclet Power: <input style='color:black;' type='text' name='braclet' value='{$itemi['braclet']}' /><br>
 
Ring Power: <input style='color:black;' type='text' name='ring' value='{$itemi['ring']}' /><br>
 
Special Defense: <input style='color:black;' type='text' name='special' value='{$itemi['special']}' /><hr /><br>
<input type='submit' value='Edit Item' /></form>";
	}

function edit_item_sub()
	{
	global $db, $ir, $c, $h, $userid;
	if ($ir['user_level'] > 2)
		{
		die("403");
		}

	if (!isset($_POST['itmname']) || !isset($_POST['itmdesc']) || !isset($_POST['itmtype']) || !isset($_POST['itmbuyprice']) || !isset($_POST['itmsellprice']))
		{
		echo "You missed one or more of the fields. Please go back and try again.
 
<a href='staff_items.php?action=edititem'>> Back</a>";
		$h->endpage();
		exit;
		}

	$itmname = $_POST['itmname'];
	$itmdesc = $_POST['itmdesc'];
	$weapon = abs((int)$_POST['weapon']);
	$armor = abs((int)$_POST['armor']);
	$helmet = abs((int)$_POST['helmet']);
	$boots = abs((int)$_POST['boots']);
	$amulet = abs((int)$_POST['amulet']);
	$braclet = abs((int)$_POST['braclet']);
	$ring = abs((int)$_POST['ring']);
	$special = abs((int)$_POST['special']);
	if ($_POST['itmbuyable'] == 'on')
		{
		$itmbuy = 1;
		}
	  else
		{
		$itmbuy = 0;
		}

	$db->query("DELETE FROM items WHERE itmid={$_POST['itmid']}", $c);
	$efx1 = $db->escape(serialize(array(
		"stat" => $_POST['effect1stat'],
		"dir" => $_POST['effect1dir'],
		"inc_type" => $_POST['effect1type'],
		"inc_amount" => abs((int)$_POST['effect1amount'])
	)));
	$efx2 = $db->escape(serialize(array(
		"stat" => $_POST['effect2stat'],
		"dir" => $_POST['effect2dir'],
		"inc_type" => $_POST['effect2type'],
		"inc_amount" => abs((int)$_POST['effect2amount'])
	)));
	$efx3 = $db->escape(serialize(array(
		"stat" => $_POST['effect3stat'],
		"dir" => $_POST['effect3dir'],
		"inc_type" => $_POST['effect3type'],
		"inc_amount" => abs((int)$_POST['effect3amount'])
	)));
	$m = $db->query("INSERT INTO items VALUES('{$_POST['itmid']}', '{$_POST['itmimg']}', '{$_POST['itmtype']}', '$itmname', '$itmdesc', '{$_POST['itmbuyprice']}','{$_POST['itmsellprice']}',$itmbuy, '{$_POST['effect1on']}', '$efx1', '{$_POST['effect2on']}', '$efx2', '{$_POST['effect3on']}', '$efx3', $weapon, $armor, $boots, $helmet, $amulet, $braclet, $ring, $special)");
	echo "The {$_POST['itmname']} Item was edited successfully.";
	stafflog_add("Edited item {$_POST['itmname']}");
	}

function newitemtype()
	{
	global $db, $ir, $c, $h, $userid;
	if ($ir['user_level'] > 2)
		{
		die("403");
		}

	if ($_POST['name'])
		{
		$db->query("INSERT INTO itemtypes VALUES(NULL, '{$_POST['name']}')");
		echo "Item Type {$_POST['name']} added.";
		stafflog_add("Added item type {$_POST['name']}");
		}
	  else
		{
		echo "<h3>Add Item Type</h3><hr />
<form action='staff_items.php?action=newitemtype' method='post'>
Name: <input style='color:black;' type='text' name='name' />
 
<input type='submit' value='Add Item Type' /></form>";
		}
	}
	

$h->endpage();
?>