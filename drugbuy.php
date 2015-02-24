<?php
include "globals.php";
$_GET['ID']= abs((int) $_GET['ID']);
$_POST['qty']= abs((int) $_POST['qty']);
if(!$_GET['ID'] || !$_POST['qty'])
{
print "Invalid use of file";
}
else if($_POST['qty'] <= 0)
{
print "You have been added to the delete list for trying to cheat the game.";
}
else
{
$q=$db->query("SELECT * FROM drugs WHERE drugid={$_GET['ID']}");
if(mysql_num_rows($q) == 0)
{
print "Invalid item ID";
}
else
{
$itemd=$db->fetch_row($q);
if($ir['money'] < $itemd['price']*$_POST['qty'])
{
print "You don't have enough money to buy this item!";
$h->endpage();
exit;
}
$price=($itemd['price']*$_POST['qty']);
$qty=($_POST['qty']);
 
$x=$db->query("SELECT * FROM druginv WHERE invid=$userid");
$y=$db->fetch_row($x);
 
if (strlen($qty) > 4) 
{
print "Invalid entry muppet";
$h->endpage();
exit;
}
 
if ($qty > $y['drugqty'])
{
print "Stupid!!! You can't carry this many drugs";
$h->endpage();
exit;
}
if ($_GET['ID'] ==1)
{
$db->query("UPDATE users SET money=money-$price WHERE userid=$userid");
$db->query("UPDATE druginv SET drug1=drug1+$qty WHERE invid=$userid");
$db->query("UPDATE druginv SET drugqty=drugqty-$qty WHERE invid=$userid");
$db->query("UPDATE druginv SET buy1=buy1+$price WHERE invid=$userid");
print "You bought {$_POST['qty']} {$itemd['drugname']} for \$$price";
}
if ($_GET['ID'] ==2)
{
$db->query("UPDATE users SET money=money-$price WHERE userid=$userid");
$db->query("UPDATE druginv SET drug2=drug2+$qty WHERE invid=$userid");
$db->query("UPDATE druginv SET drugqty=drugqty-$qty WHERE invid=$userid");
$db->query("UPDATE druginv SET buy2=buy2+$price WHERE invid=$userid");
print "You bought {$_POST['qty']} {$itemd['drugname']} for \$$price";
}
if ($_GET['ID'] ==3)
{
$db->query("UPDATE users SET money=money-$price WHERE userid=$userid");
$db->query("UPDATE druginv SET drug3=drug3+$qty WHERE invid=$userid");
$db->query("UPDATE druginv SET drugqty=drugqty-$qty WHERE invid=$userid");
$db->query("UPDATE druginv SET buy3=buy3+$price WHERE invid=$userid");
print "You bought {$_POST['qty']} {$itemd['drugname']} for \$$price";
}
if ($_GET['ID'] ==4)
{
$db->query("UPDATE users SET money=money-$price WHERE userid=$userid");
$db->query("UPDATE druginv SET drug4=drug4+$qty WHERE invid=$userid");
$db->query("UPDATE druginv SET drugqty=drugqty-$qty WHERE invid=$userid");
$db->query("UPDATE druginv SET buy4=buy4+$price WHERE invid=$userid");
print "You bought {$_POST['qty']} {$itemd['drugname']} for \$$price";
}
if ($_GET['ID'] ==5)
{
$db->query("UPDATE users SET money=money-$price WHERE userid=$userid");
$db->query("UPDATE druginv SET drug5=drug5+$qty WHERE invid=$userid");
$db->query("UPDATE druginv SET drugqty=drugqty-$qty WHERE invid=$userid");
$db->query("UPDATE druginv SET buy5=buy5+$price WHERE invid=$userid");
print "You bought {$_POST['qty']} {$itemd['drugname']} for \$$price";
}
if ($_GET['ID'] ==6)
{
$db->query("UPDATE users SET money=money-$price WHERE userid=$userid");
$db->query("UPDATE druginv SET drug6=drug6+$qty WHERE invid=$userid");
$db->query("UPDATE druginv SET drugqty=drugqty-$qty WHERE invid=$userid");
$db->query("UPDATE druginv SET buy6=buy6+$price WHERE invid=$userid");
print "You bought {$_POST['qty']} {$itemd['drugname']} for \$$price";
}
if ($_GET['ID'] ==7)
{
$db->query("UPDATE users SET money=money-$price WHERE userid=$userid");
$db->query("UPDATE druginv SET drug7=drug7+$qty WHERE invid=$userid");
$db->query("UPDATE druginv SET drugqty=drugqty-$qty WHERE invid=$userid");
$db->query("UPDATE druginv SET buy7=buy7+$price WHERE invid=$userid");
print "You bought {$_POST['qty']} {$itemd['drugname']} for \$$price";
}
if ($_GET['ID'] ==8)
{
$db->query("UPDATE users SET money=money-$price WHERE userid=$userid");
$db->query("UPDATE druginv SET drug8=drug8+$qty WHERE invid=$userid");
$db->query("UPDATE druginv SET drugqty=drugqty-$qty WHERE invid=$userid");
$db->query("UPDATE druginv SET buy8=buy8+$price WHERE invid=$userid");
print "You bought {$_POST['qty']} {$itemd['drugname']} for \$$price";
}
}
}
$h->endpage();
?>