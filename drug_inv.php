<?php
 
include "globals.php";
print"<h3>Your Drug Inventory</h3>";
 
$q=$db->query("SELECT * FROM druginv where invid=$userid");
$r=$db->fetch_row($q);
$used=1000-$r['drugqty']; 
$format = number_format($r['drugqty']);
$format1 = number_format($used);
print "
<table width=50% cellspacing=1 class='table'><tr><th colspan='3'>Your Drug Pouch</th></tr>
<tr><th>Total Capacity</th><th>Space Used</th><th>Free Space</th></tr>
<tr><td>1,000</td><td>$format1<td>$format</td></tr></table>
 
";
 
print "
<table width=95% cellspacing=1 class='table'><tr><th>Drug Name</th><th>Amount Owned</th><th>Total Spent</th><th>Total Earnt</th><th>Total Profit</th><th>Sell Quantity</th><th>Action</th></tr>";
 
$formatted1 = number_format($r['buy1']);
$formatted2 = number_format($r['sell1']);
 
print"<tr>
<td>Space Dust</td><td>{$r['drug1']}</td><td>\$$formatted1</td><td>$$formatted2</td>";
 
$total=$r['sell1'] - $r['buy1'];
$formatted3 = number_format($total);
print"<td>$$formatted3</td>
 
<td><form action='drugsell.php?ID=1' method='post'>Qty: <input type='text' style='color:black;' name='qty' size='4' value='{$r['drug1']}' maxlength='4' /><td><input type='submit' style='color:black;' value='Sell' /></td></form></td>
</tr>";      
 
$formatted1 = number_format($r['buy2']);
$formatted2 = number_format($r['sell2']);
 
print"<tr>
<td>Crackle</td><td>{$r['drug2']}</td><td>\$$formatted1</td><td>$$formatted2</td>";
 
$total=$r['sell2'] - $r['buy2'];
$formatted3 = number_format($total);
print"<td>$$formatted3</td>
 
 
<td><form action='drugsell.php?ID=2' method='post'>Qty: <input type='text' style='color:black;' name='qty' size='4' value='{$r['drug2']}' maxlength='4' /><td><input type='submit' style='color:black;' value='Sell' /></td></form></td>
</tr>";      
 
$formatted1 = number_format($r['buy3']);
$formatted2 = number_format($r['sell3']);
 
print"<tr>
<td>Galactic Ganja</td><td>{$r['drug3']}</td><td>\$$formatted1</td><td>$$formatted2</td>";
 
$total=$r['sell3'] - $r['buy3'];
$formatted3 = number_format($total);
print"<td>$$formatted3</td>
 
 
<td><form action='drugsell.php?ID=3' method='post'>Qty: <input type='text' style='color:black;' name='qty' size='4' value='{$r['drug3']}' maxlength='4' /><td><input type='submit' style='color:black;' value='Sell' /></td></form></td>
</tr>";      
 
$formatted1 = number_format($r['buy4']);
$formatted2 = number_format($r['sell4']);
 
print"<tr>
<td>Wiz</td><td>{$r['drug4']}</td><td>\$$formatted1</td><td>$$formatted2</td>";
 
$total=$r['sell4'] - $r['buy4'];
$formatted3 = number_format($total);
print"<td>$$formatted3</td>
 
<td><form action='drugsell.php?ID=4' method='post'>Qty: <input type='text' style='color:black;' name='qty' size='4' value='{$r['drug4']}' maxlength='4' /><td><input type='submit' style='color:black;' value='Sell' /></td></form></td>
</tr>";      
 
$formatted1 = number_format($r['buy5']);
$formatted2 = number_format($r['sell5']);
 
print"<tr>
<td>Star Smack</td><td>{$r['drug5']}</td><td>\$$formatted1</td><td>$$formatted2</td>";
 
$total=$r['sell5'] - $r['buy5'];
$formatted3 = number_format($total);
print"<td>$$formatted3</td>
 
<td><form action='drugsell.php?ID=5' method='post'>Qty: <input type='text' style='color:black;' name='qty' size='4' value='{$r['drug5']}' maxlength='4' /><td><input type='submit' style='color:black;' value='Sell' /></td></form></td>
</tr>";      
 
$formatted1 = number_format($r['buy6']);
$formatted2 = number_format($r['sell6']);
 
print"<tr>
<td>Uranus Uppers</td><td>{$r['drug6']}</td><td>\$$formatted1</td><td>$$formatted2</td>";
 
$total=$r['sell6'] - $r['buy6'];
$formatted3 = number_format($total);
print"<td>$$formatted3</td>
 
<td><form action='drugsell.php?ID=6' method='post'>Qty: <input type='text' style='color:black;' name='qty' size='4' value='{$r['drug6']}' maxlength='4' /><td><input type='submit' style='color:black;' value='Sell' /></td></form></td>
</tr>";      
 
$formatted1 = number_format($r['buy7']);
$formatted2 = number_format($r['sell7']);
 
print"<tr>
<td>Krakanite</td><td>{$r['drug7']}</td><td>\$$formatted1</td><td>$$formatted2</td>";
 
$total=$r['sell7'] - $r['buy7'];
$formatted3 = number_format($total);
print"<td>$$formatted3</td>
 
<td><form action='drugsell.php?ID=7' method='post'>Qty: <input type='text' style='color:black;' name='qty' size='4' value='{$r['drug7']}' maxlength='4' /><td><input type='submit' style='color:black;' value='Sell' /></td></form></td>
</tr>";      
 
$formatted1 = number_format($r['buy8']);
$formatted2 = number_format($r['sell8']);
 
print"<tr>
<td>Moon Mushrooms</td><td>{$r['drug8']}</td><td>\$$formatted1</td><td>$$formatted2</td>";
 
$total=$r['sell8'] - $r['buy8'];
$formatted3 = number_format($total);
print"<td>$$formatted3</td>
 
<td><form action='drugsell.php?ID=8' method='post'>Qty: <input type='text' style='color:black;' name='qty' size='4' value='{$r['drug8']}' maxlength='4' /><td><input type='submit' style='color:black;' value='Sell' /></td></form></td>
</tr>";      
 
print"</table>";
$h->endpage();
?>