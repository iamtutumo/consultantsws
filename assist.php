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
    <title>Submit Assistance</title>
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
    <ul class="hmenu"><li><a href="client.php">Home</a></li><li><li><a href="log_out.php"><img src=images/quit_1.png></a></l</ul> 
    </nav>
	
<div class="sheet clearfix">
            <div class="layout-wrapper clearfix">
                <div class="content-layout">
                    <div class="content-layout-row">
                    <div class="layout-cell sidebar1 clearfix">
					<div class="vmenublock clearfix">
                      <div class="vmenublockcontent">
                       <ul class="vmenu"><li><a href="profile.php" > My Profile</a></li><li><a href="received.php">Unread Queries</a></li><li><a href="assist.php" class="active"> Send Assistace</a></li></ul>
                
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
        
	 <form class="cmxform" id="deleteloc" method="POST" action="">
	
		<table align="center">  
		<tr>
		   <td>
			  <label for="loc"><b>Client</b></label>
			</td>
		   <td>
			  <select name="client" required>
                  <?php 
					 
	 	        include("incls/connector.php"); 
					$query = "SELECT * FROM users WHERE category ='1' AND status='active'";
					$result = mysql_query($query);
					echo "<option></option>";
					while($row = mysql_fetch_array($result))
						{
							$fname = $row[4];
							$lname = $row[5];
							$uname = $row[2];
							echo "<option>$fname &nbsp $lname</option>";
						}
			
					?>
                </select>
				<tr>
			</td>
		  <td> &nbsp <span id="loc "> &nbsp </span></td>
		  <td><input type="hidden" value="<?php echo "$uname";?>" name="uname" ></td>
		</tr>
		 <tr>
            <td><strong>Message :</strong></td>
			<td><textarea autofocus rows="10" cols="40" required  name="msg" required ></textarea> </td>
          </tr>
		 <tr>
		  <td> &nbsp </td>  
		   <td colspan="2"> 
			<input class="button" type="submit" value="  Send  " name="sender"/>
		   </td>
		</tr>
	 </table>
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
	window.location="consultant.php";
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