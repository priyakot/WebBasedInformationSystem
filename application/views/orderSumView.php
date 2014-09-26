<?php
ob_start();
//session_start();
$currentUser = $_SESSION['userName'];
if(!$currentUser)
{
 // header('Location: http://cs-server.usc.edu:2555/571HW1/loginCustomer.php');

}
$notActive = 150;
if(isset($_SESSION['timeout']))
{
	$session_life = time()-$_SESSION['timeout'];
	if($session_life>$notActive)
	{
	  session_destroy();
  	  header('Location: http://cs-server.usc.edu:2555/CodeIgniter/index.php/test');
	}
}
$_SESSION['timeout'] = time();
echo'<html>
<head>
<meta charset="utf-8">
<title>aww</title>
<link rel="stylesheet" type="text/css" href="http://cs-server.usc.edu:2555/CodeIgniter/application/views/content/styles/base.css">



<script src="http://cs-server.usc.edu:2555/CodeIgniter/application/views/jquery-1.11.1.min.js"></script>
<script>


$(document).ready(function(){

  $("#continueShopping").click(function(){
    alert("CLICKED	continueShopping");
    $(location).attr("href", "http://cs-server.usc.edu:2555/CodeIgniter/index.php/validate/showProductHome/'.$username.'");

  });
  
   $("#logout").click(function(){
    $(location).attr("href", "http://cs-server.usc.edu:2555/CodeIgniter/index.php/test");
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

<div id="div1" style="width:100%;margin:0 auto; overflow:scroll; backgound:#ffffff; font-family: Arial, Helvetica, sans-serif;" class="regformWrapper">
<br>
<fieldset>
<legend>&nbsp; THANK YOU FOR SHOPPING! &nbsp;</legend>
<br>
<br>
<label>Your Order Id is aww00'.$orderId.'</label>
<br>
<br>
<div><input type="button" name="continueShopping" id="continueShopping" value="CONTINUE SHOPPING" style="text-align: center; padding: 5px 5px 8px 5px;background-color: #e63273;color: #FFF">
<input type="button" style="text-align: center; padding: 5px 5px 8px 5px;background-color: #e63273;color: #FFF" name="Logout" value="logout" id="logout">
</div>
</div>
<br>
<br>
</fieldset>



</div>
</section>
<footer style=" clear: both;position: relative;z-index: 10;height: 3em;margin-top: -3em;">  
  <p>&copy; 2014. All Rights Reserved.</p>
  <p>Designed and Developed by <a class="pink" href="mailto:kotwal@usc.edu">Priya Kotwal</a></p>
</footer>

</body>
</html>';