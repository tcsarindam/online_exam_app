@extends('layouts.layout')
@section('title','Dashboard|Assign Exam')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Assign Exam to Student</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Assign Exam</li>
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
              <div class="card-body">
                <!--Start creating your amazing application-->
                <form action="{{ url('admin/add_exam_student_sub') }}" class="database_operation">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Exam Title</label>
                        {{ csrf_field() }}
                        <input type="hidden" name="exam_id" value="{{ $exam1->id }}">
                        <input type="text" name="title" value="{{ $exam1->title }}" placeholder="Enter Exam Title" class="form-control" required="required" readonly="readonly">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                         <label>Exam Date</label>
                         <input type="text" name="exam_date" value="{{ $exam1->exam_date }}" placeholder="Enter Exam Date" class="form-control" required="required" readonly="readonly">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Select Student</label>
                        <select name="user_id" class="form-control" required="required">
                          <option value="">Select Student</option>
                          @foreach($students as $student)
                          <option value="{{ $student['id'] }}">{{ $student['name'] }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6"></div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <button class="btn btn-info">Assign</button>
                      </div>
                    </div>
                  </div>
                </form>
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
@endsection