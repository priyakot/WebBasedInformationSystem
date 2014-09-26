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
function updateCart(event){
   $("#update"+event.data.param1).click(function(){
     var productID = event.data.param1;
     var qty = event.data.param2;
     var q3 = event.data.param3;
     var pid = $(this).attr("id");

    alert(qty+" "+productID+" "+pid+" "+q3);
  //  $(location).attr("href", "http://cs-server.usc.edu:2555/CodeIgniter/index.php/validate/viewPrevOrderDetails/"+pid+"/'.htmlspecialchars($username).'");

   });
 }

function deleteItem(event){
   $("#delete"+event.data.param1).click(function(){
     var productID = event.data.param1;
 
     var pid = $(this).attr("id");

     alert("Deleted item:"+pid);
     $(location).attr("href", "http://cs-server.usc.edu:2555/CodeIgniter/index.php/validate/deleteCartItem/"+productID+"/'.htmlspecialchars($username).'");

   });
 }


function updateC(event){
   $("#qtyInputDB"+event.data.param1).on("input propertychange paste", function() {

      var q11 = this.value;
   //  alert("new qty: "+q11);
     var q3 = event.data.param2;
     var pid = $(this).attr("id");

    alert(q11+" "+pid+" "+q3);
  //  $(location).attr("href", "http://cs-server.usc.edu:2555/CodeIgniter/index.php/validate/viewPrevOrderDetails/"+pid+"/'.htmlspecialchars($username).'");

   });
 }



