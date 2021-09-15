@extends('layouts.layout')
@section('title','Student|Assigned Exams')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="m-0 text-dark">List of Assigned Exams</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('admin/manage_exam') }}">Back</a></li>
              <li class="breadcrumb-item active">List of Assigned Exams</li>
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
                        <th>Student Name</th>
                        <th>Status of Exam</th>
                        <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($all_assigned_exams as $key=> $exam)
                    <tr>
                      <td>{{ $key+1 }}</td>
                      <td>{{ $exam['title'] }}</td>
                      <td>{{ $exam['exam_date'] }}</td>
                      <td>{{ $exam['name'] }}</td>
                      <td>
                        <?php
                          if(strtotime(date('Y-m-d')) > strtotime($exam['exam_date']))
                          {
                            if($exam['exam_submit'] == 1)
                            {
                                echo "<button class='btn btn-success btn-sm' disabled='disabled'>Attended</button>";
                            }
                            else
                            {
                              echo "<button class='btn btn-danger btn-sm' disabled='disabled'>Absent</button>";
                            }
                          }
                          else if(strtotime(date('Y-m-d')) == strtotime($exam['exam_date']))
                          {
                            if($exam['exam_submit'] == 1)
                            {
                                 echo "<button class='btn btn-success btn-sm' disabled='disabled'>Attended</button>";
                            }
                            else
                            {
                               echo "<button class='btn btn-info btn-sm' disabled='disabled'>Not Attended Yet</button>";
                            }
                          }
                          else
                          {
                            echo "<button class='btn btn-primary btn-sm' disabled='disabled'>Exam Assigned</button>";
                          }
                        ?>                        
                      </td>
                      <td>
                        <?php 
                         if(strtotime(date('Y-m-d')) < strtotime($exam['exam_date']))
                         {
                          ?>
                            <a href="{{ url('admin/delete_exam_map/'.$exam['record_id']) }}" class="btn btn-danger btn-sm">Unassign</a>
                          <?php
                          }
                          else
                          {
                          ?>
                            <button class="btn btn-danger btn-sm" disabled="disabled">Unassign</button>
                          <?php
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
                        <th>Student Name</th>
                        <th>Status of Exam</th> 
                        <th>Action</th>                      
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