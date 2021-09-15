<!DOCTYPE html>
<html>
<head>
	<title>Online Exam App|Portal-SignUp</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<style type="text/css">
		.signup_container{

			width: 60%;
			height: 640px;
			border:1px solid;
			border-radius: 35px;
			margin-left: 20%;
			padding: 21px;
			margin-top: 40px;
		}
		.logo
		{
			align-items: center;
			margin-left: 45%;
		}
		.footer
		{
			text-align: center;
			padding-top: 30px;
			line-height: 10px;
		}
	</style>
	</head>
<body>
	<div class="container">
		<div class="signup_container">	
			<div class="logo">
				<img src="../uploads/images/logo.png" alt="logo" height="50px" width="70px">
			</div>
			<div class="signup_title">
				<span><font style="font-size: 1.2em; font-weight: bold;">Portal SignUp</font></span>
				<span style="float: right;"><a href="{{ url('/') }}" style="text-decoration: none; color: black;"><i class="fa fa-home fa-2x" aria-hidden="true"></i></a></span>
				<hr>
			</div>
		<form action="{{ url('portal/signup_sub') }}"  class="database_operation">
			<div class="signup_form">
				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
							<label>Enter Name</label>
							{{ csrf_field() }}
							<input type="text" name="name" placeholder="Enter Name" class="form-control" required="required">
						</div>
					</div>
					<div class="col-sm-12">
						<div class="form-group">
							<label>Enter Email</label>
							<input type="email" name="email" placeholder="Enter Email" class="form-control" required="required">
						</div>
					</div>
					<div class="col-sm-12">
						<div class="form-group">
							<label>Enter Mobile No</label>
							<input type="phone" name="mobile_no" placeholder="Enter Mobile No" class="form-control" required="required">
						</div>
					</div>
					<div class="col-sm-12">
						<div class="form-group">
							<label>Enter Password</label>
							<input type="password" name="password" placeholder="Enter Password" class="form-control" required="required">
						</div>
					</div>	
					<div class="col-sm-12">
						<div class="form-group">
							<button class="btn btn-info btn-block">Sign Up</button>
						</div>
					</div>
					<div class="col-sm-12">
						<div class="form-group text-center">
							OR
						</div>
					</div>
					<div class="col-sm-12">
						<h5 class="text-center">Have An Account? <a href="{{ url('portal/login') }}" class="btn btn-primary btn-block">Login</a></h5>
					</div>						
				</div>
			</div>
		</form>
		</div>
		<div class="footer">
                Copyright@Blue Krystal Technologies-2021
        </div>
	</div>
</body>
<script type="text/javascript">
	$(document).on('submit','.database_operation',function(){

	//alert('testing');
	var url = $(this).attr('action');
	//alert(url);
	var data = $(this).serialize();
	//console.log(data);
	$.post(url,data,function(fb){

		//alert(fb);
		//for json data fallback
		//var resp = $.parseJSON(fb);
		//console.log(resp);
		// JSON check ends
		var resp = $.parseJSON(fb);
		if(resp.status == 'true')
		{
			alert(resp.message);
			setTimeout(function(){
				window.location.href = resp.reload;
			},1000);
		}
		else
		{
			alert(resp.message);
		}
		
	});
	return false;
});
</script>
</html>