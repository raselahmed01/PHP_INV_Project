$(document).ready(function(){
	var DOMAIN="http://localhost:8000/inv_php_project/public_html";

//---------------ManageCategory------------//
	

	//Fetch Category with pagination
	manageCategory(1);
	function manageCategory(pn){
		$.ajax({
			url : DOMAIN+"/includes/process.php",
			method:"POST",
			data:{manageCategory:1,pageno:pn},
			success:function(data){
					$("#get_category").html(data);
			}
		})
	}

	$("body").delegate(".page-link","click",function(){
		var pn =$(this).attr("pn");
		manageCategory(pn);
	})

	//Delete Category

	$("body").delegate(".dlt_cat","click",function(){
		var did = $(this).attr("did");
		if(confirm("Are you sure ? You want to delete")){
			$.ajax({
				url : DOMAIN+"/includes/process.php",
				method:"POST",
				data:{deleteCategory:1,id:did},
				success:function(data){
						if(data=="DEPENDENT_CATEGORY"){
							alert("Ypu can not delete this ... its a dependent category");
						}
						else if(data=="CATEGORY_DELETED"){
							alert("Category Deleted Succefully ");
							manageCategory(1);
						}
						else if(data=="DELETED"){
							alert("Deleted succefully");
						}
						else{
							alert(data);
						}
					}
				})	
			}
			else{
				alert("No");
			}
		})

	//Fetch Category
	fetch_category();
	function fetch_category(){
		$.ajax({
			url:DOMAIN+"/includes/process.php",
			method:"POST",
			data:{getCategory:1},
			success:function(data){
				var root="<option value='0'>Root</option>";				
				$("#parent_cat").html(root+data);
				
			}

		})
	}

	//Update Category

	$("body").delegate(".edt_cat","click",function(){
		var eid =$(this).attr("eid");
		$.ajax({
			url:DOMAIN+"/includes/process.php",
			method:"POST",
			dataType:"json",
			data:{updateCategory:1,id:eid},
			success:function(data){				
				// alert(data);				
				// console.log(data);				
				$("#cid").val(data["cid"]);
				$("#update_category_name").val(data["category_name"]);
				$("#parent_cat").val(data["parent_cat"]);
			}
		})
	})

	$("#update_category_form").on("submit",function(){

		if($("#update_category_name").val()==""){
			$("#update_category_name").addClass("border-danger");
			$("#cat_error").html("<spanclass='text-danger'>Please enter a category name</span>");
			
		}
		else{
			$.ajax({
				url:DOMAIN+"/includes/process.php",
				method:"POST",
				data:$("#update_category_form").serialize(),				
				success:function(data){
					// console.log (data);
					// alert(data);
					window.location.href="";
					// if(data=="UPDATED"){
					// // 	$("#update_category_name").removeClass("border-danger");
					// // 	$("#cat_error").html("<span class='text-success'>Category Updated Successfully</span>");
					// // 	$("#update_category_name").val("");
					// 	// fetch_category();

						
					// }					
					// else{
					// 	alert(data);
					// }					

				}
				
			});
		
		}
	})






})//end js