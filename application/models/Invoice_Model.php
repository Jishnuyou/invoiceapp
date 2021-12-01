<?php
class Invoice_Model extends CI_Model 
{
    function __construct() {
        parent::__construct();
    }
	function saverecords($data)
	{
      return  $this->db->insert('product', $data);
	// $query="INSERT INTO `product` (`id`, `name`,`Quantity`, `Unit_Price`, `Tax`) VALUES (NULL, '$name', '$Quantity', '$price','$tax')";
	// $this->db->query($query);
	}
	public function fetchrecords()  
      {  
         //data is retrive from this query  
         $query = $this->db->get('product');  
         return $query;  
      }  
	  public function deleterecords($id)  
      {  
         //data is retrive from this query 
		 return $this->db->delete('product', array('id' => $id)); 
		 
      }  
	  
}
