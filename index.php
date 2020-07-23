<?php 
include_once ("./database/constants.php");
if(isset($_SESSION["userid"])){
	header("location:".DOMAIN."/dashboard.php");
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
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    

</head>
<body>
	<div class="overlay"><div class="loader"></div></div>
	<!------ Navbar ------>
	<?php include_once("./templates/header.php");?>
	<br/>
	<div class="container ">
		<?php if(isset($_GET["msg"])AND !empty($_GET["msg"])){ ?>

			<div class="alert alert-success alert-dismissible fade show" role="alert">
			  <?php echo $_GET["msg"];?>
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>


		<?php }?>

		<div class="card mx-auto"  style="width: 18rem;">
		<img src="./images/login.png" class="card-img-top mx-auto" style="width:50%" alt="log in icon">
	  	<div class="card-body">
	    <form id="login_form" onsubmit="return false" autocomplete="off">
		  <div class="form-group">
		    <label for="Email">Email address</label>
		    <input type="email" class="form-control" id="log_email" name="log_email">
		    <small id="e_log_error" class="form-text text-muted">We'll never share your email with anyone else.</small>
		  </div>
		  <div class="form-group">
		    <label for="Password">Password</label>
		    <input type="password" class="form-control" id="log_pass" name="log_pass">
		    <small id="p_log_error" class="form-text text-muted"></small>
		  </div>
		  <button type="submit" class="btn btn-primary"><i class="fa fa-lock">&nbsp;</i>Login</button>
		  <span><a href="register.php">Register</a></span>
		</form>
	    
	    
		</div>
	  	<div class="card-footer"><a href="#" >forget password ?</a></div>
	</div>
	</div>

	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script type="text/javascript" src="./js/custom.js"></script>

</body>
</html>
