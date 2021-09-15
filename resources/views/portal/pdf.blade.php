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
		.user_info_block
		{
			margin-top: 20x;
			text-align: center;
			margin-left: 50px;
		}

	</style>
</head>
<body>
	<div class="print_container">
		<div class="exam_title">
			<h3>Exam Name: {{ $exam_info->title }}</h3>
			<p><b>Exam Date:</b> {{ date('d M,Y',strtotime($exam_info->exam_date)) }}</p>
			<p><b>Exam Expired By:</b> {{ date('d M,Y',strtotime($exam_info->exam_date)) }}</p>
		</div>
		<h3 style="margin-left: 50px;">Student Information</h3>
		<div class="user_info_block">
			
			<table cellspacing="0" cellpadding="0" style="height: 100px;width: 200px; border-color: gray; border-radius: 10px; border-spacing: 20px; align-content: center;" border="1">
		      <tr>
		      	<td style="width:100%; padding: 10px;">Name: </td>
		       	<td style="width:1001%;padding: 10px;">
		          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $std_info->name }}
		        </td>
		    	</tr>
		    	<tr>
		    	<td style="width:100%;padding: 10px;">Email: </td>
		        
		        <td style="width:100%;padding: 10px;">
		          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $std_info->email }}
		        </td>
		      </tr>
		      <tr>
		      	<td style="width:100%;padding: 10px;">Contact No: </td>
		        <td style="width:100%;padding: 10px;">
		         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $std_info->mobile_no }}
		        </td>
		       </tr>
		       <tr>
		       	<td style="width:100%;padding: 10px;">DOB: </td>
		        <td style="width:100%;padding: 10px;">
		          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ date('d M,Y',strtotime($std_info->dob)) }}
		        </td>
		      </tr>
		    </table>
		</div>
	</div>
</body>
</html>