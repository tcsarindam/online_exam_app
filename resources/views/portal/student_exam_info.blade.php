@extends('layouts.portal')
@section('title','Portal|Student Exam Info')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Student Exam Info</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('portal/dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Student Exam Info</li>
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
                  <div class="row">
                    <div class="col-sm-6">
                        <h3>{{ $exam_info->title }}</h3>
                    </div>
                     <div class="col-sm-6">
                        <h3><span class="float-right">{{ date('d M,Y',strtotime($exam_info->exam_date)) }}</span></h3>
                    </div>
                  </div>
                  <hr>
                  <form action="{{ url('portal/student_exam_info_edit') }}" class="database_operation" method="post">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                          <label>Enter Name</label>
                          <input type="hidden" name="id" value="{{ $student_info[0]['id'] }}">
                          {{ csrf_field() }}
                          <input type="text" name="name" placeholder="Name" required="required" class="form-control" value="{{ $student_info[0]['name'] }}">
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="form-group">
                          <label>Enter Email</label>
                          <input type="email" name="email" placeholder="Enter Email" required="required" class="form-control" value="{{ $student_info[0]['email'] }}">
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="form-group">
                          <label>Enter Mobile No</label>
                          <input type="phone" name="mobile_no" placeholder="Enter Mobile No" required="required" class="form-control" value="{{ $student_info[0]['mobile_no'] }}">
                      </div>
                    </div>
                     <div class="col-sm-12">
                      <div class="form-group">
                          <label>Enter DOB</label>
                          <input type="date" name="dob" placeholder="Enter DOB" required="required" class="form-control" value="{{ $student_info[0]['dob'] }}">
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="form-group">
                          <label>Enter Password</label>
                          <input type="password" name="password" placeholder="Enter Password" class="form-control">
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="form-group">
                        <button class="btn btn-info" name="sub">Update</button>
                      </div>
                  </div>
              </div>
              </form>
              <div class="row">
                <div class="col-sm-12">
                  <span style="float: right;">
                  <a href="{{ url('portal/printdata/'.$student_info[0]['id']) }}" style="text-decoration: none; color: white; background: green; width: 100px; height: 100px; padding:10px 20px 10px 20px;border-radius: 5px;">Print Student Information</a></span>
                </div>
              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
</div>


@endsection