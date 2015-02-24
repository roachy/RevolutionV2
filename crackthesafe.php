<?php
include "globals.php";
if($ir['guess'] >= 10)
{
die("You've already attempted to crack the safe today, come back tomorrow.");
}
$db->query("SELECT * FROM users WHERE guess='$guess' AND userid='$userid'");
 
 
print"<font size=+2 color=red><i><u><center>Crack The Safe...</font></i></u></center>
 
You enter the bank with your gang, tell everyone to get on the floor and keep the rest of your gang outside doing crowd control.<br>
You go into the bank room, and try to crack the safe. </br>
 
 
<center>You have used <font color=red>{$ir['guess']}</font> of 10 attempts.</center>";
?>
<html>
 
<body>
<center><form method="POST"  action="crackthesafe1.php">
  
    <select name="n1">
      <option>0</option>
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
      <option>6</option>
      <option>7</option>
      <option>8</option>
      <option>9</option>
                </select>
    <select name="n2">
      <option>0</option>
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
      <option>6</option>
      <option>7</option>
      <option>8</option>
      <option>9</option>
                </select>
    <select name="n3">
      <option>0</option>
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
      <option>6</option>
      <option>7</option>
      <option>8</option>
      <option>9</option>
                </select>
    <select name="n4">
      <option>0</option>
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
      <option>6</option>
      <option>7</option>
      <option>8</option>
      <option>9</option>
                </select>
    <input type="submit" value="Crack"></center> 
</p>
</form>

</body>
</html>