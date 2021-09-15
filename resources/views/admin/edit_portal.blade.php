@extends('layouts.layout')
@section('title','Dashboard|Portal')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Portal User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
              <li class="breadcrumb-item active">Edit Portal User</li>
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
                <form action="{{ url('admin/edit_portal_sub') }}" class="database_operation">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Enter Portal User Name</label>
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $portal->id }}">
                        <input type="text" name="name" value="{{ $portal->name }}" placeholder="Enter Portal User Name" class="form-control" required="required">
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Enter Email</label>
                        <input type="email" name="email" value="{{ $portal->email }}" placeholder="Enter Email" class="form-control" required="required">
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Enter Mobile No</label>
                        <input type="phone" name="mobile_no" value="{{ $portal->mobile_no }}" placeholder="Enter Mobile No" class="form-control" required="required">
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Enter Password</label>
                        <input type="password" name="password" value="{{ $portal->password }}" placeholder="Enter Password" class="form-control">
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