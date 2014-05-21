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
    <title>Home | Client List</title>
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
    <ul class="hmenu"><li><a href="consultant.php">Home</a></li><li><a href="#" class="active">Mark as Solved</a></li><li><a href="log_out.php"><img src=images/quit_1.png></a></li></ul> 
    </nav>
<div class="sheet clearfix">
            <div class="layout-wrapper clearfix">
                <div class="content-layout">
                    <div class="content-layout-row">
                    <div class="layout-cell sidebar1 clearfix">
					<div class="vmenublock clearfix">
                      <div class="vmenublockcontent">
                       <ul class="vmenu"><li><a href="profile.php" > My Profile</a></li><li><a href="received.php">Unread Queries</a></li><li><a href="assist.php"> Send Assistace</a></li><li><a href="assist.php">My clients</a></li></ul>
                
                      </div>
                    </div>
				   </div>
                <div align="center">
              <table width="100%" border="0" cellpadding="1" cellspacing="1">
                  <tr> 
                        <td width="358" height="20" valign="middle" bgcolor="#8FC4F7"> 
                         <div align="center"><b><font color="#FFFFFF">Welcome <?php echo $_SESSION['username'];?></font></b></div>
                        </td>
                  </tr>
		
               </table>	 
             <?php 
			 $gap=str_repeat('&nbsp;', 2);
	    $msgid=$_REQUEST['msgid']; 
	 	 include("incls/connector.php");	 
	 
	 //-----------------------------------devil might be see here--------------------------
	 $query2="SELECT * FROM message  WHERE msgid='".$msgid."'";
	 $resource2=mysql_query($query2,$conn) or die ("An unexpected error occured Please try again!");
	 $result2=mysql_fetch_array($resource2);
	 //------------------------------------N dissappears here-------------------------------
	 ?>
	    <form id="form1" name="form1" method="post" action="">
        <table align="center" width="400" border="0">
          <tr>
            <td width="129"><strong>Consultant's Name:</strong></td>
            <td width="152">
            
			<input type="text" name="sender" value="<?php echo $result2[1] ?>" readonly />
          </tr>
		  <tr>
            <td width="129"><strong>Your Name:</strong></td>
            <td width="152">
            
			<input type="text" name="rec" value=<?php echo $_SESSION['username'];?> readonly />
          </tr>
          
          
		 </table>
		 <p align="center">
          <label>
            <input type="submit" name="solved" class="button" value="Solved" />
          </label>
        </p>
		 </form>
		 <?php
if (isset($_POST['solved'])){
$receptor=$_POST['sender'];
$status='SOLVED';
$query=mysql_query("INSERT INTO cases(`client`,`consultant`,`status`)
VALUES('{$_SESSION['username']}','$receptor','$status')
")or die(mysql_error());
?>
<script type="text/javascript">
	alert('The issue has been settled');
	window.location="client.php";
	</script>

	<?php
	}
	?>	
         </div>
                    </div>
                </div>
            </div>
    </div>
	<?php include("incls/footer.php") ?>

</div>


</body></html>