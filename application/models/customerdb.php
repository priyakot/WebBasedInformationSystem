<?php
class Customerdb extends CI_Model {


    function login($username,$password){
      
    $query = $this->db->query("select * from customer where email = ? and password = ?",array($username,$password));
   // $query = $this->db->query("select * from customer where email = '$username' and password = '$password'");

		if ($query->num_rows() > 0)
		{
    		//echo $username;
		    //echo $password;
		    
		    return TRUE;
		   }
		else
		{
		// echo 'NO RECORD';
		  return FALSE;
		}
    }
    
    function getCustomerInfo($username){
    
		$query1 = $this->db->query("Select *FROM customer WHERE email =?",array($username));

		//$query1 = $this->db->query("Select *FROM customer WHERE email ='". $username."';");
		echo $query1;
        return $query1->result();
        

    }
    
    function updateCustomerInfo($username,$info){
     // $sql1 = "UPDATE customer SET fName='". $info['fName'] ."',lName='". $info['lName'] ."',dob='". $info['dob'] ."',sex='". $info['sex'] ."',contactNumber=". $info['contactNumber'] .",password='". $info['password'] ."',address='". $info['address'] ."',address2='". $info['address2'] ."',city='". $info['city'] ."',state='". $info['state'] ."',zipCode='". $info['zipCode'] ."' WHERE custId=".$info['custId'].";";
     
     // $this->db->query('SELECT foo FROM bar WHERE bof=? AND zot=?', array($bof, $zot)); 

		
		$query2 = $this->db->query("UPDATE customer SET fName='". $info['fName'] ."',lName='". $info['lName'] ."',dob='". $info['dob'] ."',sex='". $info['sex'] ."',contactNumber=". $info['contactNumber'] .",password='". $info['password'] ."',address='". $info['address'] ."',address2='". $info['address2'] ."',city='". $info['city'] ."',state='". $info['state'] ."',zipCode='". $info['zipCode'] ."' WHERE custId=?",array($info['custId']));
   		//$query2 = $this->db->query("UPDATE customer SET fName='". $info['fName'] ."',lName='". $info['lName'] ."',dob='". $info['dob'] ."',sex='". $info['sex'] ."',contactNumber=". $info['contactNumber'] .",password='". $info['password'] ."',address='". $info['address'] ."',address2='". $info['address2'] ."',city='". $info['city'] ."',state='". $info['state'] ."',zipCode='". $info['zipCode'] ."' WHERE custId=".$info['custId']."");

        echo $info['email']." indb";
        return $info['email'];

    }
    
    function addCustomerInfo($info){
//    ".$this->db->escape($bof)."
   $query3 = $this->db->query("INSERT into customer VALUES(NULL,".$this->db->escape($info['fName']) .",".$this->db->escape($info['lName']) .",".$this->db->escape($info['email']) .",".$this->db->escape($info['password']) .",".$this->db->escape($info['dob']) .",".$this->db->escape($info['sex']) .",".$info['contactNumber'] .",".$this->db->escape($info['address']) .",". $this->db->escape($info['address2']) .",". $this->db->escape($info['city']) .",". $this->db->escape($info['state']) .",". $info['zipCode'] .",". $this->db->escape($info['newsletter']).")");

//$sqlin = "INSERT into customer VALUES(NULL,".$this->db->escape($info['fName']) .",".$this->db->escape($info['lName']) .",".$this->db->escape($info['email']) .",".$this->db->escape($info['password']) .",".$this->db->escape($info['dob']) .",".$this->db->escape($info['sex']) .",".$info['contactNumber'] .",".$this->db->escape($info['address']) .",". $this->db->escape($info['address2']) .",". $this->db->escape($info['city']) .",". $this->db->escape($info['state']) .",". $info['zipCode'] .",". $this->db->escape($info['newsletter']).")";
	
//	$query3 = $this->db->query("INSERT into customer VALUES(NULL,'".$info['fName'] ."','".$info['lName'] ."','".$info['email'] ."','".$info['password'] ."','".$info['dob'] ."','".$info['sex'] ."',".$info['contactNumber'] .",'".$info['address'] ."','". $info['address2'] ."','". $info['city'] ."','". $info['state'] ."',". $info['zipCode'] .",'". $info['newsletter']."')");
 //   echo $sqlin;

            //return $query3->result();
    }
    

}
?>