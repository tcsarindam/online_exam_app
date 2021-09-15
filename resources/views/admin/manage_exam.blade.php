@extends('layouts.layout')
@section('title','Dashboard|Exam')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Exam</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
              <li class="breadcrumb-item active">Manage Exam</li>
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
                  <!--<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>-->
                    <a href="javascript:;" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">Add New</a>&nbsp;&nbsp;
                    <a href="{{ url('admin/all_assigned_exams') }}" class="btn btn-info btn-sm">List of Assigned Exams</a>
                </div>
              </div>
              <div class="card-body">
                <!--Start creating your amazing application-->
                <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                	<thead>
			            <tr>
                      <th>#</th>
			                <th>Title</th>
                      <th>Category</th>
                      <th>Exam Date</th>
			                <th>Status</th>
			                <th>Action</th>
			            </tr>
        			</thead>
        			<tbody>
               @foreach($exams as $key => $exam)
                  <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $exam['title'] }}</td>
                    <td>{{ $exam['cat_name'] }}</td>
                    <td>{{ $exam['exam_date'] }}</td>
                    <td><input type="checkbox" name="status" class="exam_status" data-id="{{ $exam['id'] }}" <?php if($exam['status'] == 1){ echo "checked"; } ?>></td>
                    <td>
                      <a href="{{ url('admin/edit_exam/'.$exam['id']) }}" class="btn btn-info btn-sm">Edit</a>
                      <a href="{{ url('admin/delete_exam/'.$exam['id']) }}" class="btn btn-danger btn-sm">Delete</a>
                      <a href="{{ url('admin/add_question/'.$exam['id']) }}" class="btn btn-primary btn-sm">Add Question</a>
                      <a href="{{ url('admin/add_exam_student/'.$exam['id']) }}" class="btn btn-success btn-sm">Assign Student</a>
                    </td>
                  </tr>
                @endforeach
        			</tbody>
        			<tfoot>
			            <tr>
                      <th>#</th>
                      <th>Title</th>
                      <th>Category</th>
                      <th>Exam Date</th>
                      <th>Status</th>
                      <th>Action</th>
			            </tr>
        			</tfoot>
                </table>
              </div>
              <!-- /.card-body -->
             <!-- <div class="card-footer">
                Footer
              </div>-->
              <!-- /.card-footer-->
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
        <h4 class="modal-title">Add New Exam</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      	<form action="{{ url('admin/add_new_exam') }}" class="database_operation" method="post">
        <div class="row">
        	<div class="col-sm-12">
        		<div class="form-group">
        			<label>Enter Exam Title</label>
              {{ csrf_field() }}
        			<input type="text" name="title" placeholder="Enter Exam Title" class="form-control" required="required">
        		</div>
        	</div>
          <div class="col-sm-12">
            <div class="form-group">
              <label>Select Exam Date</label>
              <input type="date" name="exam_date" class="form-control" required="required">
            </div>
          </div>
          <div class="col-sm-12">
            <div class="form-group">
              <label>Select Exam Category</label>
              <select class="form-control" required="required" name="exam_category">
                <option value="" selected="selected">Select Category</option>
                @foreach($category as $cat)
                  <option value="{{ $cat['id']}}">{{ $cat['name'] }}</option>
                @endforeach
              </select>
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