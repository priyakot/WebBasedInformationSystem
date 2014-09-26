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

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" media="screen and (max-width: 800px)" href="http://cs-server.usc.edu:2555/CodeIgniter/application/views/content/styles/mobile.css">
<link rel="stylesheet" type:"css/text" media="screen and (max-width: 800px)" href="http://cs-server.usc.edu:2555/CodeIgniter/application/views/content/styles/mobile.css">
<link rel="stylesheet" type:"css/text" media="screen and (min-width: 801px)" href="http://cs-server.usc.edu:2555/CodeIgniter/application/views/content/styles/base.css">

<!-- <link rel="stylesheet" type="text/css" href="http://cs-server.usc.edu:2555/CodeIgniter/application/views/content/styles/base.css"> -->


<script src="http://cs-server.usc.edu:2555/CodeIgniter/application/views/jquery-1.11.1.min.js"></script>
<script>


$(document).ready(function(){

    dv1 = document.getElementById("productDiv");
	dv2 = document.getElementById("productDetail");
	//dv3 = document.getElementById("categoryDiv");

	dv1.style.display = "block";
	dv2.style.display = "none";
//	dv3.style.display = "none";


  $("#orders1").click(function(){
   // $("p").slideToggle();
    alert("CLICKED	");
  });
  
/**   $("#updateCustomerButton").click(function(){
    alert("CLICKED	MY ACCOUNT");
  }); **/
  
   $("#cart").click(function(){
   // alert("CLICKED	cart");
    $(location).attr("href", "http://cs-server.usc.edu:2555/CodeIgniter/index.php/validate/viewCart/'.htmlspecialchars($username).'");

  });
  
   $("#orders").click(function(){
  //  alert("CLICKED	orders");
    $(location).attr("href", "http://cs-server.usc.edu:2555/CodeIgniter/index.php/validate/viewPrevOrders/'.htmlspecialchars($username).'");

  });
  
   $("#logout").click(function(){
    alert("Logout");
        $(location).attr("href", "http://cs-server.usc.edu:2555/CodeIgniter/index.php/test");

  });
  
  $("#selCategory").change(function() {
//  alert("val" +$("#selCategory").val()); 
    var catId =   $("#selCategory").val();
    
     if(catId!="")
  { 
    var category = catId[0];
    $(location).attr("href", "http://cs-server.usc.edu:2555/CodeIgniter/index.php/validate/displayCategory/"+category+"/'.htmlspecialchars($username).'");
 }
//    header("Location: http://cs-server.usc.edu:2555/CodeIgniter/index.php/validate/displayCategory/catId[0]/'.htmlspecialchars($username).'");
 // alert("val: " +catId); 


  
    
  //  dv1.style.display = "none";
//	dv2.style.display = "none";
//	dv3.style.display = "block";
	
	
	
});



 $("#productTable tr td").click(function() {  
   var pid = $(this).attr("id");
    alert(pid);
    $(location).attr("href", "http://cs-server.usc.edu:2555/CodeIgniter/index.php/validate/displayProduct/"+pid+"/'.htmlspecialchars($username).'");

    
  }); 

  
});
</script>



</head>
<body background="http://cs-server.usc.edu:2555/CodeIgniter/application/views/content/images/butterfly.png">
<div id="one">
<div data-role="page" id="pageone">

<div id ="d1" style="width:100%; height:100%; margin:0 auto; overflow:scroll" class="contentWrapper">
<div data-role="header" data-position="fixed" id="header">
<nav style="text-align:center">
	<div id="hImgDiv" style="height:125px">
		<img id="hImg" style="height:110px" align="center" src="http://cs-server.usc.edu:2555/CodeIgniter/application/views/content/images/header.png">
   </div>   
</nav>
 </div">
<section class="contentWrapper">
Logged in: '.htmlspecialchars($username).'

