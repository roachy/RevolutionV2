<?php
include "globals.php";
 
if($ir['ctreat'] == 1)
{
die("You already have picked your christmas treat,but hey there's always next year!<br>");
}
 
 
{
 
echo '
<h2><font color=red>C</font><font color=green>h</font><font color=blue>r</font><font colour=pink>i</font><font color=white>s</font><font color=red>t</font><font color=green>m</font><font color=blue>a</font><font colour=pink>s</font>  <font color=white>T</font><font color=red>r</font><font color=green>e</font><font color=blue>a</font><font colour=pink>t</font><font color=purple>s</font>
</h2>';
 
echo '<img src="http://www.mybrightonandhove.org.uk/images/uploaded/scaled/st_peters_christmas.jpg" border="0" alt="" />
';
 
 
print "<h1><font color=darkred>The Revolution Staff & Development team wish you a Merry Christmas and a Happy New Year! We couldn't have done this without your support!
</h1>";
echo '<a href="?action=gift1">
Gift 1 </a><br>';
 
 
 
echo '<a href="?action=gift2">
Gift 2 </a><br>';
 
echo '<a href="?action=gift3">
Gift 3</a><br>';
 
echo '<a href="?action=gift4">
Gift 4</a><br>';
 
echo '<a href="?action=gift5">
Gift 5</a><br>';
 
 
 
 
 
 
}
If($_GET['action'] == 'gift1')
{
       $db->query("UPDATE users SET crystals=crystals+20 WHERE userid=".$ir['userid']);
       $db->query("UPDATE users SET ctreat=ctreat+1 WHERE userid=".$ir['userid']);
       Echo '
 
<h1>You won 20 crystals, Merry Christmas!</h1>';
       $h->endpage();
       exit;
 }
If($_GET['action'] == 'gift2')
{
       $db->query("UPDATE users SET crystals=crystals+50 WHERE userid=".$ir['userid']);
       $db->query("UPDATE users SET ctreat=ctreat+1 WHERE userid=".$ir['userid']);
       Echo '
 
<h1>You won 50 crystals! Merry Christmas!</h1>';
       $h->endpage();
       exit;
 }
If($_GET['action'] == 'gift3')
{
       $db->query("UPDATE users SET money=money+10000 WHERE userid=".$ir['userid']);
       $db->query("UPDATE users SET crystals=crystals+25 WHERE userid=".$ir['userid']);
       $db->query("UPDATE users SET ctreat=ctreat+1 WHERE userid=".$ir['userid']);
       Echo '
 
<h1>You won 25 crystals and $10,000. Merry Christmas!</h1>';
       $h->endpage();
       exit;
 }
If($_GET['action'] == 'gift4')
{
       $db->query("UPDATE users SET crystals=crystals+1 WHERE userid=".$ir['userid']);
       $db->query("UPDATE users SET ctreat=ctreat+1 WHERE userid=".$ir['userid']);
       Echo '
 
<h1>You won 1 crystal. Merry Christmas!</h1>';
       $h->endpage();
       exit;
 }
If($_GET['action'] == 'gift5')
{
       $db->query("UPDATE users SET crystals=crystals+100 WHERE userid=".$ir['userid']);
       $db->query("UPDATE users SET ctreat=ctreat+1 WHERE userid=".$ir['userid']);
       Echo '
 
<h1>You won 100 crystals, Merry Christmas!</h1>';
       $h->endpage();
       exit;
 }
 
$h->endpage();
?>