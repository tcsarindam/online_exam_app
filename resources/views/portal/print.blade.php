<!DOCTYPE html>
<html>
<head>
	<title>Portal|Print</title>
	<style type="text/css">
		.print_container
		{
			width: 50%;
			margin: auto;
			padding-top: 50px;
		}

		.exam_title{
			text-align: center;
		}

		.info_block
		{
			width: 50%;
			float: left;
			height: 50px;
			line-height: 50px;
			text-align: center;
		}
		.user_info_block
		{
			margin-top: 75px;
		}

		.print_btn
		{
			text-align: center;
			border-radius: 5px;
			padding: 50px;
			line-height: 10px;
			margin-top: 200px;
		}
		
		.link_block a
		{
			
			text-decoration: none;
			color: black;
		}
		.link_block
		{
			text-align: right;
		}

		.print_btn a
		{
			
			text-decoration: none;
			color:black;
		}



	</style>
</head>
<body>
	<div class="print_container">
		<div class="exam_title">
			<h3>Exam Name: {{ $exam_title }}</h3>
			<p>Exam Date: {{ date('d M,Y',strtotime($exam_date)) }}</p>
		</div>
		<div class="user_info_block">
			<div class="info_block">
				<label>Name: {{ $std_info->name }}</label>
			</div>
			<div class="info_block">
				<label>Email: {{ $std_info->email }}</label>
			</div>
			<div class="info_block">
				<label>Contact No: {{ $std_info->mobile_no }}</label>
			</div>
			<div class="info_block">
				<label>DOB: {{ date('d M,Y',strtotime($std_info->dob)) }}</label>
			</div>
		</div>
		<div class="print_btn">
			<button onclick="window.print()"><b>Print</b></button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<button><a href="{{ url('portal/printpdf/'.$ref_id) }}"><b>Download PDF</b></a></button>
		</div>
		<div class="link_block">
			<a href="{{ url('portal/dashboard') }}"><b><<&nbsp;Dashboard</b></a>
		</div>
	</div>
</body>
</html>