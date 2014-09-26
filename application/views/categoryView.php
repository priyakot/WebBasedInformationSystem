<?php
//$loginVal =TRUE;
//$error=NUll;
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


	dv2 = document.getElementById("productDetail");
	dv3 = document.getElementById("categoryDiv");


	dv2.style.display = "none";
	dv3.style.display = "block";


  $("#orders1").click(function(){
   // $("p").slideToggle();
    alert("CLICKED	");
  });
  
/**   $("#updateCustomerButton").click(function(){
    alert("CLICKED	MY ACCOUNT");
  }); **/
  
   $("#cart").click(function(){
    alert("CLICKED	cart");
    $(location).attr("href", "http://cs-server.usc.edu:2555/CodeIgniter/index.php/validate/viewCart/'.htmlspecialchars($username).'");

  });
  
   $("#orders").click(function(){
    alert("CLICKED	orders");
    $(location).attr("href", "http://cs-server.usc.edu:2555/CodeIgniter/index.php/validate/viewPrevOrders/'.htmlspecialchars($username).'");

  });
  
   $("#logout").click(function(){
    alert("CLICKED	Logout");
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

  //alert("val: " +catId); 

	
/**	$.ajax({
    type: "POST",
    url: "http://cs-server.usc.edu:2555/CodeIgniter/index.php/validate/displayCategory",
   
		async: true,
		data: {
		categoryId : catId[0],
		username: "'.$username.'",		   
    }
	
  }); **/
  
    
	dv2.style.display = "none";
	dv3.style.display = "block";
	
	
	
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
<div id="d1" style="width:100%; height:100%; margin:0 auto; overflow:scroll" class="contentWrapper">
<div data-role="header" data-position="fixed" id="header">
<nav style="text-align:center">
	<div id="hImgDiv" class="hImgDiv">
		<img id="hImg" class="hImgDiv" align="center" src="http://cs-server.usc.edu:2555/CodeIgniter/application/views/content/images/header.png">
   </div>   
</nav>
 </div">
<section class="contentWrapper">
'.$username.'
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
<li><form id="accountForm" name="accountForm" method="post" action="'.site_url("validate/updateCustomer/".htmlspecialchars($username)."").'">
<li><input type="submit" style="text-align: center; padding: 5px 5px 8px 5px;background-color: #e63273;color: #FFF"  value="MY ACCOUNT" id="updateCustomerButton" ></form></li>
<li><input type ="button" style="text-align: center; padding: 5px 5px 8px 5px;background-color: #e63273;color: #FFF" value="Shopping Cart" id="cart"></li>
<li><input type ="button" style="text-align: center; padding: 5px 5px 8px 5px;background-color: #e63273;color: #FFF" value="My Orders" id="orders"></li>
<li><input type="button" style="text-align: center; padding: 5px 5px 8px 5px;background-color: #e63273;color: #FFF" value="Logout" id="logout"></li>
</ul> -->

</div>


<div id="div1" style="width:100%; height:100%; margin:0 auto; overflow:scroll; font-family: Arial, Helvetica, sans-serif;" class="regformWrapper">


<div id="filter" class="filterCatDiv">
<label class="filterLabel">Filter by: <br>CATEGORY</label> 
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


<div id=categoryDiv name=categoryDiv class="productDetailDivEighty"">

';

		if($specialSalesCat!=0)
		{
		 echo '<div id="sales" class="specialSalesDiv" ><span class="spanSpecial">SPECIAL SALES<br><br>';
		
		foreach ($specialSalesCat as $row7) {

		$dateFormat1 = date("F j, Y, g:i a", strtotime($row7->endDate) );
			if($row7->endDate> date("Y-m-d"))
			{
			   echo'EXTRA ' .htmlspecialchars($row7->discPercent).'% OFF '.htmlspecialchars($row7->productCatName).' till '.$dateFormat1.'<br><br>' ;
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

$counter1 =0;
echo $productsCat;
echo '<br>'.$specialSalesCat;


foreach ($productsCat as $rowCat) {
   if($counter1==0){ 
  echo "<tr id='product".htmlspecialchars($rowCat->productId)."'>";
 }
  echo "<td id='".htmlspecialchars($rowCat->productId)."' style='padding: 5px'> <br><img src='http://cs-server.usc.edu:2555/CodeIgniter/application/views/content/images/" . htmlspecialchars($rowCat->productImg) . "' width='100px' height='120px'>
  <br><br><br><label class='labelTable'>" . htmlspecialchars($rowCat->productName) . "</label><br><br><label class='labelTable'>$" . htmlspecialchars($rowCat->productPrice) ."</label><br></td>";
 
  
  if($counter1==3)
    {
 echo '</tr>';
    $counter1=-1;
    }
  $counter1++;
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

<footer style="position: relative; z-index:1">
  <p>&copy; 2014. All Rights Reserved.</p>
  <p>Designed and Developed by <a class="pink" href="mailto:kotwal@usc.edu">Priya Kotwal</a></p>
</footer>

</body>
</html>';


?>