<?php
 
include "globals.php";
 
$d=$db->query("SELECT * FROM druginv where invid={$ir['userid']}");
$t=$db->fetch_row($d);
print "
<h3>The Drug Deal</h3>";
 
$used=1000-$t['drugqty']; 
$format = number_format($t['drugqty']);
$format1 = number_format($used);
print "
<table width=50% cellspacing=1 class='table'><tr><th colspan='3'>Your Drug Pouch</th></tr>
<tr><th>Total Capacity</th><th>Space Used</th><th>Free Space</th></tr>
<tr><td>1,000</td><td>$format1<td>$format</td></tr><tr><td colspan='3'><a href='/druginv.php'font color='red'><b>Click here to check your Drug Inventory</b></font></a></td></tr></table>
 
";
 
 
 
print"<font color='red'>(remember prices fluctuate daily)</font>
 
<table width=95% cellspacing=1 class='table'>
 
 
<tr><th>Drug Name</th><th>Current Price</th><th>Lowest Recorded Price</th><th>Highest Recorded Price</th><th>Buy Quantity</th><th>Action</th></tr>";
 
$q=$db->query("SELECT * FROM drugs");
while($r=$db->fetch_row($q))
 
{
 
 
print"<tr><td>{$r['drugname']}</td><td>\${$r['price']} each</td><td>\${$r['lowprice']} each</td><td>\${$r['highprice']} each</td><td><form action='drugbuy.php?ID={$r['drugid']}' method='post'>Qty: <input type='text' style='color:black;' name='qty' size='4' value='0' maxlength='4' /><td><input type='submit' style='color:black;' value='Buy' /></td></form></td></tr>";
}
print"</table>";
 
 
$h->endpage();
?>