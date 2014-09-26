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

	dv = document.getElementById("productDetail");
	dv.style.display = "block";';

foreach($product as $row)
  {
  //echo "isset".$row->productId;
  
 echo '$("#productId").val('.htmlspecialchars($row->productId).');';
 echo '$("#productName").val("'.htmlspecialchars($row->productName).'");';
 echo '$("#price").val('.htmlspecialchars($row->productPrice).');';
 echo '$("#productImg").val("'.htmlspecialchars($row->productImg).'");';

 }

echo'   
   
 /**  $("#selCategory").change(function() {
    alert("val" +$("#selCategory").val()); 
    var catId =   $("#selCategory").val();
    var category = catId[0];	
}); **/
   
   
   $("#addToCart").click(function(){
  
    var productId = $("#productId").val();
     var color = $("#color").val();
    var size = $("#size").val();
    var qty = $("#quantity").val();
    var price = $("#price").val();
    var uname = "'.htmlspecialchars($username).'";
    
    //alert("Added to cart!"+productId+color+size+qty+price);
    alert("Added to cart!");

    
    $("#addToCartForm").attr("action", "'.site_url('validate/addToCart/"+productId+"/"+size+"/"+color+"/"+qty+"/"+price+"/"+uname').');
 
         
   });


  $("#orders1").click(function(){
   // $("p").slideToggle();
    alert("CLICKED	");
  });
  
  
     $("#cart").click(function(){
   // alert("CLICKED	cart");
    $(location).attr("href", "http://cs-server.usc.edu:2555/CodeIgniter/index.php/validate/viewCart/'.htmlspecialchars($username).'");

  });
  
   $("#orders").click(function(){
  //  alert("CLICKED	orders");
    $(location).attr("href", "http://cs-server.usc.edu:2555/CodeIgniter/index.php/validate/viewPrevOrders/'.htmlspecialchars($username).'");

  });
  
   $("#logout").click(function(){
    alert("Logout!");
        $(location).attr("href", "http://cs-server.usc.edu:2555/CodeIgniter/index.php/test");

  });
  
  
  $("#homePage").click(function(){
   // alert("CLICKED	continueShopping");
    $(location).attr("href", "http://cs-server.usc.edu:2555/CodeIgniter/index.php/validate/showProductHome/'.htmlspecialchars($username).'");

  });
  
/**  
  $("#selCategory").change(function() {
  alert("val" +$("#selCategory").val()); 
    var catId =   $("#selCategory").val();
    var category = catId[0];
    $(location).attr("href", "http://cs-server.usc.edu:2555/CodeIgniter/index.php/validate/displayCategory/"+category+"/'.htmlspecialchars($username).'");
//    header("Location: http://cs-server.usc.edu:2555/CodeIgniter/index.php/validate/displayCategory/catId[0]/'.htmlspecialchars($username).'");
 // alert("val: " +catId); 

	
/**	$.ajax({
    type: "POST",
    url: "http://cs-server.usc.edu:2555/CodeIgniter/index.php/validate/displayCategory",
   
		async: true,
		data: {
		categoryId : catId[0],
		username: "'.$username.'",		   
    }
	
  }); 
  	
	
}); **/

 

  
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
'.htmlspecialchars($username).'
<div style="width:100%; float:center" align="left" >
<table class="tableNav">
<tr>
<td><input type ="button" style="text-align: center; padding: 5px 5px 8px 5px;background-color: #e63273;color: #FFF" value="Home" id="homePage"></td>
<td><input type ="button" style="text-align: center; padding: 5px 5px 8px 5px;background-color: #e63273;color: #FFF" value="Shopping Cart" id="cart"></td>
<td><input type ="button" style="text-align: center; padding: 5px 5px 8px 5px;background-color: #e63273;color: #FFF" value="My Orders" id="orders"></td>
<td><input type="button" style="text-align: center; padding: 5px 5px 8px 5px;background-color: #e63273;color: #FFF" value="Logout" id="logout"></td>
</tr>
</table>
</div>


