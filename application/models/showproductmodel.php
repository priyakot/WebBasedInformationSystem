<?php

/**ob_start();
session_start();
$currentUser = $_SESSION['userName'];

if(!$currentUser)
{
  //header('Location: http://cs-server.usc.edu:2555/571HW1/loginCustomer.php');

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
$_SESSION['timeout'] = time(); **/

class Showproductmodel extends CI_Model {

	 function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function showProductInfo($q){

    	$query = $this->db->query("select * from product where productId = ?",array($q));
    	return $query->result(); 
    	
    }
    
    function showProductSize($q){
        
    	$query1 = $this->db->query("select * from productSize where productId= ?",array($q));
        return $query1->result(); 
    }
    
    function showProductColor($q){

    	$query3 = $this->db->query("select * from productColor where productId= ?",array($q));
        return $query3->result(); 
    }
  
     function showProductCatNames(){
     
    	$query4 = $this->db->query("select productCatId,productCatName from productCategory");
        return $query4->result(); 
    }
  
     function getCustId($username){
     
     $query5 = $this->db->query("Select custId from customer where email =?",array($username));
     $sql5 = "Select custId from customer where email ='$username'";
    // echo $sql5;
     
     if ($query5->num_rows() > 0)
	{
    $row = $query5->row(); 
    $cid =  $row->custId;

	} 
     return $cid; 
     }
  
     function addToCartDB($productId,$size,$color,$qty,$price,$custId){

	 $query6 = $this->db->query("INSERT into shoppingCart VALUES($custId,$productId,$qty,'$size','$color',$price)");
		
    // $sql2 = "INSERT into shoppingCart VALUES($custId,$productId,$qty,'$size','$color',$price)";
	 
	// echo $sql2;
        
        
     //return $query6->result(); 
       
     }
     
     function getCartInfo($custId){
     
      $query7 = $this->db->query("SELECT s.*,p.productImg,p.productName FROM shoppingCart s,product p WHERE s.custId=$custId AND s.productId = p.productId");
     // $sql7 = "SELECT s.*,p.productImg,p.productName FROM shoppingCart s,product p WHERE s.custId=$custId AND s.productId = p.productId";
     // echo $sql7;
      return $query7->result(); 
      
     }
     
     function getSimilarProducts($custID){
     $productId=0;
      $query16 = $this->db->query("SELECT s.*,p.productImg,p.productName FROM shoppingCart s,product p WHERE s.custId='$custID' AND s.productId = p.productId");

      if ($query16->num_rows() > 0)
		{
    		$row = $query16->row(); 
    		$productId =  $row->productId;
		}
		
		if($productId!=0 || $productId!=NULL)
		{
	  $query17  = $this->db->query("SELECT orderId from orderDetail where productId = '$productId'");
	  if ($query17->num_rows() > 0)
		{
    		$row = $query17->row(); 
    		$orderId =  $row->orderId;
		}
		
	   $query18 = $this->db->query("SELECT *from orderDetail o, product p where o.orderId = '$orderId' and o.productId = p.productId");
	   return $query18->result();
		}
		
     }
     
     
     function updateCartDB($q,$p,$custId){
     
      $query8 = $this->db->query("UPDATE shoppingCart(productQty) SET VALUES($p) WHERE productId=$q AND custId = $custId");
     // $sql7 = "SELECT s.*,p.productImg,p.productName FROM shoppingCart s,product p WHERE s.custId=$custId AND s.productId = p.productId";
     // echo $sql7;
     // return $query8->result();
     
     }
     
     function deleteCartItemDB($q,$custId){
     
     //$sql1 = "DELETE FROM shoppingCart WHERE productId=$q AND custId = $custId";

      $query9 = $this->db->query("DELETE FROM shoppingCart WHERE productId=$q AND custId = $custId");
    
    //  return $query9->result();
     }
     
     function deleteFullCartDB($custID){
        $query20 = $this->db->query("DELETE FROM shoppingCart WHERE custId = $custID");

     }
     
     
     function insertOrder($bAddress,$sAddress,$total,$custId){
     		$currentDate = date("Y-m-d H:i:s");
     		
     		$query10 = $this->db->query("INSERT INTO `order` (
`orderId` ,
`custId` ,
`orderDate` ,
`totalCost` ,
`bAddress` ,
`sAddress`
)
VALUES (NULL,".$this->db->escape($custId).",".$this->db->escape($currentDate).",".$this->db->escape($total).",".$this->db->escape($bAddress).",".$this->db->escape($sAddress).");");
     		
     		
  /**   $query10 = $this->db->query("INSERT INTO `order` (
`orderId` ,
`custId` ,
`orderDate` ,
`totalCost` ,
`bAddress` ,
`sAddress`
)
VALUES (NULL,$custId,'$currentDate',$total,'$bAddress','$sAddress');");**/

   // echo $sql;
     }
     
 function getOrderId($custId){
     $query11 = $this->db->query("SELECT * FROM `order` WHERE custId=$custId order by orderDate DESC;");
     
 	if ($query11->num_rows() > 0)
		{
    		$row = $query11->row(); 
    		$orderId =  $row->orderId;
		} 
     return $orderId; 

 }
 
 function getShoppingCartInfo($custId){
// $query = $this->db->query("select * from customer where email = ? and password = ?",array($username,$password));

    $query12 =$this->db->query("Select s.custId,s.productId,s.productQty,s.productPrice from shoppingCart s where s.custId =?",array($custId));	
    return $query12->result();
 }
    
 function insertOrderDetail($productId,$productPrice,$productQty,$custId){
   $orderId = $this->getOrderId($custId);
 //  $query13 =$this->db->query("INSERT INTO orderDetail VALUES($orderId,$productId,$productPrice,$productQty)");			
 //  $sql13 = "INSERT INTO orderDetail VALUES($orderId,$productId,$productPrice,$productQty)";
 //  echo $sql13;
   
   
   
     $sql4 = "Select s.custId,s.productId,s.productQty,s.productPrice from shoppingCart s where s.custId =". $custId.";";
	//	echo $sql4;
		$res4 = mysql_query($sql4);
		while($row4 = mysql_fetch_array($res4))
		{
			
			$custId = $row4['custId'];
		//	echo '<br><br>custId: '.$custId.' '.$row4['productId'].' '.$orderId;
			
			$sql5 = "INSERT INTO orderDetail VALUES(".$orderId.",".$row4['productId'].",".$row4['productPrice'].",".$row4['productQty'].")";
		    mysql_query($sql5);
		//    echo '<br><br>';
		//    echo 'insert query2 is : '.$sql5;
			
		}
  
 }    
 
 function getPrevOrderInfo($custID){
  $query14 = $this->db->query("SELECT * FROM `order` WHERE custId = '$custID';");
  return $query14->result();
 }
  
   function getPrevOrderDetail($orderId){
   $query15 = $this->db->query("SELECT * FROM `orderDetail` o,`order` ord, `product` p WHERE o.orderId = '$orderId' and o.productId=p.productId and o.orderId=ord.orderId;");
   //$sql = "SELECT * FROM `orderDetail` o,`order` ord, `product` p WHERE o.orderId = '$orderId' and o.productId=p.productId and o.orderId=ord.orderId;";
   //echo $sql;
   return $query15->result();
  
  }
  
}



?>