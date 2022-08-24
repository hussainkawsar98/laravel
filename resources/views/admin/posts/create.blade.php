@extends('admin.app')

@section('main-content')
        <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add Post</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Post</li>
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
              <form action="{{ route('posts.store') }}" method="POST" class="mb-4" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <label class="form-label">Post Tilte</label>
                  <input type="text" class="form-control" placeholder="Write Title" name="title" required>
                </div>
                <div class="mb-3">
                  <label class="form-label">Category</label>
                  <select name="category_id" value="" class="form-control" required>
                    <option selected disabled>Choose Category</option>
                    @foreach($category as $cat)
                    <option value="{{$cat->id}}">{{$cat->category_name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="mb-3">
                  <label class="form-label">Post Date</label>
                  <input type="date" class="form-control" name="post_date" required>
                </div>
                <div class="mb-3">
                  <label class="form-label">Tags</label>
                  <input type="text" class="form-control" name="tags">
                </div>
                <div class="mb-3">
                  <label class="form-label">Description</label>
                  <textarea class="form-control" name="description" cols="30" rows="4"></textarea>
                </div>
                <div class="mb-3">
                    <input type="file" name="image" required>
                </div>
                <div class="mb-3">
                    <input type="checkbox" name="status" id="status" value="1">
                    <label for="status" class="form-label">Published Now</label>
                </div>
                <button type="submit" class="btn btn-primary mb-4">Save Post</button>
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