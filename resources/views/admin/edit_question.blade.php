@extends('layouts.layout')
@section('title','Dashboard|Update Exam Question')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Update Exam Question</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
              <li class="breadcrumb-item active">Update Exam Question</li>
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
              <div class="card-header">
                

                <div class="card-tools">
                  <!--<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>-->
                    <a href="javascript:;" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">Add New</a>
                </div>
              </div>
              <div class="card-body">
                <!--Start creating your amazing application-->
                <form action="{{ url('admin/edit_question_sub') }}" class="database_operation" method="post">
        <div class="row">
          <div class="col-sm-12">
            <div class="form-group">
              <label>Enter Question</label>
              {{ csrf_field() }}
              <input type="hidden" name="id" value="{{ $question[0]['id'] }}">
              <input type="text" name="question" placeholder="Enter Question" class="form-control" required="required" value="{{ $question[0]['question'] }}">
            </div>
          </div>
          <?php
          $options = json_decode($question[0]['options']);
          ?>
          <div class="col-sm-6">
            <div class="form-group">
              <label>Enter Answer Option 1</label>
              <input type="text" name="option1" class="form-control" required="required" placeholder="Enter Option 1" value="{{ $options->option1 }}">
            </div>
          </div>
           <div class="col-sm-6">
            <div class="form-group">
              <label>Enter Answer Option 2</label>
              <input type="text" name="option2" class="form-control" required="required" placeholder="Enter Option 2" value="{{ $options->option2 }}">
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label>Enter Answer Option 3</label>
              <input type="text" name="option3" class="form-control" required="required" placeholder="Enter Option 3" value="{{ $options->option3 }}">
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label>Enter Answer Option 4</label>
              <input type="text" name="option4" class="form-control" required="required" placeholder="Enter Option 4" value="{{ $options->option4 }}">
            </div>
          </div>
          <div class="col-sm-12">
            <div class="form-group">
              <label>Enter Correct Answer</label>
              <input type="text" name="ans" class="form-control" required="required" placeholder="Enter Correct Answer" value="{{ $question[0]['ans'] }}">
            </div>
          </div>
          <div class="col-sm-12">
            <div class="form-group">
              <button class="btn btn-primary">Update</button>
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