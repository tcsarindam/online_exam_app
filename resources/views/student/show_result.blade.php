@extends('layouts.student')
@section('title','Student|Result')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="m-0 text-dark">Result</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('student/dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Result</li>
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
                <h3 class="text-center" style="margin-bottom: 5px;">Report Card</h3>
                <hr>
                <h3>Basic Information</h3>
                <table class="table">
                   <tr>
                    <td>Exam Name</td>
                    <td>{{ $student_info->title }}</td>
                  </tr>
                   <tr>
                    <td>Exam Date</td>
                    <td>{{ date('d M,Y',strtotime($student_info->exam_date)) }}</td>
                  </tr>
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
                    <td>Mobile No</td>
                    <td>{{ $student_info->mobile_no }}</td>
                  </tr>
                </table>
                <h3>Result Information</h3>
                <table class="table">
                  <tr>
                    <td>Total Questions</td>
                    <td>{{ $result_info->yes_ans + $result_info->no_ans }}</td>
                  </tr>
                  <tr>
                    <td>Correct Answers</td>
                    <td>{{ $result_info->yes_ans }}</td>
                  </tr>
                   <tr>
                    <td>Wrong Answers</td>
                    <td>{{ $result_info->no_ans }}</td>
                  </tr>                   
                  <tr>
                    <td>Percentage</td>
                    <td>
                      <?php
                         $r = $result_info->yes_ans/( $result_info->yes_ans +  $result_info->no_ans)*100;
                          echo round($r,2).'%';
                      ?>
                    </td>
                  </tr>
                  <tr>
                    <td>Status</td>
                    <td>
                      <?php
                       $r1 = round(($result_info->yes_ans/( $result_info->yes_ans +  $result_info->no_ans)*100),2);
                       if($r1 >=50)
                          echo "Passed";
                        else
                          echo "Failed";

                       ?>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2" style="text-align: center;"><button onclick="window.print();" class="btn btn-info btn-sm">Print</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-info btn-sm"><a href="{{ url('student/exam') }}" style="text-decoration: none; color: white;">Back</a></button></td>
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


