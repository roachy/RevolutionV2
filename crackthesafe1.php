<?php
include "globals.php";
if($ir['guess'] >= 10)
{
die("I wouldn't risk going back to the bank, the area is too hot.");
}
 
$n1 = !isset($_POST['n1'])? NULL : $_POST['n1']; 
$n2 = !isset($_POST['n2'])? NULL : $_POST['n2']; 
$n3 = !isset($_POST['n3'])? NULL : $_POST['n3']; 
$n4 = !isset($_POST['n4'])? NULL : $_POST['n4']; 
$welard = $n1 . $n2 . $n3 . $n4;

$codes = array(
	9456,
	6735,
	2937,
	2384,
	8934
);


$code = array_rand($codes, 5);   // Cycles through the array we have set above and chooses a code.
$asd = strcmp($welard, $code);
 
if ($asd === 0)
{
$db->query("UPDATE users SET money=money+1200000 WHERE userid=$userid");
$db->query("UPDATE users SET guess=10 WHERE userid=$userid");
 
echo "<b>You hear a click, the safe opens and in there sits $1,200,000.
 
<a href='index.php'>Back</a></b>";
}
else
echo "<b>You don't hear a click, I guess the code was wrong.</b>
<p id='last_code'> $welard </p>
 
<a href='crackthesafe.php'>Back</a>";
$db->query("UPDATE users SET guess=guess+1 WHERE userid=$userid");