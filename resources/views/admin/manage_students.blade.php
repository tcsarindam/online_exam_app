@extends('layouts.layout')
@section('title','Dashboard|Students')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Student</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
              <li class="breadcrumb-item active">Student</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
        <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <div class="card-tools">
                    <a href="javascript:;" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">Add New</a>
                </div>
              </div>
              <div class="card-body">
                <!--Start creating your amazing application-->
                <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                	<thead>
			            <tr>
                      <th>#</th>
			                <th>Name</th>
                      <th>Email</th>
                      <th>Mobile No</th>
                      <th>DOB</th>
                      <th>Exam</th>
                      <th>Exam Date</th>
                      <th>Result</th>
			                <th>Status</th>
			                <th>Action</th>
			            </tr>
        			</thead>
        			<tbody>
        				@foreach($students as $key => $student)
                  <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $student['name'] }}</td>
                    <td>{{ $student['email'] }}</td>
                    <td>{{ $student['mobile_no'] }}</td>
                    <td>{{ $student['dob'] }}</td>
                    <td>{{ $student['exam_name'] }}</td>
                    <td>{{ $student['exam_date'] }}</td>
                    <td>N/A</td>
                    <td><input type="checkbox" name="status" class="student_status" data-id="{{ $student['id'] }}" <?php if($student['status'] == 1){ echo "checked"; } ?>></td>
                    <td>
                      <a href="{{ url('admin/edit_student/'.$student['id']) }}" class="btn btn-info btn-sm">Edit</a>
                      <a href="{{ url('admin/delete_student/'.$student['id']) }}" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                  </tr>
                @endforeach
        			</tbody>
        			<tfoot>
			            <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Mobile No</th>
                      <th>DOB</th>
                      <th>Exam</th>
                      <th>Exam Date</th>
                      <th>Result</th>
                      <th>Status</th>
                      <th>Action</th>
			            </tr>
        			</tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
</div>
<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add New Student</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      	<form action="{{ url('admin/add_new_student') }}" class="database_operation">
        <div class="row">
        	<div class="col-sm-12">
        		<div class="form-group">
        			<label>Enter Student Name</label>
              {{ csrf_field() }}
        			<input type="text" name="name" placeholder="Enter Student Name" class="form-control" required="required">
        		</div>
        	</div>
          <div class="col-sm-12">
            <div class="form-group">
              <label>Enter Student Email</label>
              <input type="email" name="email" placeholder="Enter Student Email" class="form-control" required="required">
            </div>
          </div>
          <div class="col-sm-12">
            <div class="form-group">
              <label>Enter Mobile No</label>
              <input type="phone" name="mobile_no" placeholder="Enter Mobile No" class="form-control" required="required">
            </div>
          </div>
          <!--<div class="col-sm-12">
            <div class="form-group">
              <label>Select Exam Category</label>
              <select class="form-control" required="required" name="exam_category">
                <option value="" selected="selected">Select Category</option>
                @foreach($category as $cat)
                  <option value="{{ $cat['id']}}">{{ $cat['name'] }}</option>
                @endforeach
              </select>
            </div>
          </div>-->
          <div class="col-sm-12">
            <div class="form-group">
              <label>Enter DOB</label>
              <input type="date" name="dob" placeholder="Enter DOB" class="form-control" required="required">
            </div>
          </div>
          <!--<div class="col-sm-12">
            <div class="form-group">
              <label>Select Exam</label>
              <select class="form-control" required="required" name="exam">
                <option value="" selected="selected">Select Exam</option>  
                @foreach($exams as $exam)
                  <option value="{{ $exam['id']}}">{{ $exam['title'] }}</option>
                @endforeach             
              </select>
            </div>
          </div>-->
          <div class="col-sm-12">
            <div class="form-group">
              <label>Enter Password</label>
              <input type="password" name="password" placeholder="Enter Password" class="form-control" required="required">
            </div>
          </div>
        	<div class="col-sm-12">
        		<div class="form-group">
        			<button class="btn btn-primary">Add</button>
        		</div>
        	</div>
        </div>
        </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

@endsection