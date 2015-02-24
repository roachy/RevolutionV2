<?php
//-----------------------------------
// Mod created by Dave Macaulay (daavem@googlemail.com)
// For free use only with Mccodes V2
// For use of mod this must remain intack!
//------------------------------------
require_once('sglobals.php');
$_GET['ID'] = abs((int) $_GET['ID']);
 
if($_POST) {
    foreach($_POST as $k => $v){
        $db->query("UPDATE `users` SET ".$k."='".$v."' WHERE userid=".$_POST['userid']);
    }
    echo '<b><u>User edits saved!</u></b>
 
 
    The edits have now been saved. Please click <a href='.basename($_SERVER['SCRIPT_FILENAME']).'>here</a> if you would like to edit another user.';
    $h->endpage();
    exit;
}
 
if(!$_GET['ID'] AND !$_POST['userid']) {
    echo '
    <b><u>Editing a user</u></b>
 
 
    Please select the user you wish to edit below, Some of the edit fields have been disabled and hidden to protect certain details about the user.
     
 
 
    <table width="70%" class="table" cellpadding="5" cellspacing="1">
        <tr>
            <th width="50%">Userid</th>
            <th width="50%">Username</th>
        </tr>
        <tr>
            <td style="text-align: center;">
                <form action="'.basename($_SERVER['SCRIPT_FILENAME']).'" method="get">
                <input type="text" name="ID" />
 
                <input type="submit" value="Edit" />
                </form>
            </td>
            <td style="text-align: center;">
                <form action="'.basename($_SERVER['SCRIPT_FILENAME']).'" method="get">
                '.user_dropdown($c, 'ID').'
 
                <input type="submit" value="Edit" />
                </form>
            </td>
        </tr>
    </table>
    ';
    $h->endpage();
    exit;
}
 
function showTable($variable) {
    if ($variable === true) {
        return 'true';
    } else if ($variable === false) {
        return 'false';
    } else if ($variable === null) {
        return 'null';
    } else if (is_array($variable)) {
        $html = '
 
 
        <table width="80%" class="table" cellpadding="5" cellspacing="1" style="text-align: left;">
        <tr><th colspan="2">Currently editing user '.$variable['username'].' ['.$_GET['ID'].'] <div style="float: right;"><a href='.basename($_SERVER['SCRIPT_FILENAME']).'">Back</a></div></th></tr>
        <tr><th width="20%" style="text-align: left;">Field</th><th style="text-align: left;">Value</th></tr>';
        foreach ($variable as $key => $value) {
            $value = showTable($value);
            $hide = array('userpass');
            if(!in_array($key, $hide)) {
                $html .= '<tr><td style="text-align: left;">'.ucfirst($key).'</td>
                <td style="text-align: left;">
                    <input style="color:black;" type="text" name="'.$key.'" value="'.$value.'" size="70">
                </td></tr>';
            }
        }
        return $html;
    } else {
        return strval($variable);
    }
}
 
$ro = mysql_query("SELECT * FROM users WHERE userid=".$_GET['ID']);
if(!mysql_num_rows($ro)) {
    echo 'No user found!
 
    <a href='.basename($_SERVER['SCRIPT_FILENAME']).'>Back</a>';
    $h->endpage();
    exit;   
}
$r = mysql_fetch_assoc($ro);
 
echo '<form action="'.basename($_SERVER['SCRIPT_FILENAME']).'" method="post">';
echo showTable($r);
echo '<tr><td colspan="2"><input type="submit" value="Save new settings" /></td></tr></form>
</table>
 
 
';
$h->endpage();
?>