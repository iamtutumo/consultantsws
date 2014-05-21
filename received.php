<?php
// Inialize session
session_start();
// Check, if user is already login, then jump to secured page
if (!isset($_SESSION['username']) && !isset($_SESSION['category'])) {
      

header('Location:index.php');
}
?>

<!DOCTYPE html>
<html dir="ltr" lang="en-US"><head>
    <title>Home | Consultant</title>
    <meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width">

    <!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <link rel="stylesheet" href="style.css" media="screen">
    <!--[if lte IE 7]><link rel="stylesheet" href="style.ie7.css" media="screen" /><![endif]-->
    <link rel="stylesheet" href="style.responsive.css" media="all">


    <script src="incls/jquery.js"></script>
    <script src="incls/script.js"></script>
    <script src="incls/script.responsive.js"></script>



</head>
<body>
<div id="main">
<?php include('incls/header.php') ?>
<nav class="nav clearfix">
    <ul class="hmenu"><li><a href="#">Home</a></li><li><li><a href="log_out.php"><img src=images/quit_1.png></a></l</ul> 
    </nav>
	
<div class="sheet clearfix">
            <div class="layout-wrapper clearfix">
                <div class="content-layout">
                    <div class="content-layout-row">
                    <div class="layout-cell sidebar1 clearfix">
					<div class="vmenublock clearfix">
                      <div class="vmenublockcontent">
                       <ul class="vmenu"><li><a href="profile.php" > My Profile</a></li<li><a href="#" class="active">Unread Queries </a></li><li><a href="assist.php"> Send Assistace</a></li></ul>
                
                      </div>
                    </div>
				   </div>
                <div align="center">
              <table width="100%" border="0" cellpadding="1" cellspacing="1">
                  <tr> 
                        <td width="358" height="20" valign="middle" bgcolor="#8FC4F7"> 
                         <div align="center"><b><font color="#FFFFFF">Welcome &nbsp<?php echo $_SESSION['username'];?> </font></b></div>
                        </td>
                  </tr>
               </table>	 
          <?php 
	 	 include("incls/connector.php");	
	 $query="SELECT * FROM message WHERE recipient ='{$_SESSION['username']}' and status='UNREAD'";
		
		  $resource=mysql_query($query,$conn);
		  echo "
		<table align=\"center\" border=\"0\" width=\"70%\">
		<tr>
		<td><b>message</b></td> <td><b>sender.</b></td></td><td><b>Time & Date</b></td><td><b>Action</b></td></tr> ";
while($result=mysql_fetch_array($resource))
	{ 
	echo "<tr><td>".$result[3]."</td><td>".$result[1]."</td><td>".$result[4]."</td><td>
	<a href=\"reader.php?mesid=".$result[0]."\"><img border=\"0\" src=\"images/read.png\"/></a>
	</td></tr>";
	} echo "</table>";
	 ?>
	
	
         </div>
                    </div>
                </div>
            </div>
    </div>
	<?php include("incls/footer.php") ?>

</div>


</body></html>