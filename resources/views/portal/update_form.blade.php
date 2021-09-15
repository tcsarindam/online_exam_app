@extends('layouts.portal')
@section('title','Portal|Search Form')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Portal Search Form</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('portal/dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Portal Search Form</li>
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
                   Student Information Search
                  </div>
                  <hr>
                  <form action="{{ url('portal/student_exam_info') }}" method="get">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                          <label>Enter Mobile No</label>
                          <input type="phone" name="mobile_no" placeholder="Enter Mobile No" required="required" class="form-control">
                      </div>
                    </div>
                     <div class="col-sm-12">
                      <div class="form-group">
                          <label>Select DOB</label>
                          <input type="date" name="dob" required="required" class="form-control">
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Select Exam</label>
                        <select class="form-control" name="exam">
                          <option value="">Select Exam</option>
                          @foreach($exams as $exam)
                          <option value="{{ $exam['id'] }}">{{ $exam['title'] }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="form-group">
                        <button class="btn btn-info" name="search">Search</button>
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