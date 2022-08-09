@extends('index')

@section('content')
    <div class="container">
        <p>{{session('success')}}</p>
        <h2 class="mb-4">Subcategories</h2>
        <table class="table table-borderless table-bordered text-center">
            <thead>
                <tr>
                    <th>Serial</th>
                    <th>Category Name</th>
                    <th>Category Slug</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($data as $key => $row)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $row->category_name }}</td>
                    <td>{{ $row->category_slug }}</td>
                    <td>
                        <a href="{{route('category.edit', $row->id)}}"><i class="bi bi-pencil-square"></i></a>
                        <form action="{{route('category.destroy', $row->id)}}" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a href="{{route('category.create')}}" class="btn btn-primary">Add Category</a>
    </div>
@endsection