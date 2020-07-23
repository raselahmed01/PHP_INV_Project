<?php 
include_once("../database/constants.php");
include_once("DBoperation.php");
include_once("user.php");
//For Registration Part processing
if(isset($_POST["username"])AND isset($_POST["email"])){

	$user=new User();
	$result= $user->createUserAcc($_POST["username"],$_POST["email"],$_POST["password1"],$_POST["usertype"]);
	echo $result;
	exit();
};

//For login part processing

if(isset($_POST["log_email"]) AND isset($_POST["log_pass"])){
	$user=new User();
	$result=$user->userLogin($_POST["log_email"],$_POST["log_pass"]);
	echo $result;
	exit();
};

//For fetch Category

if(isset($_POST["getCategory"])){
	$category=new DBoperation();
	$rows=$category->getData("categories");
	foreach ($rows as $row) {
		echo "<option value='".$row["cid"]."'>".$row["category_name"]."</option>";
	};
	exit();
};

//For Fetch Brand  
if (isset($_POST["getBrand"])){
	$brand=new DBoperation();
	$rows=$brand->getData("brands");

	foreach ($rows as $row) {
		echo "<option value='".$row["bid"]."'>".$row["brand_name"]."</option>";
	};
	exit();

}

//For Insert Category

if(isset($_POST["parent_cat"]) AND isset($_POST["category_name"])){
	$obj=new DBoperation();
	$result=$obj->addCategory($_POST["parent_cat"],$_POST["category_name"]);
	echo $result;
	exit();
};

//For Brand Entry 

if(isset($_POST["brand_name"])){
	$obj=new DBoperation();
	$result=$obj->addBrand($_POST["brand_name"]);
	echo $result;
	exit();
}

if(isset($_POST["added_date"])AND isset($_POST["product_name"])){
	$obj=new DBoperation();
	$result=$obj->addProduct($_POST["select_cat"],
							$_POST["select_brand"],
							$_POST["product_name"],
							$_POST["product_price"],
							$_POST["product_qty"],
							$_POST["added_date"]);
	echo $result;
	exit();
}


?>
