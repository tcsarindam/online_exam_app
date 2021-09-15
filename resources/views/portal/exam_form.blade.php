@extends('layouts.portal')
@section('title','Portal|Exam Form')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Portal Exam Form</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('portal/dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Portal Exam</li>
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
                        <h3>{{ $exam_title }}</h3>
                    </div>
                     <div class="col-sm-6">
                        <h3><span class="float-right">{{ date('d M,Y',strtotime($exam_date)) }}</span></h3>
                    </div>
                  </div>
                  <hr>
                  <form action="{{ url('portal/exam_form_sub') }}" class="database_operation" method="post">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                          <label>Enter Name</label>
                          <input type="hidden" name="id" value="{{ $id }}">
                          {{ csrf_field() }}
                          <input type="text" name="name" placeholder="Name" required="required" class="form-control">
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="form-group">
                          <label>Enter Email</label>
                          <input type="email" name="email" placeholder="Enter Email" required="required" class="form-control">
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="form-group">
                          <label>Enter Mobile No</label>
                          <input type="phone" name="mobile_no" placeholder="Enter Mobile No" required="required" class="form-control">
                      </div>
                    </div>
                     <div class="col-sm-12">
                      <div class="form-group">
                          <label>Enter DOB</label>
                          <input type="date" name="dob" placeholder="Enter DOB" required="required" class="form-control">
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="form-group">
                          <label>Enter Password</label>
                          <input type="password" name="password" placeholder="Enter Password" required="required" class="form-control">
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="form-group">
                        <button class="btn btn-info" name="sub">Submit</button>
                      </div>
                  </div>
              </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
</div>


@endsection