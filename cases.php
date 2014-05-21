<?php
// Inialize session
session_start();
// Check, if user is already login, then jump to secured page
if (isset($_SESSION['username']) && isset($_SESSION['category'])) {
      switch($_SESSION['category']) {
	  case 1:
		  header('location:forbidden.php');//redirect to user page
        break;
	  case 2 :
		  header('location:consultant.php');//redirect to co page
		 
      break;
		
      }
	  }else
	  {

header('Location:index.php');
}
?>

<!DOCTYPE html>
<html dir="ltr" lang="en-US"><head>
    <title>Solved Cases</title>
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
    <ul class="hmenu"><li><a href="admin.php">Home</a></li><li><li><a href="log_out.php"><img src=images/quit_1.png></a></l</ul> 
    </nav>
<div class="sheet clearfix">
            <div class="layout-wrapper clearfix">
                <div class="content-layout">
                    <div class="content-layout-row">
                    <div class="layout-cell sidebar1 clearfix">
					<div class="vmenublock clearfix">
                      <div class="vmenublockcontent">
<ul class="vmenu"><li><a href="#">Manage Users</a><ul class="active"><li><a href="activator.php" >Activate </a></li><li><a href="deactivator.php" >De-Activate</a></li><li><a href="deleter.php" >Delete</a></li></ul></li><li><a href="#" class="active">Others</a><ul class="active"><li><a href="viewmsgs.php">View Communications </a></li><li><a href="#" class="active">Solved Cases</a></li></ul></li></ul>
                
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
	 $query="SELECT * FROM cases";
		
		  $resource=mysql_query($query,$conn);
		  echo "
		<table align=\"center\" border=\"0\" width=\"100%\">
		<tr>
		<td><b>Id</b></td> <td><b>Client</b></td></td><td><b>Consultant</b></td><td><b>Status</b></td></tr> ";
while($result=mysql_fetch_array($resource))
	{ 
	echo "<tr><td>".$result[0]."</td><td>".$result[1]."</td><td>".$result[2]."</td><td>".$result[3]."</td></tr>";
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