<?php 
include_once("../database/constants.php");
include_once("DBoperation.php");
include_once("user.php");
include_once("manage.php");
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

//For Brand Insert 

if(isset($_POST["brand_name"])){
	$obj=new DBoperation();
	$result=$obj->addBrand($_POST["brand_name"]);
	echo $result;
	exit();
}

//For Product Insert

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


//Manage Category  

if(isset($_POST["manageCategory"])){
	$m=new Manage();
	$result=$m->manageRecordWithPagination('categories',$_POST["pageno"]);
	$rows=$result["rows"];
	$pagination=$result["pagination"];

	if(count($rows)>0){
		$n= (($_POST["pageno"] - 1)*5)+1;
		foreach ($rows as $row) {
			?>

			<tr>
		      <th ><?php echo $n; ?></th>
		      <td><?php echo $row["category"]; ?></td>
		      <td><?php echo  $row["parent"]?></td>
		      <td><a href="#" class="btn btn-sm btn-success">Active</a></td>
		      <td>
		      	<a href="#" data-toggle="modal" data-target="#update_category" eid="<?php echo $row["cid"];?>"class=" btn btn-sm btn-primary edt_cat">Edit</a>
		      	<a href="#" did="<?php echo $row["cid"];?>"class=" btn btn-sm btn-danger dlt_cat ">Delete</a>
		      </td>
		    </tr>

			<?php
			$n++;
		}
		?>

		<tr><td colspan="5"><?php echo $pagination;?></td></tr>
		<?php
		exit();
	}
}

//For Delete Category

if(isset($_POST["deleteCategory"])){
	$m=new Manage();
	$result=$m->deleteRecord("categories","cid",$_POST["id"]);
	echo $result;
	exit();
}

//Get Single Record For Update Category

if(isset($_POST["updateCategory"])){
	$m=new Manage();
	$result=$m->getSingleRecord("categories","cid",$_POST["id"]);
	echo json_encode($result);
	exit();

}

//Update Record After Getting Single record

if(isset($_POST["update_category_name"])){
	$obj=new Manage();
	$id= $_POST["cid"];
	$name = $_POST["update_category_name"];
	$parent= $_POST["parent_cat"];
	
	$result = $obj->updateRecord("categories",["cid"=>$id],["parent_cat"=>$parent,"category_name"=>$name,"status"=>1]);
	echo $result;
	exit();
}


//-------------------Manage Brand---------------


if(isset($_POST["manageBrand"])){
	$m=new Manage();
	$result=$m->manageRecordWithPagination('brands',$_POST["pageno"]);
	$rows=$result["rows"];
	$pagination=$result["pagination"];

	if(count($rows)>0){
		$n= (($_POST["pageno"] - 1)*5)+1;
		foreach ($rows as $row) {
			?>

			<tr>
		      <th ><?php echo $n; ?></th>
		      <td><?php echo $row["brand_name"]; ?></td>		      
		      <td><a href="#" class="btn btn-sm btn-success">Active</a></td>
		      <td>
		      	<a href="#" data-toggle="modal" data-target="#update_brand" eid="<?php echo $row["bid"];?>"class=" btn btn-sm btn-primary edt_brand">Edit</a>
		      	<a href="#" did="<?php echo $row["bid"];?>"class=" btn btn-sm btn-danger dlt_brand ">Delete</a>
		      </td>
		    </tr>

			<?php
			$n++;
		}
		?>

		<tr><td colspan="5"><?php echo $pagination;?></td></tr>
		<?php
		exit();
	}
}

//Delete Brand

if(isset($_POST["deleteBrand"])){

	$m=new Manage();
	$result=$m->deleteRecord("brands","bid",$_POST["id"]);
	echo $result;
	exit();
}

//Get Single Record For Update brand

if(isset($_POST["updateBrand"])){
	$m=new Manage();
	$result=$m->getSingleRecord("brands","bid",$_POST["id"]);
	echo json_encode($result);
	exit();
}
//Update Brand Record

if(isset($_POST["update_brand_name"])){
	$obj=new Manage();
	$id= $_POST["bid"];
	$name = $_POST["update_brand_name"];
	$result = $obj->updateRecord("brands",["bid"=>$id],["brand_name"=>$name,"status"=>1]);
	echo $result;
	exit();
}	




















?>