$(document).ready(function(){
    
   $("#checkOut").click(function(){
  
   // alert("CLICKED checkOut");
    var total = $("#total").val();

    var uname = "'.htmlspecialchars($username).'";

    
    $("#checkoutForm").attr("action", "'.site_url('validate/checkout/"+total+"/"+uname').');
 
         
   });


  $("#continueShopping").click(function(){
   // alert("CLICKED	continueShopping");
    $(location).attr("href", "http://cs-server.usc.edu:2555/CodeIgniter/index.php/validate/showProductHome/'.htmlspecialchars($username).'");

  });
  
  
   $("#productTable tr td").click(function() {  
   var pid = $(this).attr("id");
    alert(pid);
    $(location).attr("href", "http://cs-server.usc.edu:2555/CodeIgniter/index.php/validate/displayProduct/"+pid+"/'.htmlspecialchars($username).'");

    
  });

  
/**   $("#update").click(function(){
    alert("CLICKED	update");
    var price = $("#price").val();
    var productId = $("#productId").val();
    var qty = $("#qtyInputDB").val();
    //$("#totalPrice") = 
    $(location).attr("href", "http://cs-server.usc.edu:2555/CodeIgniter/index.php/validate/updateCart/"+productId+"/"+qty+"/'.htmlspecialchars($username).'");

  }); **/
  
   $("#deleteFullCart").click(function(){
    alert("Cart	deleted");
   $(location).attr("href", "http://cs-server.usc.edu:2555/CodeIgniter/index.php/validate/deleteFullCart/'.htmlspecialchars($username).'");

  });
  
/**   $("#logout").click(function(){
    alert("CLICKED	Logout");
  });
   **/
  
/**  
  $("#selCategory").change(function() {
  alert("val" +$("#selCategory").val()); 
    var catId =   $("#selCategory").val();
    var category = catId[0];
    $(location).attr("href", "http://cs-server.usc.edu:2555/CodeIgniter/index.php/validate/displayCategory/"+category+"/'.htmlspecialchars($username).'");
//    header("Location: http://cs-server.usc.edu:2555/CodeIgniter/index.php/validate/displayCategory/catId[0]/'.htmlspecialchars($username).'");
 // alert("val: " +catId); 

	
	$.ajax({
    type: "POST",
    url: "http://cs-server.usc.edu:2555/CodeIgniter/index.php/validate/displayCategory",
   
		async: true,
		data: {
		categoryId : catId[0],
		username: "'.$username.'",		   
    }
	
  }); 
	
	
});   **/

 
  
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
<form method="post" id="checkoutForm" name="checkoutForm">';

echo '<div id="cartDiv" name="cartDiv"><input type="button" id="continueShopping" name="continueShopping" value="CONTINUE SHOPPING" style="text-align: center; padding: 5px 5px 8px 5px;background-color: #e63273;color: #FFF">
<input type="submit" id="checkOut" name="checkOut" value="PROCEED TO CHECKOUT" style="text-align: center; padding: 5px 5px 8px 5px;background-color: #e63273;color: #FFF"></div><h2>Shopping Bag</h2>';

 $total = 0;
				echo "<style>
table, td, th {
    border: 1px solid black;
    border-spacing: 5px;
   margin-bottom: 20px;
}

th {
    background-color: black;
    color: white;
}
</style>
		<table width='100%' style='text-align:center'>
				<tr>
				<th style='padding: 5px'></th>
				<th style='padding: 5px'>PRODUCT</th>
				<th style='padding: 5px'>COLOR</th>
				<th style='padding: 5px'>SIZE</th>
				<th style='padding: 5px'>PRICE $</th>
				<th style='padding: 5px'>QUANTITY</th>
				<th style='padding: 5px'>TOTAL</th>
				<th style='padding: 5px'>UPDATE</th>
				<th style='padding: 5px'>REMOVE</th>

				</tr>";

foreach($cartInfo as $row) {
  echo "<tr>";
  echo "<td style='padding: 5px'><img src='http://cs-server.usc.edu:2555/CodeIgniter/application/views/content/images/". $row->productImg . "' width='80px' height='80px'></td>";
  echo "<td style='padding: 5px'>" . htmlspecialchars($row->productName) . "</td>";
  echo "<td style='padding: 5px'>" . htmlspecialchars($row->color). "</td>";
  echo "<td style='padding: 5px'>" . htmlspecialchars($row->size). "</td>";
  echo "<td style='padding: 5px'>" . htmlspecialchars($row->productPrice) . "</td>";
 
 echo "<td style='padding: 5px'><input type='text' id='qtyInputDB".htmlspecialchars($row->productId)."' name='qtyInputDB' maxlength='2' value=". $row->productQty . " style='width:40px' ></td>";


  echo "<td style='padding: 5px'>" . $row->productPrice*$row->productQty . "</td>";

 echo "<td style='padding: 5px'><input type='hidden' name='productId' value='" . htmlspecialchars($row->productId) . "' />
 <input type='hidden' id='qty' name='qty' value='" . $row->productQty . "' />
 
 <button type ='button' name ='update' id='update".$row->productId."'>UPDATE</button>
 <script>
 
  var q1 = $(\"#qtyInputDB".$row->productId."\").val(); 
 
  $(\"#qtyInputDB".$row->productId."\").on('input propertychange paste', function() {
  q1 = this.value;
  alert('new qty: '+q1);
 });
 
  $(\"#qtyInputDB".$row->productId."\").change({param1:".htmlspecialchars($row->productId).",param2:q1},updateC);
 
  $(\"#update".$row->productId."\").click({param1:".htmlspecialchars($row->productId).",param2:$(\"#qtyInputDB".$row->productId."\").val(),param3:q1},updateCart);
  </script>
 
 ";

  echo "<td style='padding: 5px'><input type ='button' id='delete".$row->productId."' name='delete' value='DELETE' ></td>
  <script>
  $(\"#delete".$row->productId."\").click({param1:".htmlspecialchars($row->productId)."},deleteItem);
  
  </script>
  
  
  ";

  echo "</tr>";
  $total = $total + $row->productPrice*$row->productQty;
 // echo $total;
}
echo "</table><div style='background:#000000;padding: 5px; color:#ffffff' width='100%' align='right'>
SUB-TOTAL: $<input type = 'text' id='total' name='total' value='".htmlspecialchars($total)."' readonly style='border:none background:#000000 color:#ffffff'></div><br><br>";
echo'<br><br><input type="button" id="deleteFullCart" value="DELETE CART" style="text-align: center; padding: 5px 5px 8px 5px;background-color: #e63273;color: #FFF"></form>';


echo "<style>
table, td, th {
    border: 1px none;
    border-spacing: 7px;
   margin-bottom: 20px;
   font-size: 12px;
}

th {
    background-color: black;
    color: white;
}
</style>";

if($similarProduct!=0||$similarProduct!=NULL)
{
$counter=0;
echo"<br>Customers Who Bought Items in Your Cart Also Bought<br>";
echo"<table width='100%' style='text-align:center' id='productTable'>";
foreach($similarProduct as $row1)
{
 if($counter==0){ 
 echo "<tr id='product".$row1->productId."'>";
 }
echo "<td id='".htmlspecialchars($row1->productId)."' style='padding: 5px'> <br>
<img src='http://cs-server.usc.edu:2555/CodeIgniter/application/views/content/images/" . htmlspecialchars($row1->productImg) . "' width='60px' height='60px'>
<br>" . htmlspecialchars($row1->productName) . "<br>$" . htmlspecialchars($row1->productPrice) ."<br></td>";
if($counter==4)
    {
 echo '</tr>';
 break;
    $counter=-1;
    }
  $counter++;

 }
echo "</table>";
}
echo'</div></div>
</section>
<footer style=" clear: both;position: relative;z-index: 10;height: 3em;margin-top: -3em;">  
  <p>&copy; 2014. All Rights Reserved.</p>
  <p>Designed and Developed by <a class="pink" href="mailto:kotwal@usc.edu">Priya Kotwal</a></p>
</footer>

</body>
</html>';

		
?>