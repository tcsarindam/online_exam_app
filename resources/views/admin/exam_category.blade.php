@extends('layouts.layout')
@section('title','Dashboard|Category')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Category</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
              <li class="breadcrumb-item active">Category</li>
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
                <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                	<thead>
			            <tr>
                      <th>#</th>
			                <th>Name</th>
			                <th>Status</th>
			                <th>Action</th>
			            </tr>
        			</thead>
        			<tbody>
        				@foreach($category as $key => $cat)
                  <tr>
                    <td><?php echo $key+1; ?></td>
                    <td><?php echo $cat['name']; ?></td>
                    <td><input type="checkbox" name="status" class="category_status" data-id="{{ $cat['id'] }}" <?php if($cat['status'] == 1){ echo "checked"; } ?>></td>
                    <td>
                      <a href="{{ url('admin/edit_category/'.$cat['id']) }}" class="btn btn-info btn-sm">Edit</a>
                      <a href="{{ url('admin/delete_category/'.$cat['id']) }}" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                  </tr>
                @endforeach
        			</tbody>
        			<tfoot>
			            <tr>
                      <th>#</th>
			                <th>Name</th>
			                <th>Status</th>
			                <th>Action</th>
			            </tr>
        			</tfoot>
                </table>
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
<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Category</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      	<form action="{{ url('admin/add_new_category') }}" class="database_operation">
        <div class="row">
        	<div class="col-sm-12">
        		<div class="form-group">
        			<label>Enter Category Name</label>
              {{ csrf_field() }}
        			<input type="text" name="name" placeholder="Enter Category Name" class="form-control" required="required">
        		</div>
        	</div>
        	<div class="col-sm-12">
        		<div class="form-group">
        			<button class="btn btn-primary">Add</button>
        		</div>
        	</div>
        </div>
        </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

@endsection