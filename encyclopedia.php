
<?php
include "globals.php";
print "
 
<font color='#FFFFFF'><hr width='95%'><h3>Global Item Database</h3></font><hr width='95%'/>";
 
$sql1 = $db->query("SELECT * FROM items");
$count = $db->num_rows($sql1);
$numrows = $db->num_rows($sql1);
 
$items = 10;
$page = 1;




// Start of Org table \\
echo "<table width=95% class=table>";
echo "  <tr border>";
echo "      <td>Item Image</td>";
echo "      <td>Item ID</td>";
echo "      <td>Item Name</td>";
echo "      <td>Item Description</td>";
echo "      <td>Item Buy Price</td>";
echo "      <td>Item Sell Price</td>";
echo "      <td>Item Damage</td>";
echo "      <td>Item Armour</td>";
echo "  </tr>";

for($i = 0; $i < $count; $i++){

$row = mysql_fetch_array($sql1);
$bprice = number_format ( $row['itmbuyprice'], 0);
$sprice = number_format ( $row['itmsellprice'], 0);
echo "  <tr>";
if(!$row['itmimg']){
echo "      <td>Image not found</td>";
}else{
echo "      <td><img src='".$row['itmimg']."'  width=125/></td>";
}
echo "      <td>".$row['itmid']."</td>";
echo "      <td><a href='iteminfo.php?ID={$row['itmid']}'>".$row['itmname']."</a></td>";
echo "      <td>".$row['itmdesc']."</td>";
echo "      <td> $".$bprice."</td>";
echo "      <td> $".$sprice."</td>";
echo "      <td>".$row['weapon']."</td>";
echo "      <td>".$row['armor']."</td>";
echo "  </tr>";
}
echo "</table>";
echo "There are currently ".$count." items listed in our database.";
$h->endpage(); 
?>