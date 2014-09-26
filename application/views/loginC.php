<?php
//$loginVal =TRUE;
//$error=NUll;
/**ob_start();
session_start();
$currentUser = $_SESSION['userName'];
if(!$currentUser)
{
  header('Location: http://cs-server.usc.edu:2555/571HW1/login1.php');

}
$notActive = 150;
if(isset($_SESSION['timeout']))
{
	$session_life = time()-$_SESSION['timeout'];
	if($session_life>$notActive)
	{
	  session_destroy();
  	  header('Location: http://cs-server.usc.edu:2555/571HW1/login1.php');
	}
}
$_SESSION['timeout'] = time();
**/
echo'<html>
<head>
<meta charset="utf-8">
<title>aww</title>



<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" media="screen and (max-width: 800px)" href="http://cs-server.usc.edu:2555/CodeIgniter/application/views/content/styles/mobile.css">
<link rel="stylesheet" type:"css/text" media="screen and (max-width: 800px)" href="http://cs-server.usc.edu:2555/CodeIgniter/application/views/content/styles/mobile.css">
<link rel="stylesheet" type:"css/text" media="screen and (min-width: 801px)" href="http://cs-server.usc.edu:2555/CodeIgniter/application/views/content/styles/base.css">


<!-- <link rel="stylesheet" type="text/css" href="http://cs-server.usc.edu:2555/CodeIgniter/application/views/content/styles/base.css"> -->


<script src="http://cs-server.usc.edu:2555/CodeIgniter/application/views/jquery-1.11.1.min.js"></script>

<script>
  $(document).ready(function(){
  
   

  $("#loginButton").click(function(){
   if($("#userName").val().length==0){
    alert("Invalid Login!");
}
  if($("#password").val().length==0){
     alert("Invalid Login!");
 }
 
 if($("#userName").val().length==0 && $("#password").val().length==0){
     alert("Invalid Login!");
 }

  }); 
  
  $("#newC").click(function(){
    //alert("CLICKED	Logout");
        $(location).attr("href", "http://cs-server.usc.edu:2555/CodeIgniter/index.php/validate/addNewCustomer");

  });
   

  
});

</script>



<style>
.label{
font-weight:bold;
font-family: Arial, Helvetica, sans-serif;
color:#A0A0A0 ;
}


</style>

</head>
<body background="http://cs-server.usc.edu:2555/CodeIgniter/application/views/content/images/butterfly.png">

<nav style="text-align:center">
	<div style="height:125px">
		<img style="height:110px" align="center" src="http://cs-server.usc.edu:2555/CodeIgniter/application/views/content/images/header.png">
   </div>
    
    
</nav>
<section class="contentWrapper">
<div id="div1" style="width:100%;margin:0 auto; overflow:scroll; font-family: Arial, Helvetica, sans-serif;" class="regformWrapper">

<form name="loginCustomerForm" action="'.site_url("validate/validatelogin"). '" method="post" style= "border : 1px solid #bcbcbc; padding : 5px; font-family: Arial, Helvetica, sans-serif;">
';
if (isset($error)){
  //  echo '<div class="error">'.$error.'</div>';
    echo '<script>alert("Invalid User Credentials!");</script>';
}

echo'
<fieldset>
        <legend>&nbsp; <b>LOGIN </b>&nbsp;</legend>

<br><div align="center"><label align="center">User Name: </label>
<input type="text" name="userName" id="userName" placeholder="Enter email address">
<br>
<br><label align="center">Password: </label>
<input type="password" name="password" id="password" placeholder="Enter password">
<br>
<br>
<br>
<br>
<input type="submit" value="LOGIN" name ="loginButton" id="loginButton" style="font-weight:2"/>
</div></form>
<form action="'.site_url("validate/addNewCustomer"). '" method="post" name="newCustomer" id ="newCustomer"><br>
<br><label>Not a member? </label>
<input type="button" name ="newC" id="newC" style="font-weight:2" value="SIGN UP">
<br>
<br>
<br></form></fieldset>

</div>
</section>
<footer style="position: relative; z-index:1">
  <p>&copy; 2014. All Rights Reserved.</p>
  <p>Designed and Developed by <a class="pink" href="mailto:kotwal@usc.edu">Priya Kotwal</a></p>
</footer>

</body>
</html>';


?>