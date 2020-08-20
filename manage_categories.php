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
	<br/><br/>
	<div class="container">
		<table class="table table-hover table-bordered">
  <thead>
    <tr>
      <th >#</th>
      <th >Category</th>
      <th >Parent</th>
      <th >Status</th>
      <th >Action</th>
    </tr>
  </thead>
  <tbody id="get_category">
    <!-- <tr>
      <th >1</th>
      <td>Electronics</td>
      <td>Root</td>
      <td><a href="#" class="btn btn-sm btn-success">Active</a></td>
      <td>
      	<a href="#" class="btn btn-sm btn-primary">Edit</a>
      	<a href="#" class="btn btn-sm btn-danger">Delete</a>
      </td>
    </tr> -->
    
  </tbody>
</table>
	</div>

	<?php include_once("./templates/update_category.php"); ?>



	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script type="text/javascript" src="./js/manage.js"></script>
</body>
</html>
