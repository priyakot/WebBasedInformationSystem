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

class Showproductcatmodel extends CI_Model {

	 function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function showCategory($q){
    
   // $sql = "select * from product where productCatId = '$q'";
  //	$sql2 = "select * from specialSales where productCatId = '$q'";
//	$sql3 = "select * from productCategory where productCatId = '$q'";
    	$query = $this->db->query("select * from product where productCatId = '$q'");
    //	$sqlC = "select * from product where productCatId = '$q'";
    //	echo $sqlC;
    	return $query->result(); 
    }
    
     function showSpecialSales($q)
    {
         $query5 = $this->db->query("select s.*,p.productCatName from specialSales s,productCategory p where p.productCatId=s.productCatId and s.productCatId= '$q'");
	//	 $sqlSS = "select s.*,p.productCatName from specialSales s,productCategory p where p.productCatId=s.productCatId and s.productCatId= '$q'";
	//	 echo $sqlSS;
		 return $query5->result();
    }

    
    function showAllProducts(){
    	$query1 = $this->db->query("select * from product");
        return $query1->result(); 
    }
    
    function showProductCatNames(){
    	$query3 = $this->db->query("select productCatId,productCatName from productCategory");
        return $query3->result(); 
    }
  
  	 function showAllSpecialSales()
    {
         $query4 = $this->db->query("select s.*,p.productCatName from specialSales s,productCategory p where p.productCatId=s.productCatId");
		 return $query4->result();
    }

  
  
}



?>