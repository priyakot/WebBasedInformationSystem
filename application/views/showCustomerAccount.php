<?php
//ob_start();
//session_start();
/**if(isset($update))
{
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
} **/

echo 'In add customer';

	
			 	
echo'<html>
<head>
<meta charset="utf-8">
<title>aww</title>
<link rel="stylesheet" type="text/css" href="http://cs-server.usc.edu:2555/CodeIgniter/application/views/content/styles/base.css">
<script src="http://cs-server.usc.edu:2555/CodeIgniter/application/views/jquery-1.11.1.min.js"></script>

<script>
 $(document).ready(function(){';
   
 if(isset($update))
{
  foreach($customerInfo as $row)
  {
  //echo "isset".$row->custId;
  }
  
 echo '$("#emailId").val("'.$row->email.'");';
 echo '$("#custId").val('.$row->custId.');';
 echo '$("#password").val("'.$row->password.'");';
 echo '$("#fName").val("'.$row->fName.'");';
 echo '$("#lName").val("'.$row->lName.'");';
 echo '$("#contactNumber").val("'.$row->contactNumber.'");';
 if($row->sex=="male"){
 echo '$("#sex1").prop("checked",true);';
 }
  if($row->sex=="female"){
 echo '$("#sex2").prop("checked",true);';
 }
  if($row->sex=="nothing"){
 echo '$("#sex3").prop("checked",true);';
 }
 echo '$("#dob").val("'.$row->dob.'");';
 echo '$("#address").val("'.$row->address.'");';
 echo '$("#address2").val("'.$row->address2.'");';
 echo '$("#city").val("'.$row->city.'");';
 echo '$("#state").val("'.$row->state.'");';
 echo '$("#zipCode").val("'.$row->zipcode.'");';
 
 if($row->newsletter=="yes"){
 echo '$("#newsletter").attr("checked", true);'; 
 //echo '$("#newsletter").checked;';
 }

}

 

 
 echo' $("#add").click(function(){
  
    alert("Record added");

  
    $("#updateCustomer").attr("action", "'.site_url("validate/addNewCustomerInDB"). '");
    
   
 
   /**  $.ajax({
    type: "POST",
    url: "http://cs-server.usc.edu:2555/CodeIgniter/index.php/validate/addNewCustomerInDB",
    success: addAlert,
    async: true
  });**/
         
   });
   
   $("#update").click(function(){
  
    var username = $("#emailId").val();
    alert("Record updated:"+username);
    $("#updateCustomer").attr("action", "'.site_url("validate/updateCustomerInDB/username"). '");
 
         
   });
   
     $("#cancel").click(function(){
  
    var username = $("#emailId").val();
   // alert("Record updated:"+username);
    history.go(-1);
 /**   if(username=="")
    {
     history.go(-1);
    // $("#updateCustomer").attr("action", "'.site_url("validate/home/username"). '");

    }
    else
    {
    
    //$("#updateCustomer").attr("action", "'.site_url("validate/home/username"). '");
 	} **/
         
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
<form name="updateCustomer" id="updateCustomer" method="post" style= "border : 1px solid #bcbcbc; padding : 5px; font-family: Arial, Helvetica, sans-serif;">
<fieldset>
        <legend>&nbsp; MY PROFILE &nbsp;</legend>
<br>
<div>
<fieldset>
        <legend>&nbsp; Account Details &nbsp;</legend>
<label>Account Details</label><input type="hidden" id="custId" name="custId" >';
if(!isset($update))
{
echo'
<br>
<br>
<label>UserName</label><input type="text" id="email" name="email"  placeholder="Enter Email Id" />
';
}echo'
<br>
<br>
<input type = "hidden" id="emailId" name="emailId">
<label>Password</label><input type="password" id="password" name="password" />
<br>
<br>
</fieldset>

</div>
<br>
<br>
<label>First Name</label><sup>*</sup><input type="text" id="fName" name="fName"  />
<br>
<br>
<label>Last Name</label><sup>*</sup><input type="text" id="lName" name="lName" />
<br>
<br>
<label>Contact Number</label><sup>*</sup><input type="text" id="contactNumber" name="contactNumber"/>
<br>
<br>
<label>Gender</label><input type="radio" name="sex" value="male" id="sex1"> Male <input type="radio" name="sex" value="female" id="sex2">Female  <input type="radio" name="sex" value="nothing" id="sex3">Choose not to disclose
<br>
<br>
<label>Date of Birth</label><sup>*</sup><input type="text" id="dob" name="dob"  placeholder="YYYY-MM-DD"/>
<br>
<br>
<label>Address Line 1</label><sup>*</sup><input type="text" id="address" name="address" />
<br>
<br>
<label>Address Line 2</label><input type="text" id="address2" name="address2" />
<br>
<br>
<label>City</label><sup>*</sup><input type="text" id="city" name="city" />
<br>
<br>
<label>State</label><sup>*</sup><input type="text" id="state" name="state" />
<br>
<br>
<label>Zip Code</label><sup>*</sup><input type="text" id="zipCode" name="zipCode" />
<br>
<br>
&nbsp;&nbsp;<input type="checkbox" id="newsletter" name="newsletter" value = "yes"/>I want to join the VIP CLUB and receive AWWW accessories exclusive newsletter highlighting the latest trends and promotions.
<br>
<br>
<div style="text-align:center">';
 if(isset($update))
 {
echo'<input type = "submit" name ="updateButton" value= "UPDATE" id="update" align="center">'; 
 }
 else
 {
  echo'<input type = "submit" name="addButton" value= "ADD" id="add" align="center">'; 

 } 
echo'&nbsp;&nbsp;<input type = button id="cancel" name="cancel" value= "CANCEL" align="center">  
</div> 
 
</div>
<br>
<br>
   
</fieldset>
</form>
</div>
</section>
<footer style=" clear: both;position: relative;z-index: 10;height: 3em;margin-top: -3em;">  
  <p>&copy; 2014. All Rights Reserved.</p>
  <p>Designed and Developed by <a class="pink" href="mailto:kotwal@usc.edu">Priya Kotwal</a></p>
</footer>

</body>
</html>';


?>