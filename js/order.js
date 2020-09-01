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
				var n=0;
				$(".number").each(function(){
					$(this).html(++n);
					calculate(0,0);
				})
			}


		})
	}

	$("#remove").click(function(){
		$("#invoice_item").children("tr:last").remove();
		calculate(0,0);
	})

	$("#invoice_item").delegate(".pid","change",function(){
		var pid=$(this).val();
		var tr=$(this).parent().parent();
		$(".overlay").show();
		$.ajax({
			url:DOMAIN+"/includes/process.php",
			method:"POST",
			dataType:"json",
			data:{getPriceAndQty:1,id:pid},
			success:function(data){
				tr.find(".tqty").val(data["product_stock"]);
				tr.find(".pro_name").val(data["product_name"]);
				tr.find(".qty").val(1);
				tr.find(".price").val(data["product_price"]);
				tr.find(".amnt").html( tr.find(".qty").val() * tr.find(".price").val() );
				calculate(0,0);
			}
		})
	})

	$("#invoice_item").delegate(".qty","keyup",function(){
		var qty =$(this);
		var tr =$(this).parent().parent();
		if(isNaN(qty.val())){
			alert("Pleas enter a valid quantity !");
			qty.val(1);
		}
		else if( (qty.val() - 0) > (tr.find(".tqty").val() - 0) ){
			alert("Sorry ! This much of item is not available");
			qty.val(1);
		}
		else{
			tr.find(".amnt").html(qty.val() * tr.find(".price").val());	
			calculate(0,0);
		}
	})

	function calculate(dis,paid){
		var sub_total =0;
		var vat =0;
		var discount = dis;
		var net_total =0;
		var paid_amnt =paid;
		var due =0;
		$(".amnt").each(function(){
			sub_total = sub_total + ($(this).html() * 1 );
		})
		vat =0.15 * sub_total ;
		net_total = sub_total + vat ;
		net_total = net_total - discount ;
		due = net_total - paid_amnt ;

		$("#sub_total").val(sub_total);
		$("#vat").val(vat);

		$("#discount").val(discount);
		$("#net_total").val(net_total);
		// $("#paid")
		$("#due").val(due);
	}

	$("#discount").keyup(function(){
		var discount =$(this).val();
		calculate(discount,0);
	})
	$("#paid").keyup(function(){
		var paid =$(this).val();
		var discount =$("#discount").val();
		calculate(discount,paid)
	})




}); //End Js
