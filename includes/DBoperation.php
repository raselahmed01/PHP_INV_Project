<?php

/**
 * 
 */
class DBoperation
{
	private $con;
	function __construct()
	{
		include_once("../database/db.php");
		$db=new Database();
		$this->con=$db->connect();
	}

	public function addCategory($parent_cat,$category_name){

		$pre_stmt=$this->con->prepare("INSERT INTO `categories`(`parent_cat`, `category_name`, `status`) VALUES (?,?,?)");
		$status=1;
		$pre_stmt->bind_param("isi",$parent_cat,$category_name,$status);
		$result=$pre_stmt->execute()or die($this->con->error);

		if($result){
			return "Category_Added";
		}

		else{
			return 0;
		}

	}

	public function getData($table){
		$pre_stmt= $this->con->prepare("SELECT * FROM ".$table);
		$pre_stmt->execute() or die($this->con->error);
		$result=$pre_stmt->get_result();
		$rows=array();
		if($result->num_rows>0){
			while($row=$result->fetch_assoc()){
				$rows[]=$row;
			}
			return $rows;
		}
		return "NO_Data";
	}

	public function addBrand($brand_name){
		$pre_stmt=$this->con->prepare("INSERT INTO `brands`( `brand_name`, `status`) VALUES (?,?)");
		$status=1;
		$pre_stmt->bind_param("si",$brand_name,$status);
		$result=$pre_stmt->execute()or die($this->con->error);
		if($result){
			return "Brand_Added";
		}
		else{
			return 0;
		}
	}

	public function addProduct($cid,$bid,$pro_name,$pro_price,$pro_stock,$pro_add_date){
		$pre_stmt=$this->con->prepare("INSERT INTO `products`( `cid`, `bid`, `product_name`, `product_price`, `product_stock`, `p_added_date`, `p_status`) 
			VALUES (?,?,?,?,?,?,?)");
		$status=1;
		$pre_stmt->bind_param("iisdisi",$cid,$bid,$pro_name,$pro_price,$pro_stock,$pro_add_date,$status);
		$result=$pre_stmt->execute()or die($this->con->error);
		if($result){
			return "New_Product_Added";
		}
		else{
			return 0;
		}
	}



}

// $obj=new DBoperation();

// echo $obj->addCategory(2,"Antivirus");
// echo "<pre>";
// print_r($obj->addBrand("Samsung")) ;


?>