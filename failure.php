<?php
// Inialize session
session_start();
// Check, if user is already login, then jump to secured page
if (isset($_SESSION['username']) && isset($_SESSION['level'])) {
      switch($_SESSION['level']) {
	  case 1:
		  header('location:search.php');//redirect to user page
        break;
		case 2:
		  header('location:file_create.php');//redirect to  page
        break;
		case 3:
		  header('location:admin/index.php');//redirect to admin
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
<header class="header clearfix">


    <div class="shapes">
<h1 class="headline" data-left="51.57%">
    <a href="#">The Online Consultants</a>
</h1>
<h2 class="slogan" data-left="51.57%">Happy to assist</h2>


            </div>            
</header>
<div class="sheet clearfix">
            <div class="layout-wrapper clearfix">
                <div class="content-layout">
                    <div class="content-layout-row">
                    
                <div align="center">
              
      <div class="content-layout-row">
	<div align="center">
    	<img src ="images/error.png">
		
		
	<div class="content-layout">
	<div class="layout-cell layout-item-2" style="width: 100%" >
        <h3>Possible Causes</h3>
		<ul>
            <li>Wrong usertype,Username and Password combination. </li>
            <li>You might not be Registered. </li>
            <li>Your account might not be Active.</li>
        </ul>
		<h3>PLEASE CONTACT THE SYSTEM ADMNISTRATOR</h3>
		<p><a href="index.php" class="button"><< Try Again</a></p>
	</div>
    </div>
	</div>
    </div>
	
         </div>
                    </div>
                </div>
            </div>
    </div>
	<?php include("incls/footer.php") ?>

</div>


</body></html>