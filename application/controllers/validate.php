<?php 
session_start();

class Validate extends CI_Controller {

/**
$config['hostname'] = "localhost";
$config['username'] = "root";
$config['password'] = "Procks25";
$config['database'] = "infoDb";
$config['dbdriver'] = "mysql";
$config['dbprefix'] = "";
$config['pconnect'] = FALSE;
$config['db_debug'] = TRUE;**/

//$uname="";
 function __construct()
    {
        // Call the Model constructor
        parent::__construct();
       

    }


	public function validateLogin()
	{
	   // $username = $_POST['userName'];
	   // $password = $_POST['password'];
	    
	    
	    $username=htmlspecialchars($this->input->post('userName'));
	    $password=$this->input->post('password');
	    $this->load->database('test');
	    $loginVal = FALSE;

	
	 //   $this->load->model('customerdb', '', $config);

		$this->load->model('customerdb');
	    if($this->customerdb->login($username,$password)){
	
	
	    //setting session variable
			if(isset($_SESSION['userName']))
			{
		
			$_SESSION['userName']=$username;
			$_SESSION['password']=$password;
			$_SESSION['timeout']=time();

			}
			else
			{
				$_SESSION['userName']=$username;;
				$_SESSION['password']=$password;
				

			}
	
	/**
	 		$this->load->library('session');
 		
 		
 		//setting session variable
			if(isset($sessiondata['userName']))
			{
			
			$sessiondata['userName']=$username;
			$sessiondata['password']=$password;
			$sessiondata['timeout']=time();
			$this->session->set_userdata($sessiondata);

	
			}
			else
			{
				$sessiondata['userName']= $username;
				$sessiondata['password']=$password;
				$this->session->set_userdata($sessiondata);
	
			}


 
	$notActive = 10;
	if(isset($this->session->userdata['timeout']))
	{
		$session_life = time()-$this->session->userdata['timeout'];
		if($session_life>$notActive)
	{
	  	$this->session->sess_destroy();
    	 $this->load->view("loginC");	
     }
     else
     {
      	    $this->showProductHome($username);

     }
                    $sessiondata['timeout'] = time();

	} **/
	      	    
	     $this->showProductHome($username);

	    
	   // redirect(site_url('account/login'));
	   // $this->load->view('productList');
		 $loginVal = TRUE;

	    }
	    else{
	    
	     
	    // $data['loginVal'] = $this->$loginVal;
	      $data["error"]="Invalid User Id and Password combination";
	   //  echo'<html><script> alert("Invalid user credentials!");</script></html>';
	   		$this->load->helper('url');
		    $this->load->view("loginC",$data);
	    // $this->showProductHome();

	    // echo 'return:  false';
	    }
		//$this->load->model('loginC');
	}
	
	
	public function showProductHome($username)
	{
	
		$this->load->helper('url');
		   
	    $this->load->database('test');
		$this->load->model("showproductcatmodel");

		$data['productCatInfo'] = $this->showproductcatmodel->showProductCatNames();
		$data['products'] = $this->showproductcatmodel->showAllProducts();
		$data['specialSales'] = $this->showproductcatmodel->showAllSpecialSales();

		$data['username']=$username;
		

		$this->load->view('home',$data);

		//$this->load->view('productHome', $data);

		//$this->load->view('productListView', $data); **/
	

	}
	
