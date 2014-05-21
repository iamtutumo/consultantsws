<?php

include("incls/connector.php");

if(isSet($_POST['username']))

{

$username = $_POST['username'];



$sql_check = mysql_query("select userid from users where username='".$username."'") or die(mysql_error());



if(mysql_num_rows($sql_check))

{

echo '<img src="images/not-available.png" />.<font color="red"><STRONG>'.$username.'</STRONG> is not available.</font> ';

}

else

{

echo '<img src="images/available.png" />';

}


}



?>