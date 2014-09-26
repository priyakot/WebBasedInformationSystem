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
    $(location).attr("href", "http://cs-server.usc.edu:2555/CodeIgniter/index.php/validate/viewPrevOrderDetails/"+pid+"/'.$username.'");

   });
 }
 
 
  $(document).ready(function(){
  


   $("#cart").click(function(){
   // alert("CLICKED	cart");
    $(location).attr("href", "http://cs-server.usc.edu:2555/CodeIgniter/index.php/validate/viewCart/'.$username.'");

  });
  
   $("#orders").click(function(){
   // alert("CLICKED	orders");
    $(location).attr("href", "http://cs-server.usc.edu:2555/CodeIgniter/index.php/validate/viewPrevOrders/'.htmlspecialchars($username).'");

  });
  
   $("#logout").click(function(){
    alert("Logout!");
        $(location).attr("href", "http://cs-server.usc.edu:2555/CodeIgniter/index.php/test");

  });

  $("#continueShopping").click(function(){
  //  alert("CLICKED	continueShopping");
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

'; echo $username; 
$orderN ="";
$orderDate="";
$sAddress="";
$bAddress="";
$totalCost="";
foreach($orderDetail as $row ) {
 $orderN = $row->orderId;
 $orderDate = $row->orderDate;
 $sAddress =$row->sAddress;
 $bAddress = $row->bAddress;
 $totalCost =$row->totalCost;
} echo'
<div style="width:100%; float:center" align="left" >
<form id="accountForm" name="accountForm" method="post" action="'.site_url("validate/updateCustomer/".$username."").'"><input type="submit" style="text-align: center; padding: 5px 5px 8px 5px;background-color: #e63273;color: #FFF"  value="MY ACCOUNT" id="updateCustomerButton" ></form>
<table class="tableNav">
<tr>
<td><input type ="button" style="text-align: center; padding: 5px 5px 8px 5px;background-color: #e63273;color: #FFF" value="Home" id="continueShopping"></td>
<td><input type ="button" style="text-align: center; padding: 5px 5px 8px 5px;background-color: #e63273;color: #FFF" value="Shopping Cart" id="cart"></td>
<td><input type ="button" style="text-align: center; padding: 5px 5px 8px 5px;background-color: #e63273;color: #FFF" value="My Orders" id="orders"></td>
<td><input type="button" style="text-align: center; padding: 5px 5px 8px 5px;background-color: #e63273;color: #FFF" value="Logout" id="logout"></td>
</tr>
</table>
</div>


<div id="div1" style="width:100%;margin:0 auto; overflow:scroll; font-family: Arial, Helvetica, sans-serif;" class="regformWrapper">
<br><br>
<div>ORDER DETAILS</div>
<div>Order Number: aww00'.$orderN.'</div>
<br>
<br>
<div>Order Date: '.$orderDate.'</div>
<br>
<br>
<div>Shipping Address: '.$sAddress.'</div>
<br>
<br>
<div>Billing Address: '.$bAddress.'</div>
<br>
<br>

<div></div>
<div></div>


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
				<th style="padding: 5px">Product ID</th>
				<th style="padding: 5px">Name</th>
				<th style="padding: 5px">Quantity</th>
				<th style="padding: 5px">Price</th>				
				<th style="padding: 5px">VIEW DETAILS</th>
				
				</tr>';

foreach($orderDetail as $row ) {
  echo "<tr id='order".$row->productId."'>";
  echo "<td style='padding: 5px'>" . $row->productId . "</td>";
  echo "<td style='padding: 5px'>" . $row->productName . "</td>";
  echo "<td style='padding: 5px'>" . $row->productQty ."</td>";
  echo "<td style='padding: 5px'>" . $row->productPrice ."</td>";

  echo "<td style='padding: 5px'><img src='http://cs-server.usc.edu:2555/CodeIgniter/application/views/content/images/" . $row->productImg ."' width='60px' height='60px'></td>";
  echo "</tr>";

}
echo "</table><div style='background:#000000;padding: 5px; color:#ffffff' width='100%' align='right'>
<br><br>TOTAL PRICE(including tax+delivery): <input type = 'text' id='totalQty' name='totalQty' value='".$totalCost."' readonly style='border:none background:#000000 color:#ffffff'>
</div><br><br><<br><br>";




echo'</div></div>
</section>
<footer style="position: relative; z-index:1">
  <p>&copy; 2014. All Rights Reserved.</p>
  <p>Designed and Developed by <a class="pink" href="mailto:kotwal@usc.edu">Priya Kotwal</a></p>
</footer>

</body>
</html>';


?>