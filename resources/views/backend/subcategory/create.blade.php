@extends('index')

@section('content')
<div class="container">
    <h2 class="text-center">Add Subcategory</h2>
        <p style="color:green">{{session('success')}}</p>
    <ul>
    @foreach ($errors->all() as $error)
        <li style="color:red">{{ $error }}</li>
    @endforeach
    </ul>
    <form action="{{ route('category.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Subcategory Name </label>
            <input type="text" name="category_name" class="form-control" placeholder="Write Category">
        </div>
        <button type="submit" class="btn btn-primary px-4">Save</button>
    </form>
    <a href="{{url('backend/category')}}" class="btn btn-primary w-25 d-block mt-4">Catagories</a>
</div>
@endsection