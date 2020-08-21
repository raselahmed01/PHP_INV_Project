<?php 
include_once("./database/constants.php");
if(!isset(($_SESSION["userid"]))){
	header("location:".DOMAIN."/");
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">	
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Inventory Management</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
	<!------ Navbar ------>
	<?php include_once("./templates/header.php");?>
	<br/>
	<div class="container ">
		<div class="row">
			<div class="col-md-4">
				<div class="card mx-auto" >
				  <img src="./images/user.png" class="card-img-top mx-auto" style="width:40%;" alt="...">
				  <div class="card-body">
				    <h5 class="card-title">Profile Info</h5>
				    <p class="card-text"><i class="fa fa-user">&nbsp;</i>Rasel Ahmed</p>
				    <p class="card-text"><i class="fa fa-user">&nbsp;</i>Admin</p>
				    <p class="card-text"><i class="fa fa-calendar" >&nbsp;</i>Last Login xxxx-xx-xx</p>
				    <a href="#" class="btn btn-primary"><i class="fa fa-edit">&nbsp;</i>Edit Profile</a>
				  </div>
				</div>
			</div>
			<div class="col-md-8 " >
				<div class="jumbotron" style="height: 100%;width:100%;">
					<h1>Welcome Admin</h1>
					<div class="row">						
						<div class="col-sm-6">
							<iframe src="http://free.timeanddate.com/clock/i7bx0yhu/n73/szw160/szh160/hoc009/hbw0/hfc9ff/cf100/hnc0f9/hwc000/fan2/fas16/fac555/fdi60/mqcf0f/mqs4/mql2/mqw4/mqd78/mhcf90/mhs4/mhl3/mhw4/mhd78/mmv0/hhc990/hhs2/hmc990/hms2/hscf09" frameborder="0" width="160" height="160"></iframe>
						</div>
						<div class="col-sm-6">
							<div class="card">
						      <div class="card-body">
						        <h5 class="card-title">New Order</h5>
						        <p class="card-text">Here you can create invoice and make new orders.</p>
						        <a href="#" class="btn btn-primary">New Order</a>
						      </div>
						    </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<p></p>	<p></p>
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="card">
			      <div class="card-body">
			        <h5 class="card-title">Categories</h5>
			        <p class="card-text">Here you can manage your categories and add new parent & sub category </p>
			        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#category"><i class="fa fa-plus">&nbsp;</i>Add</a>
			        <a href="manage_categories.php" class="btn btn-primary"><i class="fa fa-edit">&nbsp;</i>Manage</a>
			      </div>
			    </div>
			</div>
			<div class="col-md-4">
				<div class="card">
			      <div class="card-body">
			        <h5 class="card-title">Brands</h5>
			        <p class="card-text">Here you can add new brand and you can manage them</p>
			        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#brand"><i class="fa fa-plus">&nbsp;</i>Add</a>
			        <a href="manage_brand.php" class="btn btn-primary"><i class="fa fa-edit">&nbsp;</i>Manage</a>
			      </div>
			    </div>
			</div>
			<div class="col-md-4">
				<div class="card">
			      <div class="card-body">
			        <h5 class="card-title">Products</h5>
			        <p class="card-text">Here you can add new product and you can manage them</p>
			        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#product"><i class="fa fa-plus">&nbsp;</i>Add</a>
			        <a href="#" class="btn btn-primary"><i class="fa fa-edit">&nbsp;</i>Manage</a>
			      </div>
			    </div>
			</div>
		</div>
	</div>

<?php 
	// Category Form
	include_once("./templates/category.php");
?>
<?php 
	// Brand Form
	include_once("./templates/brand.php");
?>
<?php 
	// Products Form
	include_once("./templates/product.php");
?>

	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script type="text/javascript" src="./js/custom.js"></script>
</body>
</html>
