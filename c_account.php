<!DOCTYPE html>
<html dir="ltr" lang="en-US"><head>
    <title>:: Create Account ::</title>
    <meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width">

    <!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <link rel="stylesheet" href="style.css" media="screen">
    <!--[if lte IE 7]><link rel="stylesheet" href="style.ie7.css" media="screen" /><![endif]-->
    <link rel="stylesheet" href="style.responsive.css" media="all">


    <script src="incls/jquery.js"></script>
    <script src="incls/script.js"></script>
    <script src="incls/script.responsive.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$("#username").keyup(function (e) {
	
		//removes spaces from username
		$(this).val($(this).val().replace(/\s/g, ''));
		
		var username = $(this).val();
		if(username.length < 1){$("#user-result").html('');return;}
		
		if(username.length >= 1){
			$("#user-result").html('<img src="images/loader.gif" />');
			$.post('check-uname.php', {'username':username}, function(data) {
			  $("#user-result").html(data);
			});
		}
	});	
});
</script>	


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
                       <ul class="vmenu"><li><a href="index.php" >Login</a></li><li><a href="#" class="active">Create Account</a></li></ul>
                
                      </div>
                    </div>
				   </div>
                <div align="center">
              <table width="100%" border="0" cellpadding="1" cellspacing="1">
                  <tr> 
                        <td width="358" height="20" valign="middle" bgcolor="#8FC4F7"> 
                         <div align="center"><b><font color="#FFFFFF">Create Account</font></b></div>
                        </td>
                  </tr>
               </table>	 
      <form class="cmxform" id="signupForm" method="POST" action="">
	
		<legend><b>Please Provide All Information</b></legend>
		<table align="center">
		<tr>
		   <td>
			<label for="firstname">Firstname</label>
		   </td>
			<td>
			<input id="firstname" name="firstname" type="text" required minlength="5" autocomplete="off"  />
		   </td>
		   <td>&nbsp  &nbsp </td>
		</tr>
		<tr>
		    <td>
			<label for="lastname">Lastname</label>
			</td>
			<td>
			<input id="lastname" name="lastname" type="text" autocomplete="off" required/>
			</td>
			<td> &nbsp &nbsp </td>
		</tr>
		<tr>
		   <td>
			  <label for="username">Username</label>
			</td>
			<td>
			  <input id="username" name="username" type="text" autocomplete="off" required /> 
			</td>
			<td> &nbsp &nbsp <span id="user-result"></span></td>
		</tr>
		
		<tr>
		   <td>
			  <label for="username">Usertype</label>
			</td>
			<td>
			  <select name="category" id="usertype" required >
				<option value="1" id="user1" >Client</option>
				<option value="2" id="user2" >Consultant</option>
            </select>
			</td>
			<td> &nbsp &nbsp </td>
		</tr>
		<tr>
		   <td>
			  <label for="password">Password</label>
		   </td>
		    <td>
			   <input id="password" name="password" type="password" required/>
		   </td>
		   <td> &nbsp &nbsp </td>
		</tr>
		<tr> 
		   <td>
			<label for="confirm_password">Confirm password</label>
		   </td>
		   <td>
			<input id="confirm_password" name="confirm_password" equalTo="#password" type="password" required/>
		   </td>
		   <td> &nbsp &nbsp  </td>
		</tr>
		<tr> 
		   <td colspan="3"> <hr>
		   </td>
		</tr>
		<tr>
		   <td colspan="3">
			<label for="agree">Please agree to our policy</label>
			<input type="checkbox" class="checkbox" id="agree" name="agree" required />
		 </td>
		</tr>
		<tr>
		    <td > 
			<label for="agree"> &nbsp &nbsp </label>
		   </td>
		   <td > 
			<input class="button" type="submit" value="Submit" name="create"/>
		   </td>
		   <td> &nbsp &nbsp </td>
		</tr>
	 </table>
	</form>
	
	<?php include "incls/connector.php"; ?>
	<?php
if (isset($_POST['create'])){
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$username=$_POST['username'];
$category=$_POST['category'];
$password=$_POST['confirm_password'];
$encrypted = md5($password); // Encrypting pssword using md5 algo
$query=mysql_query("INSERT INTO users(`category`,`username`,`password`,`firstname`,`lastname`,`status`,`speciality`)
VALUES('$category','$username','$encrypted','$firstname','$lastname','inactive','N/A')
")or die(mysql_error());
?>
<script type="text/javascript">
	alert('You are Now Registered.Please login now to Proceed ');
	window.location="index.php";
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