<?php
// Inialize session
session_start();
// Check, if user is already login, then jump to secured page
if (isset($_SESSION['username']) && isset($_SESSION['category'])) {
      switch($_SESSION['category']) {
	  case 1:
		  header('location:client.php');//redirect to client page 
        break;
		case 2:
		  header('location:consultant.php');//redirect to  page
        break;
		case 3:
		  header('location:admin.php');//redirect to admin
        break;
		
      }
	  }//else
	  //{

//header('Location: .php');
//}

?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US"><head>
    <title>:: Login ::</title>
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
<div class="sheet clearfix">
            <div class="layout-wrapper clearfix">
                <div class="content-layout">
                    <div class="content-layout-row">
                    <div class="layout-cell sidebar1 clearfix">
					<div class="vmenublock clearfix">
                      <div class="vmenublockcontent">
                       <ul class="vmenu"><li><a href="#" class="active">Login</a></li><li><a href="c_account.php">Create Account</a></li></ul>
                
                      </div>
                    </div>
				   </div>
                <div align="center">
              <table width="100%" border="0" cellpadding="1" cellspacing="1">
                  <tr> 
                        <td width="358" height="20" valign="middle" bgcolor="#8FC4F7"> 
                         <div align="center"><b><font color="#FFFFFF">Login</font></b></div>
                        </td>
                  </tr>
               </table>	 
      <form  id="signin" method="POST" action="validator.php">	
		<table align="center">  
		
		<tr>
		   <td>
			  <label for="username">Login As </label>
			</td>
			<td>
			  <select name="category" id="usertype" required >
				<option value="1" id="sysuser" selected >Client</option>
				<option value="2" id="Personnel" >Consultant</option>
				<option value="3" id="admin" >Admin</option>
            </select>
			</td>
		</tr>
		<tr>
		   <td>
			  <label for="username">Username</label>
			</td>
			<td>
			  <input id="username" name="username" type="text" autocomplete="off" required " />
			</td>
		</tr>
		<tr>
		   <td>
			  <label for="password">Password</label>
		   </td>
		    <td>
			   <input id="password" name="password" type="password" required/>
		   </td>
		
		<tr>
		   <td colspan="2">
			<label for="agree">keep me signed in</label>
			<input type="checkbox" class="checkbox" id="signed" name="signed" />
		 </td>
		</tr>
		<tr>
		    <td > 
			<label for="agree"> &nbsp </label>
		   </td>
		   <td > 
			<input class="button" type="submit" value="login" name="login"/>
		   </td>
		</tr>
	 </table>
	</form>
         </div>
                    </div>
                </div>
            </div>
    </div>
	<?php include("incls/footer.php") ?>

</div>


</body></html>