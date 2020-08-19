$(document).ready(function(){
	var DOMAIN="http://localhost:8000/inv_php_project/public_html";

//ManageCategory
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

	$("body").delegate(".dlt_cat","click",function(){
		var did = $(this).attr("did");
		if(confirm("Are you sure ? You want to delete")){
			$.ajax({
				url : DOMAIN+"/includes/process.php",
				method:"POST",
				data:{dleteCategory:1,id:did},
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







})//end js