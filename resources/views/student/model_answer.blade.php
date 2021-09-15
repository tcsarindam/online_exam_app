@extends('layouts.student')
@section('title','Student|Model QA')
@section('content')

<style type="text/css">
	.question_option > li
	{
		list-style: none;
		height: 20px;
		line-height: 20px;
	}
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="m-0 text-dark">Model Answer Sheet</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('student/dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Model Answer Sheet</li>
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
               <h3 class="text-center">Model Answer Sheet</h3>
                 

            </div>
            <!-- /.card -->
          </div>
          <div class="card mt-2">
              <div class="card-body">
                <!--Start creating your amazing application-->               
                <div class="row">
                    @foreach($all_qa as $key=> $question)
                	<div class="col-sm-12">
                		<p><b>{{ $key+1 }} . {{ $question['question'] }}</b></p>
                        <?php
                        $options = json_decode(json_encode(json_decode($question['options'])),true);
                        ?>
                   
                		<ul class="question_option">
                			<li><input type="radio" name="ans{{ $key+1 }}" value="{{ $options['option1'] }}">&nbsp;&nbsp;{{ $options['option1'] }}</li>
                			<li><input type="radio" name="ans{{ $key+1 }}" value="{{ $options['option2'] }}">&nbsp;&nbsp;{{ $options['option2'] }}</li>
                			<li><input type="radio" name="ans{{ $key+1 }}" value="{{ $options['option3'] }}">&nbsp;&nbsp;{{ $options['option3'] }}</li>
                			<li><input type="radio" name="ans{{ $key+1 }}" value="{{ $options['option4'] }}">&nbsp;&nbsp;{{ $options['option4'] }}</li>
                		</ul>
                    <label>Correct Answer:</label>&nbsp; {{ $question['ans'] }}
                    <hr>
                	</div>
                	@endforeach                	
                </div>
                <center>
                  <button class="btn btn-info btn-sm"><a href="{{ url('student/exam') }}" style="text-decoration: none; color: white;">Back</a></button>
                </center>
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
</div>


@endsection


