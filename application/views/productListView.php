<?php
/**ob_start();
session_start();
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
  	  header('Location: http://cs-server.usc.edu:2555/571HW1/loginCustomer.php');
	}
}
$_SESSION['timeout'] = time();**/


echo '<html>
<head>
<meta charset="utf-8">
<title>aww</title>
<link rel="stylesheet" type="text/css" href="http://cs-server.usc.edu:2555/CodeIgniter/application/views/content/styles/base.css">

<script src="http://cs-server.usc.edu:2555/jquery-1.11.1.min.js"/>

<script>
  $(document).ready(function(){
  
/**  $("#selCategory").on("change", function() {
  echo "selected";
  alert(this.value); // or $(this).val()
}); **/

$("select").on("change", function() {
  alert( this.value );
});
  
  
  /**$("#selCategory").change(function() {
  alert("val" +$("#selCategory").val()); 
}); **/


$(document).on("click", "#orders", function(){
	    alert("clicked");
});


/**  $("#orders").click(function(){
    alert("clicked");
  });
**/

  
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
<a href="http://cs-server.usc.edu:2555/571HW1/viewCart.php"><input type ="button" style="text-align: center; padding: 5px 5px 8px 5px;background-color: #e63273;color: #FFF" name="Shopping Cart" value="cart" id="cart"> </a>
<input type ="button" style="text-align: center; padding: 5px 5px 8px 5px;background-color: #e63273;color: #FFF" name="My Orders" value="orders" id="orders">
<a href="http://cs-server.usc.edu:2555/571HW1/loginCustomer.php"><input type="button" style="text-align: center; padding: 5px 5px 8px 5px;background-color: #e63273;color: #FFF" name="Logout" value="logout" id="logout"></a>
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
	//$sql = "SELECT p.productId,p.productName,p.productPrice,p.productImg,c.productCatName,c.productCatId FROM product p,productCategory c WHERE p.productCatId=c.productCatId";
	
//	$sql6 = "select s.*,p.productCatName from specialSales s,productCategory p where s.productCatId=p.productCatId";



		if($specialSales!=0)
		{
		 echo '<div id="sales" style="background-color: #e63273; font-color: #ffffff "><span style="color: #ffffff" >SPECIAL SALES<br><br>';
		
		foreach ($specialSales as $row6) {
	//	while($row6 = mysql_fetch_array($res6)) {
		//echo $row6['specialSalesId'].'<br>';
		//echo $row6['endDate'];
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
		<table width='100%' style='text-align:center'>";

$counter =0;
foreach ($products as $row) {
  //$counter++;
   if($counter==0){ 
  echo "<tr id='product".$row->productId."'>";
 }
  echo "<td onClick='displayProduct(".$row->productId.")' style='padding: 5px'> <br><img src='http://cs-server.usc.edu:2555/CodeIgniter/application/views/content/images/" . $row->productImg . "' width='100px' height='120px'><br>" . $row->productName . "<br>$" . $row->productPrice ."<br></td>";

 // echo "<td style='padding: 5px'><form action='manageProduct.php' method='POST'><input type='hidden' name='productId' value='" . $row['productId'] . "' /><input type='hidden' name='productCatId' value='" . $row['productCatId'] . "' /><input type='hidden' name='productCatName' value='" . $row['productCatName'] . "' /><input type = 'submit' name ='updateProduct' value='UPDATE'></form></td>";

 
  
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