	public function updateCustomer($username)
	{
	    $this->load->helper('url');
		$this->load->database('test');
		$this->load->model("customerdb");

        $data['customerInfo'] = $this->customerdb->getCustomerInfo($username);
        $data["update"]="update";
        $this->load->view("showCustomerAccount",$data);


	}
	
	
	public function updateCustomerInDB($username){
	
		
        $info['fName']=$this->input->post('fName');
        $info['lName']=$this->input->post('lName');
        $info['dob']=$this->input->post('dob');
        $info['sex']=$this->input->post('sex');
        $info['contactNumber']=$this->input->post('contactNumber');
        $info['password']=$this->input->post('password');
        $info['address']=$this->input->post('address');
        $info['address2']=$this->input->post('address2');
        $info['city']=$this->input->post('city');
        $info['state']=$this->input->post('state');
        $info['zipCode']=$this->input->post('zipCode');
        $info['custId']=$this->input->post('custId');
        $info['email']=$this->input->post('emailId');

        
        //$info['']=$this->input->post('');
	
		$this->load->database('test');
		$this->load->model("customerdb");
        $username = $this->customerdb->updateCustomerInfo($username,$info);
        $data["update"]="";
        
        //echo $result;
         echo $username+"  in updatecustinfo";
       
        $this->load->helper('url');
	    $this->showProductHome($username); 
        //$this->load->view("home");

	}
	
	public function addNewCustomerInDB(){
	
	    $info['fName']=$this->input->post('fName');
        $info['lName']=$this->input->post('lName');
        $info['dob']=$this->input->post('dob');
        $info['sex']=$this->input->post('sex');
        $info['contactNumber']=$this->input->post('contactNumber');
        $info['password']=$this->input->post('password');
        $info['address']=$this->input->post('address');
        $info['address2']=$this->input->post('address2');
        $info['city']=$this->input->post('city');
        $info['state']=$this->input->post('state');
        $info['zipCode']=$this->input->post('zipCode');
        $info['custId']=$this->input->post('custId');
        $info['email']=$this->input->post('email');
        $info['newsletter']=$this->input->post('newsletter');


        
        //$info['']=$this->input->post('');
	
		$this->load->database('test');
		$this->load->model("customerdb");
        $this->customerdb->addCustomerInfo($info);
        //header("Location: http://cs-server.usc.edu:2555/CodeIgniter/index.php/test");
        $this->load->helper('url');

        $this->load->view("loginC");

	  //  $this->showProductHome($info['email']);
	
	}
	
	public function doIt(){
	$str="TEST";
	 echo $str;
	 return $str;
	}
	
	public function addNewCustomer(){
		 $this->load->helper('url');
		// $uname=$this->input->post('userName');
		// echo $uname;

		 $this->load->view("showCustomerAccount");
	
	}
	
	public function displayCategory($categoryId,$username){
	//  $categoryId=$this->input->post('categoryId');
	//  $username=$this->input->post('username');
	 
	  
	//  $categoryId = "1";
	//  $username="kotwal@usc.edu";
	  
	//   echo $categoryId."<br>";
	//  echo $username."<br>";
	  
	  $this->load->helper('url');
		   
	  $this->load->database('test');
	  $this->load->model("showproductcatmodel");
    
      $data1['productCatInfo'] = $this->showproductcatmodel->showProductCatNames();
    //  $data1['products'] = $this->showproductcatmodel->showAllProducts();
	//  $data1['specialSales'] = $this->showproductcatmodel->showAllSpecialSales();
	  $data1['productsCat'] = $this->showproductcatmodel->showCategory($categoryId);
	  $data1['specialSalesCat'] = $this->showproductcatmodel->showSpecialSales($categoryId);
	//  $data['specialSalesCat']="abc";
	//  $data['productsCat']="pqr";
	  $data1['username']=$username;
	  $this->load->view('categoryView',$data1);
	  //$this->set_output($var);
	  

	}
	
	public function displayProduct($productId,$username){
	
	  $this->load->helper('url');
		   
	  $this->load->database('test');
	  $this->load->model("showproductmodel");
      
	  $data2['product'] = $this->showproductmodel->showProductInfo($productId);
	  $data2['productSize'] = $this->showproductmodel->showProductSize($productId);
	  $data2['productColor'] = $this->showproductmodel->showProductColor($productId);

    //  $this->load->model("showproductcatmodel");
      $data2['productCatInfo'] = $this->showproductmodel->showProductCatNames();

	  $data2['username']=$username;
	  $this->load->view('productView',$data2);


	}
	
	public function addToCart($productId,$size,$color,$qty,$price,$username){
			   
	  $this->load->database('test');
	  $this->load->model("showproductmodel");
	  $custID = $this->showproductmodel->getCustId($username);
	 // $row = $custID->row(); 
	 // $custTemp = $row->custId;
	  $this->showproductmodel->addToCartDB($productId,$size,$color,$qty,$price,$custID);
	  $this->viewCart($username);

	  }
	  
	  public function viewCart($username){
	   $this->load->database('test');
	   $this->load->model("showproductmodel");
	   $this->load->helper('url');

	   $custID = $this->showproductmodel->getCustId($username);

	   $data3['cartInfo'] = $this->showproductmodel->getCartInfo($custID);
	   $data3['username'] = $username;   
	   $data3['similarProduct'] = $this->showproductmodel->getSimilarProducts($custID);
	   $this->load->view('cartView',$data3);
	   
	  }
	  
	  public function updateCart($productId,$qty,$username)
	  {
	   $this->load->database('test');
	   $this->load->model("showproductmodel");
	   $this->load->helper('url');

	   $custID = $this->showproductmodel->getCustId($username);
	   $this->showproductmodel->updateCartDB($productId,$qty,$custID);
	   
	   $this->viewCart($username);
	    
	  }
	  
	  public function deleteCartItem($productId, $username)
	  {
	   $this->load->database('test');
	   $this->load->model("showproductmodel");
	   $this->load->helper('url');

	   $custID = $this->showproductmodel->getCustId($username);
	   $this->showproductmodel->deleteCartItemDB($productId,$custID);
	   $this->viewCart($username);

	    
	  }
	  
	  
	  public function deleteFullCart($username){
	    $this->load->database('test');
	   $this->load->model("showproductmodel");
	   $this->load->helper('url');

	   $custID = $this->showproductmodel->getCustId($username);
	   $this->showproductmodel->deleteFullCartDB($custID);
	   	   $this->viewCart($username);

	   
	  }
	  
	  public function checkout($total,$username)
	  {
	  	   $this->load->helper('url');

	    $data4['total']=$total;
	    $data4['username'] =$username;
	    $this->load->view('checkoutView',$data4);

	  }

    

	  public function finalCheckOut($bAddress,$sAddress,$total,$username)
	  {
	   
	     $this->load->database('test');
	     $this->load->model("showproductmodel");
	     $custID = $this->showproductmodel->getCustId($username);
  
	     $this->showproductmodel->insertOrder($bAddress,$sAddress,$total,$custID);    
	     $orderId = $this->showproductmodel->getOrderId($custID);
	   
	   	 $this->showproductmodel->insertOrderDetail(0,0,0,$custID); 
        	  	   
         $data5['orderId']=$orderId;
	     $data5['username'] =$username;  	   
         $this->load->helper('url');
		 $this->load->view('orderSumView',$data5);

	   
	     
	 /**    $data5['cart'] = $this->showproductmodel->getShoppingCartInfo($custID);
	     
	     foreach($data5['cart'] as $row){
	     $this->showproductmodel->insertOrderDetail($data5['cart'][1],$data5['cart'][2],$data5['cart'][3],$custID); 
	       
	     }**/
	     
	  }
	  
	  public function viewPrevOrders($username)
	  {
	    $this->load->database('test');
	    $this->load->model("showproductmodel");
	    $this->load->helper('url');

	   $custID = $this->showproductmodel->getCustId($username);

	   $data6['order'] = $this->showproductmodel->getPrevOrderInfo($custID);
	   $data6['username'] = $username;   
	   $this->load->view('viewPrevOrders',$data6);
	  }
	  
	  public function viewPrevOrderDetails($orderId,$username)
	  {
	    $this->load->database('test');
	    $this->load->model("showproductmodel");
	    $this->load->helper('url');
	    $data7['orderDetail']=$this->showproductmodel->getPrevOrderDetail($orderId);
	    $data7['username'] = $username;   

	   $this->load->view('viewPrevOrderDetails',$data7);

	  }
	  
	  
	
}