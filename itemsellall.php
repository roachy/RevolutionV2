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
$_GET['ID'] = abs((int) $_GET['ID']);
//itemsend
if($_GET['qty'])
{
$id=$db->query("SELECT iv.*,it.* FROM inventory iv LEFT JOIN items it ON iv.inv_itemid=it.itmid WHERE iv.inv_id={$_GET['ID']} AND iv.inv_userid=$userid LIMIT 1");
if($db->num_rows($id)==0)
{
print "Invalid item ID";
}
else
{
$r=$db->fetch_row($id);

if($_GET['qty'] > $r['inv_qty'])
{
print "You are trying to send more than you have!";
}
else
{
$price=$r['itmsellprice'];
//are we sending it all
item_remove($userid, $r['itmid']);
$db->query("UPDATE users SET money=money+{$price} WHERE userid=$userid");
$priceh="$".($price);
print "You sold {$r['itmname']}(s) for {$priceh} <br>";
print "<a href='inventory.php'> Back to Inventory </a>";
$db->query("INSERT INTO itemselllogs VALUES ('', $userid, {$r['itmid']}, $price,  unix_timestamp(), '{$ir['username']} sold {$_GET['qty']} {$r['itmname']}(s) for {$priceh}')");
		}
	}
}else if($_GET['ID'])
{
$id=$db->query("SELECT iv.*,it.* FROM inventory iv LEFT JOIN items it ON iv.inv_itemid=it.itmid WHERE iv.inv_id={$_GET['ID']} and iv.inv_userid=$userid LIMIT 1");
if($db->num_rows($id)==0)
{
print "Invalid item ID";
}
else
{
$r=$db->fetch_row($id);
print "

<div class='generalinfo_txt'>
<div><img src='images/info_left.jpg' alt='' /></div>
<div class='info_mid'><h2 style='padding-top:10px;'> Sell Items</h2></div>
<div><img src='images/info_right.jpg' alt='' /></div> </div>
<div class='generalinfo_simple'><br> <br><br>
<b>You are about to quick sell a {$r['itmname']}.</b><br />
<form action='itemquicksell.php' method='get'>
<input type='hidden' name='ID' value='{$_GET['ID']}' />
<input type='submit' STYLE='color: black;  background-color: white;' value='Sell Items' /></form>
</table></div><div><img src='images/generalinfo_btm.jpg' alt='' /></div><br></div></div></div></div></div> ";
}
}
else
{
print "Invalid use of file.";
}
$h->endpage();
?>
