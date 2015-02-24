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

include_once('globals.php');

print '


<div class="usercmtpart">
<div><img src="images/usercomment_left.jpg" alt="" /></div>
<div class="usercmt_txtpart"> <br>
 <center> <font size="2"> <b> Shout Box </font> </center> </b>
</div>
<div><img src="images/usercomment_right.jpg" alt="" /></div>
</div>    
';



if($ir['user_level'] == 2)
	{
		echo " <br /><br /><br /> [<a href='shoutarea_staff.php'>Staff Area</a>] ";
	}

if(isset($_POST['shout']))
	{
		if($ir['lastShout'] == date("i") && $ir['user_level'] < 2)
			{
				echo "<div style='background: #FF0000;' width='100%'>Unable to shout, try again in 1 minute</div><br />";
				exit;
			}
		@$bannedDays = explode("|", $ir['sA_Ban']);
		if(@$bannedDays[1] > 0)
			{
				echo "<div style='background: #FF0000;' width='100%'>You've been banned from shouting (".number_format($bannedDays[1])." Day(s))</div><br />
					<h3>Reason: {$bannedDays[0]}</h3>";
				exit;
			}
		echo "<div style='background: #6EFF70;' width='100%'>You've shouted</div><br />";
		
		$_POST['shout'] = htmlspecialchars($db->escape($_POST['shout']));
		$_POST['shout'] = smilie($_POST['shout']);
		$_POST['shout'] = bbCode($_POST['shout']);
		
		$db->query("UPDATE `users` SET `lastShout`=".date('i')." WHERE userid=$userid");
		$db->query("INSERT INTO `shoutarea` VALUES ('NULL', $userid, '{$_POST['shout']}', ".date("d").")");
	}

	echo "<br /><br /><br /><br /><form action='#' method='post'>
		  <input type='text' name='shout' STYLE='color: black;  background-color: white;' size='70' length='70' maxlength='80'>
		  <input type='submit' STYLE='color: black;  background-color: white;' value='Shout'>
		  </form>";
		 
	$get = $db->query("SELECT * FROM `shoutarea` WHERE `Date`=".date("d")." ORDER BY `Key` DESC LIMIT 15");
	while($r = $db->fetch_row($get))	
    
    
    
		{
			$delLink = ($ir['user_level'] >= 2) ? " [<a href='shoutarea_staff.php?p=del&s={$r['Key']}'><img src='smilies/delete.png'></a>]" : "";
			$user = $db->fetch_row($db->query("SELECT `username` FROM `users` WHERE `userid`={$r['User']}"));
			$player = ($r['User'] == 0) ? "SYSTEM" : "<a href='viewuser.php?u={$r['User']}'>{$user['username']}</a>";
            
            
            print "                        
<div class='cmt_tittxt'> $player    says :</div>    
<div class='cmtbox_part'> "  ;


if($ir['user_level'] >= 2)
{
print'
<a href = "/shoutarea_staff.php?p=del&s='.$r['Key'].'"> Delete Shout  </a>  ' ;
}

print'
<div class="cmtbox_top" style="text-indent:400px;"> </div> ';

print '

<div class="cmtbox_md">
<div class="cmtcontent">'.stripslashes(htmlentities($r['Shout'],  ENT_QUOTES)).'  </div>
</div>
<div><img src="images/cmtbox_btm.jpg" alt="" /></div>
</div>


';

		}
        
        
        
	
function smilie($string)
	{
		global $dir;
		$smilie = array(":o)" => '<img src="smilies/clown.gif">',
						":s" => '<img src="smilies/confused.gif">',
						"8)" => '<img src="smilies/cool.gif">',
						":gun:" => '<img src="smilies/gun.gif">',
						"0:)" => '<img src="smilies/halo.gif">',
						":)" => '<img src="smilies/happy.gif">',
						":=)" => '<img src="smilies/drawdrop.png">',
						"$-)" => '<img src="smilies/moneyEyes.gif">',
						":$:" => '<img src="smilies/moneyBag.gif">',
						":(" => '<img src="smilies/sad.gif">',
						":shh" => '<img src="smilies/shh.gif">',
						":o" => '<img src="smilies/suprised.gif">',
						":p" => '<img src="smilies/tongue.gif">',
						"xD" => '<img src="smilies/xD.png">'
						);
		return strtr($string, $smilie);
	}
function bbCode($string)
	{
		$bb = array("[b]" => "<b>",
					"[/b]" => "</b>",
					"[u]" => "<u>",
					"[/u]" => "</u>",
					"[s]" => "<s>",
					"[/s]" => "<s>",
					"[sup]" => "<sup>",
					"[/sup]" => "</sup>",
					"[sub]" => "<sub>",
					"[/sub]" => "</sub>",
					"[time]" => date('G:i (A)')
					);
		return strtr($string, $bb);
	}
?>