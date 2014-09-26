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

 function orderDetails(event){
   $("#"+event.data.param1).click(function(){
     var pid = $(this).attr("id");

    $(location).attr("href", "http://cs-server.usc.edu:2555/CodeIgniter/index.php/validate/viewPrevOrderDetails/"+pid+"/'.$username.'");

   });
 }
 
 
  $(document).ready(function(){
  


   $("#cart").click(function(){
    alert("CLICKED	cart");
    $(location).attr("href", "http://cs-server.usc.edu:2555/CodeIgniter/index.php/validate/viewCart/'.$username.'");

  });
  
   $("#orders").click(function(){
    alert("CLICKED	orders");
  });
  
   $("#logout").click(function(){
    alert("CLICKED	Logout");
        $(location).attr("href", "http://cs-server.usc.edu:2555/CodeIgniter/index.php/test");

  });

 

 $("viewOrder").click(function() {  
   var pid = $(this).attr("id");
    alert(pid);
  // $(location).attr("href", "http://cs-server.usc.edu:2555/CodeIgniter/index.php/validate/viewPrevOrderDetails/"+pid+"/'.$username.'");

    
  }); 
  
   $("#continueShopping").click(function(){
    alert("CLICKED	continueShopping");
    $(location).attr("href", "http://cs-server.usc.edu:2555/CodeIgniter/index.php/validate/showProductHome/'.$username.'");

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
<div style="width:100%; height:100%; margin:0 auto; overflow:scroll" class="contentWrapper">

<nav style="text-align:center">
	<div style="height:125px">
		<img style="height:110px" align="center" src="http://cs-server.usc.edu:2555/CodeIgniter/application/views/content/images/header.png">
    </div>
    
    
</nav>
<section class="contentWrapper">

'.$username.'
<div style="width:100%; float:center" align="left" >
<form id="accountForm" name="accountForm" method="post" action="'.site_url("validate/updateCustomer/".$username."").'"><input type="submit" style="text-align: center; padding: 5px 5px 8px 5px;background-color: #e63273;color: #FFF"  value="MY ACCOUNT" id="updateCustomerButton" ></form>
<input type ="button" style="text-align: center; padding: 5px 5px 8px 5px;background-color: #e63273;color: #FFF" value="Home" id="continueShopping">
<input type ="button" style="text-align: center; padding: 5px 5px 8px 5px;background-color: #e63273;color: #FFF" value="Shopping Cart" id="cart">
<input type ="button" style="text-align: center; padding: 5px 5px 8px 5px;background-color: #e63273;color: #FFF" value="My Orders" id="orders">
<input type="button" style="text-align: center; padding: 5px 5px 8px 5px;background-color: #e63273;color: #FFF" value="Logout" id="logout">
</div>


<div id="div1" style="width:100%;margin:0 auto; overflow:scroll; font-family: Arial, Helvetica, sans-serif;" class="regformWrapper">


<style>
table,th,td {
    border: 1px solid black;
    border-spacing: 5px;
   margin-bottom: 20px;
}


th {
    background-color: black;
    color: white;
}
</style>
		<table width="100%" style="text-align:center">
				<tr>
				<th style="padding: 5px">Order ID</th>
				<th style="padding: 5px">Order Date</th>
				<th style="padding: 5px">Total Cost</th>
				<th style="padding: 5px">VIEW DETAILS</th>
				
				</tr>';

foreach($order as $row ) {
  echo "<tr id='order".$row->orderId."'>";
  echo "<td style='padding: 5px'>" . $row->orderId . "</td>";
  echo "<td style='padding: 5px'>" . $row->orderDate . "</td>";
  echo "<td style='padding: 5px'>" . $row->totalCost ."</td>";
  echo "<td style='padding: 5px'><button type ='button' name ='viewOrder' id=".$row->orderId.">VIEW</button>
  <script>$(\"#".$row->orderId."\").click({param1:".$row->orderId."},orderDetails);</script></td>";
  
  //echo "<td>" . $row['doj'] . "</td>";

  echo "</tr>";
//  $total = $total + $row->productPrice*$row->productQty;
//  $totalQty = $totalQty + $row->productQty;
 // echo $total;
}
echo "</table><<br><br>";




echo'</div></div>
</section>
<footer style="position: relative; z-index:1">
  <p>&copy; 2014. All Rights Reserved.</p>
  <p>Designed and Developed by <a class="pink" href="mailto:kotwal@usc.edu">Priya Kotwal</a></p>
</footer>

</body>
</html>';


?>