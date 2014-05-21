<?php
// Inialize session
session_start();
// Check, if user is already login, then jump to secured page
if (isset($_SESSION['username']) && isset($_SESSION['category'])) {
      switch($_SESSION['category']) {
	  case 2:
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
    <ul class="hmenu"><li><a href="client.php" >Home</a></li><li><a href="#" class="active">Connecting.. .</a></li><li><a href="log_out.php"><img src=images/quit_1.png></a></li></ul> 
    </nav>
<div class="sheet clearfix">
            <div class="layout-wrapper clearfix">
                <div class="content-layout">
                    <div class="content-layout-row">
                    <div class="layout-cell sidebar1 clearfix">
					<div class="vmenublock clearfix">
                      <div class="vmenublockcontent">
                       <ul class="vmenu"><li><a href="consultants.php">Available Consultants </a></li><li><a href="#">Submit Querry </a></li><li><a href="#">Unread Messages</a></l</ul>
                
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
	    $id=$_REQUEST['userid']; 
	 	 include("incls/connector.php");	
	 $query="SELECT * FROM users WHERE userid='".$id."'";
	 $resource=mysql_query($query,$conn) or die ("An unexpected error occured Please try again!");
	 $result=mysql_fetch_array($resource);
	 ?>
	    <form id="form1" name="form1" method="post" action="">
        <table align="center" width="400" border="0">
          <tr>
            <td width="129"><strong>Consultant's Name:</strong></td>
            <td width="152">
            <input type="hidden" name="id" value="<?php echo $result[0] ?>"  />
			<input type="hidden" name="uname" value="<?php echo $result[2] ?>"  />
            <label>
              <input name="name" type="text" id="textfield" value="<?php echo $result[4].$gap.$result[5] ?>" readonly />
            </label></td>
          </tr>
          <tr>
            <td><strong>Message :</strong></td>
            
			<td><textarea autofocus rows="10" cols="80" required  name="msg" required ></textarea> </td>
          </tr>
          
		 </table>
		 <p align="center">
          <label>
            <input type="submit" name="sender" class="button" value="Send" />
          </label>
        </p>
		 </form>
		 <?php
if (isset($_POST['sender'])){
$receptor=$_POST['uname'];
$status='UNREAD';
$message=$_POST['msg'];
$query=mysql_query("INSERT INTO message(`sender`,`recipient`,`msg`,`status`)
VALUES('{$_SESSION['username']}','$receptor','$message','$status')
")or die(mysql_error());
?>
<script type="text/javascript">
	alert('Your Message has been sent');
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