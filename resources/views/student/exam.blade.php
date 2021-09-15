@extends('layouts.student')
@section('title','Student|Exam')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="m-0 text-dark">{{ $stud_name->name }} - All Exams</h3>
            <p>All Exams are of duration of 1 Hour. Complete the exams within the exam date.</p>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('student/dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Exams</li>
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
                 <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                  <thead>
                  <tr>
                        <th>#</th>
                        <th>Exam Title</th>
                        <th>Exam Date</th>
                        <th>Exam Status</th>
                        <th>Result</th>
                        <th>Exam Attendance</th>
                        <th>Action</th>
                        <th>Model Answer</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($student_info as $key=> $student)
                    <tr>
                      <td>{{ $key+1 }}</td>
                      <td>{{ $student['title'] }}</td>
                      <td>{{ $student['exam_date'] }}</td>
                      <td>
                        <?php
                        if(strtotime(date('Y-m-d')) > strtotime($student['exam_date']))
                        {
                          echo "Expired";
                        }
                        else if(strtotime(date('Y-m-d')) == strtotime($student['exam_date']))
                        {
                          echo "Active Exam";
                        }
                        else
                        {
                          echo "Upcoming Exam";
                        }
                        ?>
                      </td>
                      <td>
                        <?php
                        if($student['exam_submit']==1)
                        {
                          //$r = $joined_exam->yes_ans/( $joined_exam->yes_ans +  $joined_exam->no_ans)*100;
                          //echo round($r,2).'%';
                          ?>
                          Published
                          <br>
                          <a href="{{ url('student/show_result/'.$student['exam_id']) }}">&nbsp;See Detail Report</a>
                        <?php  
                        }   
                        else
                        {
                          echo "Not Available";
                        }
                        ?>
                      </td>
                      <td>
                         <?php
                        if(strtotime(date('Y-m-d')) == strtotime($student['exam_date']))
                        {
                          if($student['exam_submit']==1){
                            echo "Attended";
                          }
                          else
                          {
                            echo "Absent";
                          }
                        }
                        else if(strtotime(date('Y-m-d')) > strtotime($student['exam_date']))
                        {
                          if($student['exam_submit']==1){
                            echo "Attended";
                          }
                          else
                          {
                            echo "Absent";
                          }
                        }
                        else
                        {
                          echo "N.A";
                        }
                        ?>                        
                      </td>
                      <?php
                        if(strtotime(date('Y-m-d')) == strtotime($student['exam_date']))
                        {
                          if($student['exam_submit']==0){
                          ?>
                        
                      <td><a href="{{ url('student/join_exam/'.$student['exam_id']) }}" class="btn btn-info btn-sm">Join Exam</a></td>
                      <?php 
                        }
                        else
                        {
                       ?>  
                       <td><button class="btn btn-success btn-sm" disabled="disabled">Already Submitted</button></td> 
                       <?php
                        }
                        }
                        else if(strtotime(date('Y-m-d')) > strtotime($student['exam_date']))
                        {
                        ?>
                       <td><button disabled="disabled" class="btn-btn-alert btn-sm" style="color:white;background: red;"><b>Exam Expired</b></button></td>
                        <?php
                      }
                      else
                      {
                      ?>
                      <td><button  disabled="disabled" class="btn btn-alert btn-sm" style="color:white; background: orange;"><b>Cannot Join Now</b></button></td>
                      <?php
                      }
                      ?>
                      <td>
                        <?php
                        if(strtotime(date('Y-m-d')) > strtotime($student['exam_date']))
                        {
                        ?>
                            <a href="{{ url('student/model_answer/'.$student['exam_id']) }}"><b>Click Here</b></a>  
                        <?php
                        }
                        else
                        {
                            echo "Model Answer Not Available";
                        }
                        ?> 
                        </td>         
                    </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                      <tr>
                        <th>#</th>
                        <th>Exam Title</th>
                        <th>Exam Date</th>
                        <th>Exam Status</th>
                        <th>Result</th>
                        <th>Exam Attendance</th>
                        <th>Action</th>
                        <th>Model Answer</th>
                      </tr>
                  </tfoot>
                </table>

            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
</div>


@endsection