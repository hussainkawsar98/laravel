@extends('admin.app')

@section('main-content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add Sub Category</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Sub Category</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


        <!-- Main content -->
        <section class="content">
      <div class="container-fluid">
      <!-- Start New category Form -->
        <div class="row">
          <div class="col-md-7">
            <div class="data-add-form">
              @if(Session::has('success'))
              <p class="alert bg-success">{{ Session::get('success') }}</p>
              @endif
              <ul class="ul-error">
              @foreach ($errors->all() as $error)
                  <li class="alert bg-danger">{{ $error }}</li>
              @endforeach
              </ul>
              <form action="{{ route('sub-category.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                  <label class="form-label">Select Parent adminCategory</label>
                    <select name="category_id" class="form-control">
                      <option selected desabled>Select Your Parent Category</option>
                      @foreach($categories as $row)
                      <option value="{{$row->id}}">{{$row->category_name}}</option>
                      @endforeach
                  </select>
                </div>
                <div class="mb-3">
                  <label class="form-label">New Category</label>
                  <input type="text" class="form-control" placeholder="Write Here" name="subcategory_name">
                </div>
                <button type="submit" class="btn btn-primary">Add Sub Category</button>
              </form>
            </div>
          </div>
        </div>
      <!-- End New category Form -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection