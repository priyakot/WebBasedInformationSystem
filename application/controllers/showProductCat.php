<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ShowProductCat extends CI_Controller {


	public function showProductHome()
	{
	    
	    $this->load->database('test');
		$this->load->model("showProductCatModel");

		$data['productCatInfo'] = $this->showProductCatModel->showProductCatNames();
		$data['products'] = $this->showProductCatModel->showAllProducts();
		$data['specialSales'] = $this->showProductCatModel->showAllSpecialSales();


		$this->load->view('productListView', $data);
	

	}
	
	
}