<div data-role="navbar" id="dNav">
<table class="tableNav">
<tr>
<form id="accountForm" name="accountForm" method="post" action="'.site_url("validate/updateCustomer/".htmlspecialchars($username)."").'">
<td><input type="submit" style="text-align: center; padding: 5px 5px 8px 5px;background-color: #e63273;color: #FFF"  value="MY ACCOUNT" id="updateCustomerButton" ></form></td>
<td><input type ="button" style="text-align: center; padding: 5px 5px 8px 5px;background-color: #e63273;color: #FFF" value="Shopping Cart" id="cart"></td>
<td><input type ="button" style="text-align: center; padding: 5px 5px 8px 5px;background-color: #e63273;color: #FFF" value="My Orders" id="orders"></td>
<td><input type="button" style="text-align: center; padding: 5px 5px 8px 5px;background-color: #e63273;color: #FFF" value="Logout" id="logout"></td>
</tr>
</table>

<!-- <ul id="navList">
<li><form id="accountForm" name="accountForm" method="post" action="'.site_url("validate/updateCustomer/".$username."").'">
<li><input type="submit" style="text-align: center; padding: 5px 5px 8px 5px;background-color: #e63273;color: #FFF"  value="MY ACCOUNT" id="updateCustomerButton" ></form></li>
<li><input type ="button" style="text-align: center; padding: 5px 5px 8px 5px;background-color: #e63273;color: #FFF" value="Shopping Cart" id="cart"></li>
<li><input type ="button" style="text-align: center; padding: 5px 5px 8px 5px;background-color: #e63273;color: #FFF" value="My Orders" id="orders"></li>
<li><input type="button" style="text-align: center; padding: 5px 5px 8px 5px;background-color: #e63273;color: #FFF" value="Logout" id="logout"></li>
</ul> -->


</div>

<div id="div1" style="width:100%; height:100%; margin:0 auto; overflow:scroll; font-family: Arial, Helvetica, sans-serif;" class="regformWrapper">

<div data-role="main" class="ui-content" style="padding-left:4px;padding-right:4px;">

<div id="filter" class="filterCatDiv" >
<label class="filterLabel">Filter by: <br>CATEGORY</label> 
<br>
<br>
<br>


<br>
<select id="selCategory" name="selCategory" multiple class="selCat">
 <option value="">Please select an option</option>';
 		
		foreach ($productCatInfo as $row) {
 		
		echo "<option value=" . htmlspecialchars($row->productCatId) . ">" . htmlspecialchars($row->productCatName) . "</option>";
	  }
 
echo' </select>
<br>
<br>

</div>


<div id=productDetail name=productDetail class="productDetailDivEighty"></div>



<div id=productDiv name=productDiv class="productDetailDivEighty">';

		if($specialSales!=0)
		{
		 echo '<div id="sales" class="specialSalesDiv" ><span class="spanSpecial">SPECIAL SALES<br><br>';
		
		foreach ($specialSales as $row6) {

		$dateFormat = date("F j, Y, g:i a", strtotime($row6->endDate) );
			if($row6->endDate> date("Y-m-d"))
			{
			   echo'EXTRA ' .htmlspecialchars($row6->discPercent).'% OFF '.htmlspecialchars($row6->productCatName).' till '.$dateFormat.'<br><br>' ;
			}
		}
		
		echo'</span></div>';

		}

		
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
</style>
		<table width='100%' style='text-align:center' id='productTable'>";

$counter =0;
foreach ($products as $row) {
   if($counter==0){ 
  echo "<tr id='product".htmlspecialchars($row->productId)."'>";
 }
  echo "<td id='".htmlspecialchars($row->productId)."' style='padding: 5px'> <br>
  <img src='http://cs-server.usc.edu:2555/CodeIgniter/application/views/content/images/" . htmlspecialchars($row->productImg) . "' width='100px' height='120px'>
  <br><label class='labelTable'>" . htmlspecialchars($row->productName) . "</label><br><br><label class='labelTable'>$" . htmlspecialchars($row->productPrice) ."</label><br></td>";
 
  
  if($counter==3)
    {
 echo '</tr>';
    $counter=-1;
    }
  $counter++;
}
echo "</table>";	

echo'

</div>

</div>
</div>
</div>
</section>
</div>
</div>


<footer style="position: relative; z-index:1" data-role="footer" data-position="fixed">
  <p>&copy; 2014. All Rights Reserved.</p>
  <p>Designed and Developed by <a class="pink" href="mailto:kotwal@usc.edu">Priya Kotwal</a></p>
</footer>


</body>
</html>';


?>