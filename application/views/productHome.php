<?php

echo '<html>
<head>
<meta charset="utf-8">
<title>aww</title>
<link rel="stylesheet" type="text/css" href="http://cs-server.usc.edu:2555/CodeIgniter/application/views/content/styles/base.css">



<script src="http://cs-server.usc.edu:2555/jquery-1.11.1.min.js">

$(document).ready(function(){

$("#orders").click(function(){
	    alert("clicked");
});

/** $("#productTable tr td").click(function() {  
    var cid = $(this).attr("id");
    alert(cid);
  //  var cval = $(this).text();
  //  alert(cval);}); **/
  
});

</script>



</head>
<body background="http://cs-server.usc.edu:2555/CodeIgniter/application/views/content/images/butterfly.png">

<nav style="text-align:center">
	<div style="height:125px">
		<img style="height:110px" align="center" src="http://cs-server.usc.edu:2555/CodeIgniter/application/views/content/images/header.png">
   </div>
    
    
</nav>

<section class="contentWrapper">
<div style="width:100%; float:center" align="left" >
<form id="accountForm" name="accountForm" method="post" action="showCustomerAccount.php"><input type="submit" style="text-align: center; padding: 5px 5px 8px 5px;background-color: #e63273;color: #FFF"  name="updateCustomerButton" id="updateCustomerButton" value="MY ACCOUNT"></form>
<input type ="button" style="text-align: center; padding: 5px 5px 8px 5px;background-color: #e63273;color: #FFF" name="Shopping Cart" value="cart" id="cart">
<input type ="button" style="text-align: center; padding: 5px 5px 8px 5px;background-color: #e63273;color: #FFF" name="My Orders" value="orders" id="orders" name="orders">
<input type="button" style="text-align: center; padding: 5px 5px 8px 5px;background-color: #e63273;color: #FFF" name="Logout" value="logout" id="logout">
</div>

<div id="div1" style="width:100%;margin:0 auto; overflow:scroll; background:#ffffff; font-family: Arial, Helvetica, sans-serif;" class="regformWrapper">

<div id="filter" style="float:left; width:20%"; overflow">
<label class="label">Filter by: </label> 
<br>
<br>
<br>

CATEGORY
<br>
<select id="selCategory" name="selCategory" multiple>
 <option value="">Please select an option</option>';
 		
		foreach ($productCatInfo as $row) {
 		
		echo "<option value=" . $row->productCatId . ">" . $row->productCatName . "</option>";
	  }
 
echo' </select>
<br>
<br>

</div>

<div id=productDiv name=productDiv style="margin:0 auto;overflow:auto; width:80%">';

		if($specialSales!=0)
		{
		 echo '<div id="sales" style="background-color: #e63273; font-color: #ffffff "><span style="color: #ffffff" >SPECIAL SALES<br><br>';
		
		foreach ($specialSales as $row6) {

		$dateFormat = date("F j, Y, g:i a", strtotime($row6->endDate) );
			if($row6->endDate> date("Y-m-d"))
			{
			   echo'EXTRA ' .$row6->discPercent.'% OFF '.$row6->productCatName.' till '.$dateFormat.'<br><br>' ;
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
  echo "<tr id='product".$row->productId."'>";
 }
  echo "<td id='".$row->productId."' style='padding: 5px'> <br><img src='http://cs-server.usc.edu:2555/CodeIgniter/application/views/content/images/" . $row->productImg . "' width='100px' height='120px'><br>" . $row->productName . "<br>$" . $row->productPrice ."<br></td>";
 
  
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

</fieldset>
</div>
</section>
<footer style=" clear: both;position: relative;z-index: 10;height: 3em;margin-top: -3em;">  
  <p>&copy; 2014. All Rights Reserved.</p>
  <p>Designed and Developed by <a class="pink" href="mailto:kotwal@usc.edu">Priya Kotwal</a></p>
</footer>
</body>

</html>';


?>