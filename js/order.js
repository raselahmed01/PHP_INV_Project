$(document).ready(function(){
	var DOMAIN="http://localhost:8000/inv_php_project/public_html";

	addNewItem();
	$("#add").click(function(){
		addNewItem();
	})

	function addNewItem(){
		$.ajax({
			url:DOMAIN+"/includes/process.php",
			method:"POST",
			data:{getNewOrderItem:1},
			success:function(data){
				$("#invoice_item").append(data);
			}
		})
	}

	$("#remove").click(function(){
		$("#invoice_item").children("tr:last").remove();
	})




}); //End Js
