@extends('layouts.layout')
@section('title','Dashboard|Search Result')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="m-0 text-dark">Search Student Result</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
              <li class="breadcrumb-item active">Search Result</li>
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
            <div class="card mt-4">
              <div class="card-body">
                <!--Start creating your amazing application-->
                <form action="{{ url('admin/search_result_sub') }}">
                  <div class="row">
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
                    <div class="col-sm-12">
                      <div class="form-group">
                        <button class="btn btn-primary">Search</button>
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