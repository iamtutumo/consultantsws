
<?php
// Inialize session
session_start();

//$myusername = stripslashes($myusername);
//$mypassword = stripslashes($mypassword);
include('incls/connector.php');
	if (isset($_POST['login'])){
	
	$userNname=$_POST['username'];
	$username=(mysql_real_escape_string($userNname));
	$passWword=md5($_POST['password']);
	$password=(mysql_real_escape_string($passWword));
    $category = ($_POST['category']);
	
	$login=mysql_query("select * from users where username='$username' and status='active' and password='$password' and category='$category'")or die(mysql_error());
	$count=mysql_num_rows($login);
	
	if ($count > 0) {
	    switch($category){
		case 1:
		  $_SESSION['username'] = $username;
		  $_SESSION['category'] = $category;
		  header('location:client.php');//redirect to user page
        break;
		case 2:
		  $_SESSION['username'] = $username;
		  $_SESSION['category'] = $category;
		  header('location:consultant.php');//redirect to Personell page
        break;
		//case 3:
		 // header('location:admin/index.php');//redirect to admin
        //break;
		default:
		  $_SESSION['username'] = $username;
		  $_SESSION['category'] = $category;
		header('location:admin.php');//redirect to admin
      }
	}else
	{ 
	header('location:failure.php');
	
	}
	}
	
	?>
