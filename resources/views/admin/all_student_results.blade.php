@extends('layouts.layout')
@section('title','Student|All Results')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="m-0 text-dark">All Results</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
              <li class="breadcrumb-item active">All Results</li>
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
                        <th>Correct Answers</th>
                        <th>Wrong Answers</th>
                        <th>Percentage</th>
                        <th>Exam Status</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($all_exam_results as $key => $result)
                      <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $result['exam_name'] }}</td>
                        <td>{{ $result['exam_date'] }}</td>
                         <td>{{ $result['stud_name'] }}</td>
                        <td>{{ $result['yes_ans'] }}</td>
                        <td>{{ $result['no_ans'] }}</td>
                        <td>
                          <?php
                            $score = $result['yes_ans']/($result['yes_ans'] +  $result['no_ans'])*100;
                          echo round($score,2).'%';
                          ?>
                        </td>
                        <td>
                          <?php
                            $score = round(($result['yes_ans']/($result['yes_ans'] +  $result['no_ans'])*100),2);
                            if($score >=50)
                              echo "Passed";
                            else
                              echo "Failed";
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
                        <th>Correct Answers</th>
                        <th>Wrong Answers</th>
                        <th>Percentage</th>
                        <th>Exam Status</th>
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