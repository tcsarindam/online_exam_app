@extends('layouts.student')
@section('title','Student|Start Exam')
@section('content')

<style type="text/css">
	.question_option > li
	{
		list-style: none;
		height: 50px;
		line-height: 50px;
	}
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="m-0 text-dark">Start Exam</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('student/dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Start Exam</li>
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
                	<div class="col-sm-4">
                		<h3>Duration:1 Hr</h3>
                	</div>
                	<div class="col-sm-4">
                		<h3 class="text-center">Timer: <span id="timer">01:11</span></h3>
                	</div>
                	<div class="col-sm-4">
                		<h3 class="text-right">Status: Running</h3>
                	</div>
                </div>
                 

            </div>
            <!-- /.card -->
          </div>
          <div class="card mt-4">
              <div class="card-body">
                <!--Start creating your amazing application-->
                <form action="{{ url('student/submit_question') }}" method="post" id="myform">
                  {{ csrf_field() }}
                <input type="hidden" name="exam_id" value="{{ Request::segment(3) }}">
                <div class="row">
                    @foreach($all_questions as $key=> $question)
                	<div class="col-sm-12">
                		<p><b>{{ $key+1 }} . {{ $question['question'] }}</b></p>
                        <?php
                        $options = json_decode(json_encode(json_decode($question['options'])),true);
                        ?>
                    <input type="hidden" name="question{{ $key+1 }}" value="{{ $question['id'] }}">
                		<ul class="question_option">
                			<li><input type="radio" name="ans{{ $key+1 }}" value="{{ $options['option1'] }}">&nbsp;&nbsp;{{ $options['option1'] }}</li>
                			<li><input type="radio" name="ans{{ $key+1 }}" value="{{ $options['option2'] }}">&nbsp;&nbsp;{{ $options['option2'] }}</li>
                			<li><input type="radio" name="ans{{ $key+1 }}" value="{{ $options['option3'] }}">&nbsp;&nbsp;{{ $options['option3'] }}</li>
                			<li><input type="radio" name="ans{{ $key+1 }}" value="{{ $options['option4'] }}">&nbsp;&nbsp;{{ $options['option4'] }}</li>
                      <li  style="display: none;"><input type="radio" name="ans{{ $key+1 }}" value="{{ $options['option4'] }}" checked="checked" value="0"></li>
                		</ul>
                	</div>
                	@endforeach
                	<div class="col-sm-12 mt-4">
                    <input type="hidden" name="index" value="<?php echo $key+1 ?>">
                		<button class="btn btn-info btn-block">Submit</button>
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


