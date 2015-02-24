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
$q=$db->query("SELECT * FROM druginv WHERE invid=$userid");
$r=$db->fetch_row($q);
if(mysql_num_rows($q) == 0)
{
print "Stop Trying to Cheat";
}
else
{
 
if ($_GET['ID'] ==1)
{
$x=$db->query("SELECT * FROM drugs WHERE drugid=1");
$y=$db->fetch_row($x);
 
$price=($y['price']*$_POST['qty']);
$qty=($_POST['qty']);
 
if (strlen($qty) > 4) 
{
print "Invalid entry muppet";
$h->endpage();
exit;
}
 
if($_POST['qty'] > $r['drug1'])
{
print "Don't be Stupid you don't have that many.";
}
else
{
$db->query("UPDATE users SET money=money+$price WHERE userid=$userid");
$db->query("UPDATE druginv SET drug1=drug1-$qty WHERE invid=$userid");
$db->query("UPDATE druginv SET drugqty=drugqty+$qty WHERE invid=$userid");
$db->query("UPDATE druginv SET sell1=sell1+$price WHERE invid=$userid");
print "You sold {$_POST['qty']} {$y['drugname']} for \$$price";
}
}
 
if ($_GET['ID'] ==2)
{
$x=$db->query("SELECT * FROM drugs WHERE drugid=2");
$y=$db->fetch_row($x);
 
$price=($y['price']*$_POST['qty']);
$qty=($_POST['qty']);
 
if($_POST['qty'] > $r['drug2'])
{
print "Don't be Stupid you don't have that many.";
}
else
{
$db->query("UPDATE users SET money=money+$price WHERE userid=$userid");
$db->query("UPDATE druginv SET drug2=drug2-$qty WHERE invid=$userid");
$db->query("UPDATE druginv SET drugqty=drugqty+$qty WHERE invid=$userid");
$db->query("UPDATE druginv SET sell2=sell2+$price WHERE invid=$userid");
print "You sold {$_POST['qty']} {$y['drugname']} for \$$price";
}
}
 
if ($_GET['ID'] ==3)
{
$x=$db->query("SELECT * FROM drugs WHERE drugid=3");
$y=$db->fetch_row($x);
 
$price=($y['price']*$_POST['qty']);
$qty=($_POST['qty']);
 
if($_POST['qty'] > $r['drug3'])
{
print "Don't be Stupid you don't have that many.";
}
else
{
$db->query("UPDATE users SET money=money+$price WHERE userid=$userid");
$db->query("UPDATE druginv SET drug3=drug3-$qty WHERE invid=$userid");
$db->query("UPDATE druginv SET drugqty=drugqty+$qty WHERE invid=$userid");
$db->query("UPDATE druginv SET sell3=sell3+$price WHERE invid=$userid");
print "You sold {$_POST['qty']} {$y['drugname']} for \$$price";
}
}
 
if ($_GET['ID'] ==4)
{
$x=$db->query("SELECT * FROM drugs WHERE drugid=4");
$y=$db->fetch_row($x);
 
$price=($y['price']*$_POST['qty']);
$qty=($_POST['qty']);
 
if($_POST['qty'] > $r['drug4'])
{
print "Don't be Stupid you don't have that many.";
}
else
{
$db->query("UPDATE users SET money=money+$price WHERE userid=$userid");
$db->query("UPDATE druginv SET drug4=drug4-$qty WHERE invid=$userid");
$db->query("UPDATE druginv SET drugqty=drugqty+$qty WHERE invid=$userid");
$db->query("UPDATE druginv SET sell4=sell4+$price WHERE invid=$userid");
print "You sold {$_POST['qty']} {$y['drugname']} for \$$price";
}
}
 
if ($_GET['ID'] ==5)
{
$x=$db->query("SELECT * FROM drugs WHERE drugid=5");
$y=$db->fetch_row($x);
 
$price=($y['price']*$_POST['qty']);
$qty=($_POST['qty']);
 
if($_POST['qty'] > $r['drug5'])
{
print "Don't be Stupid you don't have that many.";
}
else
{
$db->query("UPDATE users SET money=money+$price WHERE userid=$userid");
$db->query("UPDATE druginv SET drug5=drug5-$qty WHERE invid=$userid");
$db->query("UPDATE druginv SET drugqty=drugqty+$qty WHERE invid=$userid");
$db->query("UPDATE druginv SET sell5=sell5+$price WHERE invid=$userid");
print "You sold {$_POST['qty']} {$y['drugname']} for \$$price";
}
}
 
if ($_GET['ID'] ==6)
{
$x=$db->query("SELECT * FROM drugs WHERE drugid=6");
$y=$db->fetch_row($x);
 
$price=($y['price']*$_POST['qty']);
$qty=($_POST['qty']);
 
if($_POST['qty'] > $r['drug6'])
{
print "Don't be Stupid you don't have that many.";
}
else
{
$db->query("UPDATE users SET money=money+$price WHERE userid=$userid");
$db->query("UPDATE druginv SET drug6=drug6-$qty WHERE invid=$userid");
$db->query("UPDATE druginv SET drugqty=drugqty+$qty WHERE invid=$userid");
$db->query("UPDATE druginv SET sell6=sell6+$price WHERE invid=$userid");
print "You sold {$_POST['qty']} {$y['drugname']} for \$$price";
}
}
 
if ($_GET['ID'] ==7)
{
$x=$db->query("SELECT * FROM drugs WHERE drugid=7");
$y=$db->fetch_row($x);
 
$price=($y['price']*$_POST['qty']);
$qty=($_POST['qty']);
 
if($_POST['qty'] > $r['drug7'])
{
print "Don't be Stupid you don't have that many.";
}
else
{
$db->query("UPDATE users SET money=money+$price WHERE userid=$userid");
$db->query("UPDATE druginv SET drug7=drug7-$qty WHERE invid=$userid");
$db->query("UPDATE druginv SET drugqty=drugqty+$qty WHERE invid=$userid");
$db->query("UPDATE druginv SET sell7=sell7+$price WHERE invid=$userid");
print "You sold {$_POST['qty']} {$y['drugname']} for \$$price";
}
}
 
if ($_GET['ID'] ==8)
{
$x=$db->query("SELECT * FROM drugs WHERE drugid=8");
$y=$db->fetch_row($x);
 
$price=($y['price']*$_POST['qty']);
$qty=($_POST['qty']);
 
if($_POST['qty'] > $r['drug8'])
{
print "Don't be Stupid you don't have that many.";
}
else
{
$db->query("UPDATE users SET money=money+$price WHERE userid=$userid");
$db->query("UPDATE druginv SET drug8=drug8-$qty WHERE invid=$userid");
$db->query("UPDATE druginv SET drugqty=drugqty+$qty WHERE invid=$userid");
$db->query("UPDATE druginv SET sell8=sell8+$price WHERE invid=$userid");
print "You sold {$_POST['qty']} {$y['drugname']} for \$$price";
}
}
 
}
}
$h->endpage();
?>