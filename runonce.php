<?php
include "globals.php";
 
$q=$db->query("SELECT * FROM users");
 
while($r=$db->fetch_row($q))
{
$db->query("INSERT INTO druginv VALUES({$r['userid']}, 0, 0, 0, 0, 0, 0, 0, 0, 1000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)");
}
 
$h->endpage();
?>