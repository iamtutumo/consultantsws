<?php
// Inialize session
session_start();
// Check, if user is already login, then jump to secured page
if (!isset($_SESSION['username']) || !isset($_SESSION['category'])) {
      
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
<header class="header clearfix">


    <div class="shapes">
<h1 class="headline" data-left="51.57%">
    <a href="#">The Online Consultants</a>
</h1>
<h2 class="slogan" data-left="51.57%">Happy to assist</h2>


            </div>            
</header>
<nav class="nav clearfix">
    <ul class="hmenu"><li><li><a href="log_out.php"><img src=images/quit_1.png></a></l</ul> 
    </nav>
<div class="sheet clearfix">
            <div class="layout-wrapper clearfix">
                <div class="content-layout">
                    <div class="content-layout-row">
                    <div class="layout-cell sidebar1 clearfix">
					<div class="vmenublock clearfix">
                      
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
          <h3> UNFORTUNATELY YOU ARE NOT ALLOWED TO ACESS THE RESOURCE REQUESTED</h3>
	
         </div>
                    </div>
                </div>
            </div>
    </div>
	<?php include("incls/footer.php") ?>

</div>


</body></html>