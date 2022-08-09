@extends('index')

@section('content')
    <div class="container">
        <h2 class="text-center">Edit Category</h2>
        <form action="{{route('category.update', $data->id)}}" method="post">
            @csrf
            <div class="mb-3">
                <input type="hidden" name="_method" value="PUT">
                <label class="form-label">Category Name </label>
                <input type="text" name="category_name" value="{{$data->category_name}}" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary px-4">Update Category</button>
        </form>
        <br>
        <a href="{{route('category.index')}}" class="btn btn-primary">Categories</a>
    </div>
@endsection