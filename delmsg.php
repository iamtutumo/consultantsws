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
    <title>Deleting the account</title>
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
    <ul class="hmenu"><li><a href="admin.php" >Home</a></li><li><a href="log_out.php"><img src=images/quit_1.png></a></li></ul> 
    </nav>
<div class="sheet clearfix">
            <div class="layout-wrapper clearfix">
                <div class="content-layout">
                    <div class="content-layout-row">
                    <div class="layout-cell sidebar1 clearfix">
					<div class="vmenublock clearfix">
                      <div class="vmenublockcontent">
<ul class="vmenu"><li><a href="#" class="active">Manage Users</a><ul ><li><a href="activator.php" >Activate </a></li><li><a href="deactivator.php"  >De-Activate</a></li><li><a href="deleter.php" class="active" >Delete</a></li></ul></li><li><a href="#" class="active" >Manage Messages</a><ul class="active"><li><a href="viewmsgs.php" class="active">View </a></li></ul></li></ul>
                
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
       	 include("incls/connector.php");		
	     $id=$_REQUEST['msid']; 
	 	 $query="SELECT * FROM message WHERE msgid='".$id."'";
		
		 $resource=mysql_query($query,$conn) or die ("An unexpected error occured while <b>Deleting </b> the message, Please try again!");
		  $result=mysql_fetch_array($resource);
		  
	 ?>
	    <form id="form1" name="form1" method="post" action="">
        <table align="center" width="400" border="0">
          <tr>
            <td width="129"><strong>Message id:</strong></td>
            <td width="152">
            <input type="hidden" name="uid" value="<?php echo $result[0] ?>"  />
			<input type="hidden" name="uname" value="<?php echo $result[2] ?>"  />
            <label>
              <input name="id" type="text" id="textfield" value="<?php echo $result[0] ?>" readonly />
            </label></td>
          </tr>
		  <tr>
		     <td width="129"><strong>Sender:</strong></td>
			 <td> <input name="uname" type="text" id="textfield" value="<?php echo $result[1] ?>" readonly /></td>
		  </tr>
		 </table>
		 <p align="center">
          <label>
            <input type="submit" name="de" class="button" value="Delete" />
          </label>
        </p>
		 </form>
<?php
   if (isset($_POST['de'])){ 
   include("incls/connector.php");
	 $id=$_POST['id'];
	$query="DELETE FROM message WHERE msgid='".$id."'";
		
		  if(!mysql_query($query,$conn))
		  {die ("An unexpected error occured while Deleting the message Please try again!");}
		  
	 ?>

<script type="text/javascript">
	alert('The message has been Deleted');
	window.location="viewmsgs.php";
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