<div id="div1" style="width:100%; height:100%; margin:0 auto; overflow:scroll; font-family: Arial, Helvetica, sans-serif;" class="regformWrapper">


<div id=productDetail name=productDetail style="margin:0 auto;overflow:auto; width:90%">';

       if($productColor==0){
			  $color[]= "default";

	   }
	    else{
		foreach($productColor as $row3) {
		
		$color[] = htmlspecialchars($row3->color);
		echo $color;
		}
		//foreach($color as $colorValue){ echo $colorValue;}
    }
	if($productSize==0){
			  $size[]= "freeSize";

	} 
	else{

		foreach($productSize as $row2) {
		
		if($row2->small=="true")
		{
		  $size[]= "small";
		}
		if($row2->medium=="true")
		{
		  $size[]= "medium";
		}
		if($row2->large=="true")
		{
		  $size[]= "large";
		}
		if($row2->oneSize=="true")
		{
		  $size[]= "oneSize";
		}
		echo $size;
		}
		
		//foreach($size as $value){ echo $value;}
	}	
	
		
		foreach($product as $row) {
		$productName = $row->productName;
	//	echo $productName;
		

		
		
		 echo '<form id=addToCartForm name="addToCartForm" method="post">
		 <div id=productImgDiv name=productImgDiv style="float:left; width:50%"; overflow">
		 <input type="hidden" id="productId" name="productId" value="'.htmlspecialchars($row->productId).'"/>
		 <input type="hidden" id="productName" name="productName" value="'.htmlspecialchars($row->productName).'"/>
		 <input type="hidden" id="price" name="price" value="'.htmlspecialchars($row->productPrice).'"/>
		 <input type="hidden" id="productImg" name="productImg" value="'.htmlspecialchars($row->productImg).'"/>
  <img src="http://cs-server.usc.edu:2555/CodeIgniter/application/views/content/images/'.htmlspecialchars($row->productImg) .'" width="160px" height="160px">
  <br><br><label>Description</label><br><br>'. htmlspecialchars($row->productDesc) .'<br></div>
<div id=productDetailDiv name=productDetailDiv style="margin:0 auto;overflow:auto; width:30%">
<br><br><label style="font-size:20px; font-weight:bold"> '. htmlspecialchars($row->productName) . '</label>
<br><br><br><br><label style="font-size:18px">$'. htmlspecialchars($row->productPrice) .'</label>
<br><br><br><br><br><br><br><br>Quantity: <select id="quantity" name="quantity">
 <option value="">Please select</option>
  <option value="1">1</option>
  <option value="2">2</option>
   <option value="3">3</option>
  <option value="4">4</option>
  <option value="5">5</option>
<option value="6">6</option>
   <option value="7">7</option>
  <option value="8">8</option>
  <option value="9">9</option>
   <option value="10">10</option>
</select><br><br>Size: <select id="size" name="size"> <option value="">Please select</option>'; foreach($size as $value){ echo'<option value="'. htmlspecialchars($value) . '">'. htmlspecialchars($value) . '</option>';} echo'
</select><br><br>Color: <select id="color" name="color"><option value="">Please select</option>'; foreach($color as $colorValue){ echo'<option value="'. htmlspecialchars($colorValue) . '">'. htmlspecialchars($colorValue) . '</option>';} echo'
</select><br><br>Warranty(Years):'. htmlspecialchars($row->warranty) . ' <br><br><input type="submit" id="addToCart" name="addToCart" value="ADD TO BAG" style="text-align: center; padding: 5px 5px 8px 5px;background-color: #e63273;color: #FFF"></div>
<div style="text-align:center">
&nbsp;&nbsp;<input type = button value= "GO BACK" onClick="history.go(-1);">  
</div> </form>';
}

echo'</div>





</div>

</section>
</div>
<footer style="position: relative; z-index:1">
  <p>&copy; 2014. All Rights Reserved.</p>
  <p>Designed and Developed by <a class="pink" href="mailto:kotwal@usc.edu">Priya Kotwal</a></p>
</footer>

</body>
</html>';


?>