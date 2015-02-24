<?php

// Bail yourself feature
// Author: Roach
// Date: 08/12/2014
// Description: Allows the user to bail themselves out of Jail for a reasonable amount of crystals, will probably be nerfed.

include "globals.php";


$_GET['ID']=abs((int) $_GET['ID']);
	$r=$db->fetch_row($db->query("SELECT * FROM users WHERE userid={$_GET['ID']}")); // Get all the user data of the specified user, assign it to a variable called $r.

if(!$r['userid']) // If a userid isn't found
{
  die("Invalid user"); // He must not exist.
}

if(!$r['jail']) // If they're not in jail.
{
  die("That user is not in jail!"); // Obviously they aren't in jail.
}

$cost=$r['level']*2; // The cost of bailing yourself out is your level * 2 in crystals.

$cf=number_format($cost); // Format the number, incase we got over thousands.

if($ir['crystals'] < $cost) // If the user doesn't have the specified crystals.
{
  die("Sorry, you do not have enough crystals to bail yourself out. You need $cf crystals."); // Let them know.
}

// If there's no problem with anything, let them bail themselves out.
  print "You successfully paid your own bail for $cf.<br /> 
  &gt; <a href='jail.php'>Back</a>";
  $db->query("UPDATE users SET crystals=crystals-{$cost} WHERE userid=$userid"); // Take away the cost from their crystals.
  $db->query("UPDATE users SET jail=0 WHERE userid={$r['userid']}"); // Let them the fuck out of jail.
  event_add($r['userid'], "<a href='viewuser.php?u={$ir['userid']}'>You bailed yourself out of Jail.", $c); // Let them know via our event system.
  
$h->endpage();
?>
