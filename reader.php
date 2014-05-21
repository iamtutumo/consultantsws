<?php
// Inialize session
session_start();
// Check, if user is already login, then jump to secured page
if (isset($_SESSION['username']) && isset($_SESSION['category'])) {
      switch($_SESSION['category']) {
	  case 1:
		  header('location:forbidden.php');//redirect to user page
        break;
		
      }
	  }else
	  {

header('Location:index.php');
}
?>

<!DOCTYPE html>
<html dir="ltr" lang="en-US"><head>
    <title>Unread Messages</title>
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
    <ul class="hmenu"><li><a href="consultant.php" >Home</a></li><li><a href="#" class="active">Unread Messages</a></li><li><a href="log_out.php"><img src=images/quit_1.png></a></li></ul> 
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
			 
	    $id=$_REQUEST['mesid']; 
	 	 include("incls/connector.php");
      mysql_query ("UPDATE message SET status = 'READ' WHERE msgid = '$id' ") or die (mysql_error()."failed"); 
	 $query="SELECT * FROM message WHERE msgid='".$id."'";
	 $resource=mysql_query($query,$conn) or die ("An unexpected error occured Please try again!");
	 $result=mysql_fetch_array($resource);
	 
							
 	
	 ?>
	    <form id="form1" name="form1" method="post" action="">
        <table align="center" width="400" border="0">
		   <tr>
            <td><strong>Message</strong></td>
            
			<td><textarea autofocus rows="10" cols="80" required  name="msg" required readonly ><?php echo $result[3] ?></textarea> </td>
          </tr>
          
		 </table>
		 </form>
		 <?php
		 //===========TAKE CARE LIVEWIRE ===================
		 //====================================================
	$query9 = "SELECT * FROM message WHERE msgid = '$id' ";
					$result9 = mysql_query($query9);
					while($row = mysql_fetch_array($result9))
						{
							
	echo "<tr><td>
	<a href=\"reply.php?to=".$row[1]."\"><img border=\"0\" src=\"images/reply.png\"/></a>
	</td></tr>";
	} echo "</table>";
	//===========================================================================================
		 ?>
		
		</div>
                    </div>
                </div>
            </div>
    </div>
	<?php include("incls/footer.php") ?>

</div>


</body></html>