<?php
include "globals.php";

if ($ir['jail'] or $ir['hospital'])
	{
	die("This page cannot be accessed while in jail or hospital.");
	}

if (!$_GET['spend'])
	{
	print "

<div class='generalinfo_txt'>
<div><img src='images/info_left.jpg' alt='' /></div>
<div class='info_mid'><h2 style='padding-top:10px;'> The Blackwatch Corporation</h2></div>
<div><img src='images/info_right.jpg' alt='' /></div> </div>
<div class='generalinfo_simple'><br /> <br /><br />



You enter a musty room, with a light and a table in the middle of it, <br>
A man in a black suit bearing a nautical star on the lapell nods to you. He places a piece of paper on the table. <br>
'You can hire us to protect you from any trouble you're having, you are assigned one squadron for a certain amount of time.' <br>

<br />
<h3>Pay With Money</h3>
<a href='bodyguard.php?spend=5minsM'>Hire a Squad for 1 hour - \$5,000,000</a><br />
<a href='bodyguard.php?spend=10minsM'>Hire for 2 hours - \$10,000,000</a><br />
<a href='bodyguard.php?spend=30minsM'>Hire for 3 hours - \$30,000,000</a><br />
<a href='bodyguard.php?spend=1hourM'>Hire gor 6 hours - \$60,000,000</a><br />
";
	}
  else
	{
	if ($_GET['spend'] == '5minsM')
		{
		if ($ir['money'] < 5000000)
			{
			print "You don't have enough money to hire the Blackwatch Corporation!";
			}
		  else
			{
			$db->query("UPDATE users SET bguard=bguard+60,money=money-5000000 WHERE userid=$userid");
			print "Congratulations, You paid the Blackwatch Corporation \$5,000,000 to protect you for 1 hour.";
			}
		}
	  else
	if ($_GET['spend'] == '10minsM')
		{
		if ($ir['money'] < 10000000)
			{
			print "You don't have enough money to hire the Blackwatch Corporation!";
			}
		  else
			{
			$db->query("UPDATE users SET bguard=bguard+120,money=money-10000000 WHERE userid=$userid");
			print "Congratulations, You paid the Blackwatch Corporation \$10,000,000 to protect you for 2 hours.";
			}
		}
	  else
	if ($_GET['spend'] == '30minsM')
		{
		if ($ir['money'] < 30000000)
			{
			print "You don't have enough money to hire the Blackwatch Corporation!";
			}
		  else
			{
			$db->query("UPDATE users SET bguard=bguard+180,money=money-30000000 WHERE userid=$userid");
			print "Congratulations, You paid the Blackwatch Corporation \$30,000,000 to protect you for 3 hours.";
			}
		}
	  else
	if ($_GET['spend'] == '1hourM')
		{
		if ($ir['money'] < 60000000)
			{
			print "You don't have enough money to hire the Blackwatch Corporation!";
			}
		  else
			{
			$db->query("UPDATE users SET bguard=bguard+240,money=money-60000000 WHERE userid=$userid");
			print "Congratulations, You paid the Blackwatch Corporation \$60,000,000 to protect you for 6 hours.";
			}
		}
	}

$h->endpage();
?>