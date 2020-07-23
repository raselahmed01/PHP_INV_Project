$(document).ready(function(){
	var DOMAIN="http://localhost:8000/inv_php_project/public_html";
	//for user registration part
	$("#register_form").on("submit",function(){		
		var status=false;
		var name=$("#username");
		var email=$("#email");;
		var pass1=$("#password1");
		var pass2=$("#password2");
		var type =$("#usertype");

		var e_patt=new RegExp(/^[a-z0-9_-]+(\.[a-z0-9_-]+)*@[a-z0-9_-]+(\.[a-z0-9_-]+)*(\.[a-z]{2,4})$/);

		if(name.val()==""||name.val().length<5){
			name.addClass("border-danger");
			$("#u_error").html("<span class='text-danger'>Please enter your full name and length should be at least 5 character</span>");
			status =false;
		}
		else {
			name.removeClass("border-danger");
			$("#u_error").html("");
			status =true;
		}
		if(!e_patt.test(email.val())){
			email.addClass("border-danger");
			$("#e_error").html("<span class='text-danger'>Please enter a valid email address</span>");
			status =false;
		}
		else{
			email.removeClass("border-danger");
			$("#e_error").html("");
			status =true;
		}
		if(pass1.val()==""||pass1.val().length<6){
			pass1.addClass("border-danger");
			$("#p1_error").html("<span class='text-danger'>Please enter a password more than six digit</span>");
			status =false;
		}
		else{
			pass1.removeClass("border-danger");
			$("#p1_error").html("");
			status =true;
		}
		if(pass2.val()==""||pass2.val().length<6){
			pass2.addClass("border-danger");
			$("#p2_error").html("<span class='text-danger'>Please enter a password more than six digit</span>");
			status =false;
		}
		else{
			pass2.removeClass("border-danger");
			$("#p2_error").html("");
			status =true;
		}
		if(type.val()==""){
			type.addClass("border-danger");
			$("#t_error").html("<span class='text-danger'>Please choose a user type</span>");
			status =false;
		}
		else{
			type.removeClass("border-danger");
			$("#t_error").html("");
			status =true;
		}
		if((pass1.val()==pass2.val()) && status==true ){
			$(".overlay").show();
			$.ajax({
				url:DOMAIN+"/includes/process.php",
				method:"POST",
				data:$("#register_form").serialize(),
				success:function(data){
					if(data=="EMAIL_ALREADY_EXISTS"){
						alert("It seems your email already exist");
						$(".overlay").hide();
					}
					else if(data=="Something_wrong"){
						alert("Something are wronng");
						$(".overlay").hide();
					}
					else{
						window.location.href=encodeURI(DOMAIN+"/index.php?msg=You are registered now you can log in");
						$(".overlay").hide();
					}
					

				}
				
			});

		}
		else{
			type.addClass("border-danger");
			$("#p2_error").html("<span class='text-danger'>Password is not match</span>");
			status =false;
		}


	});

//for user log in part

	$("#login_form").on("submit",function(){

		var status =false;
		var email=$("#log_email");
		var password=$("#log_pass");
		if(email.val()==""){
			email.addClass("border-danger");
			$("#e_log_error").html("<span class='text-danger'>Please Enter Email</span>");
			status=false;			

		}
		else{
			email.removeClass("border-danger");
			$("#e_log_error").html("");
			status=true;
		}
		if(password.val()==""){
			password.addClass("border-danger");
			$("#p_log_error").html("<span class='text-danger'>Please Enter Password</span>");
			status=false;			

		}
		else{
			password.removeClass("border-danger");
			$("#p_log_error").html("");
			status=true;
		}

		if(status){
			$(".overlay").show();
			$.ajax({				
				url:DOMAIN+"/includes/process.php",
				method:"POST",
				data:$("#login_form").serialize(),
				success:function(data){
					if(data=="Not_Registered"){
						email.addClass("border-danger");
						$("#e_log_error").html("<span class='text-danger'>It Seems You Are not registered</span>");
						$(".overlay").hide();
					}
					else if(data=="Password_not_match"){
						password.addClass("border-danger");
						$("#p_log_error").html("<span class='text-danger'>Please Enter Correct  Password</span>");
						// console.log(data);
						$(".overlay").hide();
					}
					else{
						window.location.href=encodeURI(DOMAIN+"/dashboard.php");
						$(".overlay").hide();
						// console.log(data);
						// alert("data");
					}
					

				}
				
			});
		}



	})
	//For Fetch Category
	fetch_category();
	function fetch_category(){
		$.ajax({
			url:DOMAIN+"/includes/process.php",
			method:"POST",
			data:{getCategory:1},
			success:function(data){
				var root="<option value='0'>Root</option>";
				var choose="<option value=''>Choose Category</option>";
				$("#parent_cat").html(root+data);
				$("#select_cat").html(choose+data);
			}

		})
	}

	//For Fetch Brand

	fetch_brand();
	function fetch_brand(){
		$.ajax({
			url:DOMAIN+"/includes/process.php",
			method:"POST",
			data:{getBrand:1},
			success:function(data){
				
				var choose="<option value=''>Choose Brand</option>";				
				$("#select_brand").html(choose+data);
			}

		})
	}

	//For Category Insert 

	$("#category_form").on("submit",function(){

		if($("#category_name").val()==""){
			$("#category_name").addClass("border-danger");
			$("#cat_error").html("<spanclass='text-danger'>Please enter a category name</span>");
			
		}
		else{
			$.ajax({
				url:DOMAIN+"/includes/process.php",
				method:"POST",
				data:$("#category_form").serialize(),				
				success:function(data){
					if(data=="Category_Added"){
						$("#category_name").removeClass("border-danger");
						$("#cat_error").html("<span class='text-success'>Category Added Successfully</span>");
						$("#category_name").val("");
						
					}					
					else{
						alert(data);
					}					

				}
				
			});
		
		}		


	});

	//For Brand Insertion

	$("#brand_form").on("submit",function(){
		if($("#brand_name").val()==""){
			$("#brand_name").addClass("border-danger");
			$("#brand_error").html("<span class='text-danger'>Please Enter A Brand Name</span>");
		}
		else{
			$.ajax({
				url:DOMAIN+"/includes/process.php",
				method:"POST",
				data:$("#brand_form").serialize(),
				success:function(data){
					if(data=="Brand_Added"){
						$("#brand_name").removeClass("border-danger");
						$("#brand_error").html("<span class='text-success'>Brand Added Successfully</span>");
						$("#brand_name").val("");
					}
					else{
						alert(data);
					}
				}
			})
		}
	});

	//For Product Insert

	$("#product_form").on("submit",function(){
		$.ajax({
			url:DOMAIN+"/includes/process.php",
			method:"POST",
			data:$("#product_form").serialize(),
			success:function(data){
				if(data="New_Product_Added"){
					alert(data);
				}
				else{
					console.log(data);
				}
			}


		})
	})





//end jquery 
})