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
    <title>Consultant Profile</title>
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
    <ul class="hmenu"><li><a href="consultant.php" class="active">Home</a></li><li><li><a href="log_out.php"><img src=images/quit_1.png></a></l</ul> 
    </nav>
<div class="sheet clearfix">
            <div class="layout-wrapper clearfix">
                <div class="content-layout">
                    <div class="content-layout-row">
                    <div class="layout-cell sidebar1 clearfix">
					<div class="vmenublock clearfix">
                      <div class="vmenublockcontent">
                       <ul class="vmenu"><li><a href="#" class="active" > My Profile</a></li><li><a href="received.php" >Unread Queries </a></li><li><a href="assist.php"> Send Assistace</a></li></ul>
                
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
			   <p ><b> <font color='blue'>You must update your SPECIALITY the first time you create your account</font></b></P>
      <?php 
	  include('incls/connector.php') ;
	  $query = "SELECT * FROM users WHERE username='{$_SESSION['username']}'" ;
		
		 $resource=mysql_query($query,$conn) or die ("An unexpected error occured ");
		  $result=mysql_fetch_array($resource);
					?>
	<form id="form1" name="form1" method="post" action="">
        <table align="center" width="291" border="0">
		  <tr>
            <td><strong>Username:</strong></td>
            <td><input type="text" name="uname" id="textfield3" value="<?php echo $result[2]?> " readonly /></td>
          </tr>
          <tr>
            <td width="129"><strong>First Name :</strong></td>
            <td width="152">
            <input type="hidden" name="userid" value="<?php echo $result[0] ?>" />
            <input name="fname" type="text" id="textfield" value="<?php echo $result[4] ?>" />
            </td>
          </tr>
		  <tr>
            <td width="129"><strong>Last Name :</strong></td>
            <td width="152">
            <input name="lname" type="text" id="textfield" value="<?php echo $result[5] ?>" /></td>
          </tr>
          <tr>
            <td><strong>Category:</strong></td>
            <td><strong>Consultant</strong></td>
          </tr>
		  <tr>
            <td><strong>Speciality:</strong></td>
            <td><input type="text" name="speciality" id="textfield3" value="<?php echo $result[7] ?>" required /></td>
          </tr>
          
        </table>
        <p align="center">
          <label>
            <input type="submit" class="button" name="updater" id="button" value="Update" />
          </label>
        </p>
		<p>&nbsp </p>
		<p align="center"><img onClick="javascript: history.go(-1)" border="0" src="images/cooltext457951462.png" alt="Go Back" onmouseover="this.src='images/cooltext457951462MouseOver.png';" onmouseout="this.src='images/cooltext457951462.png';" /></p>
      </form>
      <?php
	 
         error_reporting(E_ALL ^ E_NOTICE);
	    include("incls/connector.php");		
				 if (isset($_POST['updater'])){
				 $id=$_POST['userid'];
	             $fname=$_POST['fname']; 
				 $lname=$_POST['lname'];
	             $speciality=$_POST['speciality'];
	             
	 
	 	 //mysql_select_db("department",$link) or die ("Cannot select the database!");
	 $query="UPDATE users SET firstname='".$fname."', lastname='".$lname."', speciality='".$speciality."' WHERE userid='".$id."'";
		
		  if(!mysql_query($query,$conn))
		  {die ("An unexpected error occured while Updating , Please try again!");}
		  
	 ?>
	 <script type="text/javascript">
	alert('Your profile  has been Updated');
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