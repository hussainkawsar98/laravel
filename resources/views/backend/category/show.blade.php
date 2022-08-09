@extends('index')

@section('content')
    <div class="container">
        <ul>
            <li>Category Name : {{ $data->category_name }}</li>
            <li>Category Slug : {{ $data->category_slug }}</li>
            <li>Action : <a href="{{route('category.edit', $data->id)}}"><i class="bi bi-pencil-square"></i></a>
                            <a href="{{route('category.destroy', $data->id)}}"><i class="bi bi-trash3"></i></a></li>
        </ul>     
    </div>
@endsection