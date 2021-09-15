@extends('layouts.student')
@section('title','Student|Result')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="m-0 text-dark">Registration</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('student/dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Registration Details</li>
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
          <div class="col-sm-2">&nbsp;</div>
          <div class="col-sm-8">
            <!-- Default box -->
            <div class="card mt-4">
              <div class="card-body">
                <!--Start creating your amazing application-->
                <h3 class="text-center" style="margin-bottom: 5px;">User Registration Details</h3>

                <table class="table">
                  <tr>
                    <td>Student Name</td>
                    <td>{{ $student_info->name }}</td>
                  </tr>
                   <tr>
                    <td>Email</td>
                    <td>{{ $student_info->email }}</td>
                  </tr>
                   <tr>
                    <td>Mobile No</td>
                    <td>{{ $student_info->mobile_no }}</td>
                  </tr>
                   <tr>
                    <td>Date Of Birth</td>
                    <td>{{ date('d M,Y',strtotime($student_info->dob)) }}</td>
                  </tr>
                  <tr>
                    <td colspan="2" style="text-align: center;"><button onclick="window.print();" class="btn btn-info btn-sm">Print</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-info btn-sm"><a href="{{ url('student/dashboard') }}" style="text-decoration: none; color: white;">Back</a></button></td>
                  </tr>
                </table> 
            </div>
            <!-- /.card -->
          </div>

        </div>
      </div>
    </div>
    </section>
    <!-- /.content -->
</div>


@endsection


