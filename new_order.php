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
	<div class="overlay"><div class="loader"></div></div>
	<!------ Navbar ------>
	<?php include_once("./templates/header.php");?>
	<br/>

	<div class="container">
		<div class="row">
			<div class="col-md-10 mx-auto">
				<div class="card" style="box-shadow: 0 0 25px 0 lightgrey">
				  <div class="card-header">
				    <h3>New Order's</h3>
				  </div>
				  <div class="card-body">
				    <form onsubmit="return false">
				    	<div class="form-group row">
				    		<label for="order_date"class="col-sm-3 col-form-label" align="right">Order Date</label>
				    		<div class="col-sm-6">
				    			<input type="text" name="order_date" id="order_date" readonly  class="form-control form-control-sm" value="<?php echo date("Y -m -d"); ?>">
				    		</div>
				    	</div>
				    	<div class="form-group row">
				    		<label for="Customer_name"class="col-sm-3 col-form-label" align="right">Customer Name <b style="color:red;">*</b></label>
				    		<div class="col-sm-6">
				    			<input type="text" name="customer_name" id="customer_name"  class="form-control form-control-sm" placeholder="Enter Customer Name" required>
				    		</div>
				    	</div>
				    	<div class="form-group row">
				    		<label for="customer_address"class="col-sm-3 col-form-label" align="right">Customer Adress <b style="color:red;">*</b></label>
				    		<div class="col-sm-6">
				    			<textarea type="text" name="customer_address" id="customer_address"  class="form-control form-control-sm" rows="3" required></textarea>
				    		</div>
				    	</div>

				    	<div class="card" style="box-shadow: 0 0 15px 0 lightgrey">
				    		<div class="card-body">
				    			<h4>Make a Order List</h4>
				    			<table align="center" style="width:800px">
				    				<thead>
				    					<tr>
				    						<th>#</th>
				    						<th style="text-align: center;">Item Name</th>
				    						<th style="text-align: center;">Total Quantity</th>
				    						<th style="text-align: center;">Quantity</th>
				    						<th style="text-align: center;">Price</th>
				    						<th >Total</th>
				    					</tr>
				    				</thead>
				    				<tbody id="invoice_item">
				    					<!-- <tr>
				    						<td><b id="number">1</b></td>
				    						<td>
				    							<select name="pid[]" class="form-control form-control-sm">
				    								<option>Dell Inspiron 3421</option>	
				    							</select>
				    						</td>
				    						<td>
				    							<input type="text" name="tqty[]" class="form-control form-control-sm" readonly>
				    						</td>
				    						<td>
				    							<input type="text" name="qty[]" class="form-control form-control-sm" required>
				    						</td>
				    						<td>
				    							<input type="text" name="price[]" class="form-control form-control-sm" readonly>
				    						</td>
				    						<td>Tk.12000</td>
				    					</tr> -->
				    				</tbody>
				    			</table><!--Table End-->
				    			<center style="padding: 15px;">
				    				<button id="add" style="width: 100px" class="btn btn-success">Add</button>
				    				<button id="remove" style="width: 100px" class="btn btn-danger">Remove</button>
				    			</center>
				    		</div><!--Order Card Body End-->
				    	</div><!--Order Card End-->
							<p></p><p></p>

							<div class="form-group row">
					    		<label for="sub_total" class="col-sm-3 col-form-label" align="right">Sub Total</label>
					    		<div class="col-sm-6">
					    			<input type="text" name="sub_total" id="sub_total"  class="form-control form-control-sm" required readonly />
					    		</div>
				    		</div>
				    		<div class="form-group row">
					    		<label for="Vat" class="col-sm-3 col-form-label" align="right">Vat (15%)</label>
					    		<div class="col-sm-6">
					    			<input type="text" name="vat" id="vat"  class="form-control form-control-sm" required/>
					    		</div>
				    		</div>
				    		<div class="form-group row">
					    		<label for="Discount" class="col-sm-3 col-form-label" align="right">Discount</label>
					    		<div class="col-sm-6">
					    			<input type="text" name="discount" id="discount"  class="form-control form-control-sm" required/>
					    		</div>
				    		</div>
				    		<div class="form-group row">
					    		<label for="Net Total" class="col-sm-3 col-form-label" align="right">Net Total</label>
					    		<div class="col-sm-6">
					    			<input type="text" name="net_total" id="net_total"  class="form-control form-control-sm" required/>
					    		</div>
				    		</div>
				    		<div class="form-group row">
					    		<label for="Paid" class="col-sm-3 col-form-label" align="right">Paid</label>
					    		<div class="col-sm-6">
					    			<input type="text" name="paid" id="paid"  class="form-control form-control-sm" required/>
					    		</div>
				    		</div>
				    		<div class="form-group row">
					    		<label for="Due" class="col-sm-3 col-form-label" align="right">Due</label>
					    		<div class="col-sm-6">
					    			<input type="text" name="due" id="due"  class="form-control form-control-sm" required/>
					    		</div>
				    		</div>
				    		<div class="form-group row">
					    		<label for="paymenttype" class="col-sm-3 col-form-label" align="right">Payment Method</label>
					    		<div class="col-sm-6">
					    			<select name="payment_type" id="payment_type" class="form-control form-control-sm" required/>
					    				<option>Select</option>
					    				<option>Cash</option>
					    				<option>Cheque</option>
					    				<option>Card</option>
					    				<option>Draft</option>
					    			</select>
					    		</div>
				    		</div>
				    		<center>
				    			<input type="submit" id="order_form" style="width:100px" class="btn btn-info" value="Order">
				    			<input type="submit" id="print_invoice" style="width:100px" class="btn btn-success d-none" value="Print">
				    		</center>


				    </form>
				  </div>
				</div>
				
			</div>
		</div>
	</div>










	
	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script type="text/javascript" src="./js/order.js"></script>
</body>
</html>
