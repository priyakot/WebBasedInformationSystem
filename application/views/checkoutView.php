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
    
   $("#orderCheckout").click(function(){
  
    alert("CLICKED checkOut");

    var uname = "'.$username.'";
    var bAddress = $("#billAddress").val();
    var sAddress = $("#shipAddress").val();
    var total = $("#totalValue").val();

     if(uname!=NULL && bAddress!=NULL&& sAddress!=NULL&& total!=NULL)
     {
    	$("#finalCheckOut").attr("action", "'.site_url('validate/finalCheckout/"+bAddress+"/"+sAddress+"/"+total+"/"+uname').');
    }
  else{
    alert("Please fill the required information!");
  }
         
   });


  $("#continueShopping").click(function(){
    alert("CLICKED	continueShopping");
    $(location).attr("href", "http://cs-server.usc.edu:2555/CodeIgniter/index.php/validate/showProductHome/'.$username.'");

  });
  
 /** $("#cancel").click(function(){
  	history.go(-1);

  });**/
  
  $("#cardNumber").change(function() {
  	
  	
var inputtxt = $("#cardNumber").val();
var selectedValue = $("#cardType").val();


// alert("selected: "+selectedValue);
  var cardno = /^(?:3[47][0-9]{13})$/;
    var cardno1 = /^(?:4[0-9]{12}(?:[0-9]{3})?)$/;
     var cardno2 = /^(?:5[1-5][0-9]{14})$/;
             var cardno3 = /^(?:6(?:011|5[0-9][0-9])[0-9]{12})$/;



  if(selectedValue==3)
  {
  if(inputtxt.value.match(cardno) )
        {
      return true;
        }
      else
        {
        alert("Not a valid Amercican Express credit card number!");
        return false;
        }
    }    
    else if(selectedValue==1){
    	if(inputtxt.value.match(cardno1))
        {
      return true;
        }
      else
        {
        alert("Not a valid Visa credit card number!");
        return false;
        }
    }
       
  else if(selectedValue==2){
  
   if(inputtxt.value.match(cardno2))
        {
      return true;
        }
      else
        {
        alert("Not a valid Mastercard number!");
        return false;
        }
  }
 
      else if(selectedValue==4){
      	if(inputtxt.value.match(cardno3))
        {
      return true;
        }
      else
        {
        alert("Not a valid Discover card number!");
        return false;
        }
      }  
      else
      {
                alert("Please select card type!");
				        return false;

      }
       

  	
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
<body background="#FFFFFF">

<nav style="text-align:center">
	<div style="height:125px">
		<img style="height:110px" align="center" src="http://cs-server.usc.edu:2555/CodeIgniter/application/views/content/images/header.png">
   </div>
    
    
</nav>
<section class="contentWrapper">

<div id="div1" style="width:100%;margin:0 auto; overflow:scroll; backgound:#ffffff; font-family: Arial, Helvetica, sans-serif;" class="regformWrapper">
<form name="finalCheckOut" id="finalCheckOut" method="post" style= "border : 1px solid #bcbcbc; padding : 5px; font-family: Arial, Helvetica, sans-serif;">
<h2>CHECKOUT | PAYMENT</h2>
<br>
<br>
<br>
<div id="billingBlock">
<fieldset><legend>&nbsp;<h2>SHIPPING AND BILLING INFORMATION</h2>  &nbsp;</legend>
<br><br>
<label>SHIPPING ADDRESS</label>
<textarea rows="4" cols="50" id="billAddress" name="billAddress">
</textarea>
<br>
<br>
<label>BILLING ADDRESS</label>
<textarea rows="4" cols="50" id="shipAddress" name="shipAddress">
</textarea>

</fieldset>
</div>
<br>
<br>';
$subTotal =0;
$totalTax =0;
$totalPrice=0;

$subTotal = $total;
$totalTax= $total+0.1*$total;
$totalPrice=$total+5+0.1*$total; 
//echo $totalTax, $totalPrice;
echo'<div id="totalsBlock">
<fieldset><legend>&nbsp;<h2>Summary of Charges</h2>  &nbsp;</legend>

<br>
<br>
<label>sub-total</label>$<input type = "text" id="subTotalValue" name="subTotalValue" value="'.$subTotal.'" readonly style="border:none">
<br>
<br>
<label>Shipping: </label>standard: $5 (3-6 business days)
<br>
<br>
<label>Estimated taxes</label>$<input type = "text" id="taxValue" name="taxValue" value='.$totalTax.' readonly style="border:none">
<br>
<br>
<label>TOTAL</label>$<input type = "text" id="totalValue" name="totalValue" value='.$totalPrice.' readonly style="border:none">
<br>
<br>
</fieldset></div>
<div id=paymentInfoBlock>
<fieldset><legend>&nbsp; <label>PAYMENT INFORMATION</label> &nbsp;</legend>
<br>
<br>
<div id="paymentLogos">
<label> </label><img height="50px" width="250" align="center" src="http://cs-server.usc.edu:2555/CodeIgniter/application/views/content/images/creditcardlogo.jpg">
</div>
<div id="payWithCCForm">

				<fieldset>
					<label>credit card</label>
					<select name="cardType" id="cardType">
						<option value="" selected="">SELECT CARD TYPE*</option>
						
										<option value="1">VISA</option>
									
										<option value="2">Master Card</option>
									
										<option value="3">American Express</option>
									
										<option value="4">Discover</option>
									
	              </select>
				</fieldset>
				<fieldset>
					<label>card number<br><span>(16 to 19 digits)</span></label>
					<input type="text" name="cardNumber" id="cardNumber" maxlength="19">
				</fieldset>
				<fieldset>
					<label>expiry date</label>
					<select name="cardExpirationMonth" >
	                   <option value=""></option>
	                   
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
	                     	
	                    		<option value="11">11</option>
	                     	
	                    		<option value="12">12</option>
	                     	
	                 </select>
	                 <select name="cardExpirationYear" >
	                   <option value=""></option>
	                   
	                   		<option value="2014">2014</option>
	                   	
	                   		<option value="2015">2015</option>
	                   	
	                   		<option value="2016">2016</option>
	                   	
	                   		<option value="2017">2017</option>
	                   	
	                   		<option value="2018">2018</option>
	                   	
	                   		<option value="2019">2019</option>
	                   	
	                   		<option value="2020">2020</option>
	                   	
	                   		<option value="2021">2021</option>
	                   	
	                   		<option value="2022">2022</option>
	                   	
	                   		<option value="2023">2023</option>
	                   	
	                   		<option value="2024">2024</option>
	                   	
	                 </select>
				</fieldset>
				<div class="formRow" id="startDate" style="display:none;">
				<fieldset>
					<label>Start Date</label>
					<select name="cardStartMonth" >
	                   <option value=""></option>
	                   
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
	                     	
	                    		<option value="11">11</option>
	                     	
	                    		<option value="12">12</option>
	                     	
	                 </select>
	                 <select name="cardStartYear" >
	                   <option value=""></option>
	                   
	                   		<option value="2009">2009</option>
	                   	
	                   		<option value="2010">2010</option>
	                   	
	                   		<option value="2011">2011</option>
	                   	
	                   		<option value="2012">2012</option>
	                   	
	                   		<option value="2013">2013</option>
	                   	
	                   		<option value="2014">2014</option>
	                   	
	                 </select>
				</fieldset>
				</div>
				<fieldset>
					<label>cvc number</label>
					<input type="text" name="cardCVCNumber"  id="cardCVCNumber" maxlength="4" style="width:50px">
					
				</fieldset></fieldset>
			</div>
<br>
<br>
<div><input type="button" id="continueShopping" name="continueShopping" value="CONTINUE SHOPPING" style="text-align: center; padding: 5px 5px 8px 5px;background-color: #e63273;color: #FFF">
<input type="submit" name="orderCheckout" id="orderCheckout" value="CHECKOUT" style="text-align: center; padding: 5px 5px 8px 5px;background-color: #e63273;color: #FFF"></div>

</div>
<br>
<br>



</div>
</section>
<footer style=" clear: both;position: relative;z-index: 10;height: 3em;margin-top: -3em;">  
  <p>&copy; 2014. All Rights Reserved.</p>
  <p>Designed and Developed by <a class="pink" href="mailto:kotwal@usc.edu">Priya Kotwal</a></p>
</footer>

</body>
</html>';