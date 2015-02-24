<?php
/**
 * @name promo.php
 * @author Analog
 * @link http://www.krbjdesigns.com
 * @version 1.0.1
 * @copyright All rights reserved by Analog and KRBJ Designs 2011
 * Permission is granted to use and distribute this script without charge.
 * This script can be edited/altered and any edits/alterations are the sole
 * property of the auther of the edits/alterations. The altered code
 * can be distributed freely so long as a copy of the original code
 * is distributed along with the new script.
 * 
 * To sum that up: you can basically do what you want, but any works
 * derived from this script must be distributed with a copy of the
 * original script.
 */
include "globals.php";
 
if($ir['user_level'] != 2)
    {
        print "<h1>Access Denied!</h1>";
        $h->endpage();
        exit;
    }
 
if(isset($_GET['action']) && $_GET['action'] == "del")
    {
        $id = abs($_GET['id']);
        $db->query("DELETE FROM promo WHERE id = $id");
        print "<h2>Promo Code Deleted</h2>";
    }
     
if(isset($_GET['action']) && $_GET['action'] == "add")
    {
        if(preg_match("/[^A-Za-z0-9 ]/", $_POST['code']))
            {
                print "<h2>Promo code can only contain letters, numbers, and spaces</h2>";
            }
        else
            {
                $code = $_POST['code'];
                $money = abs($_POST['money']);
                $crystals = abs($_POST['crystals']);
                $donor = abs($_POST['donor']);
                $db->query("INSERT INTO promo VALUES('','$code', 0,$crystals, $money, $donor)");
                print "<h2>Promo Code Added</h2>";
            }
    }
 
print <<<EOF
<div style='width: 450px; margins: auto; padding: 5px; text-align: left; border: 1px solid black;'>
    Welcome to the promo code control area. From this one area you have full access to manage all of the 
    promo codes that are currently available to new players when they register. This allows you to create multiple special 
    offers to new players. 
</div>
<form action='promo.php?action=add' method='post'>
<table>
    <tr>
        <th colspan='2'>
            Add New Code
        </th>
    </tr>
    <tr>
        <td>Code:</td>
        <td><input type='text' name='code' /></td>
    </tr>
    <tr>
        <td>Money:</td>
        <td><input type='text' name='money' value='0' /></td>
    </tr>
    <tr>
        <td>Crystals:</td>
        <td><input type='text' name='crystals' value='0' /></td>
    </tr>
    <tr>
        <td>Donor Days:</td>
        <td><input type='text' name='donor' value='0' /></td>
    </tr>
    <tr>
        <th colspan='2'>
            <input type='submit' value='Add Promo Code' />
        </th>
    </tr>
</table>
</form>
EOF;
 
$q = $db->query("SELECT * FROM promo ORDER BY id DESC");
print <<<EOF
<table width='95%' border='1'>
    <tr>
        <th colspan='6'>
            Current Promo Codes Available
        </th>
    </tr>
    <tr>
        <th>Promo Code</th>
        <th>Used</th>
        <th>Money</th>
        <th>Crystals</th>
        <th>Donor Days</th>
        <th>Action</th>
    </tr>
EOF;
 
while($x = $db->fetch_row($q))
    {
        print <<<EOF
        <tr>
            <td>{$x['code']}</td>
            <td>{$x['used']}</td>
            <td>{$x['cash']}</td>
            <td>{$x['crystals']}</td>
            <td>{$x['donor']}</td>
            <td><a href='promo.php?action=del&id={$x['id']}'>Delete</a></td>
        </tr>
EOF;
    }
 
print <<<EOF
</table>
EOF;
 
$h->endpage();
?>