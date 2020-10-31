@extends('layouts.adminLayout')
@section('content')
    <div class="container">
        <a href="/categories/create" class="btn btn-success float-right my-2">Add Category</a>
        <table class="table table-dark mt-3">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <th scope="row">{{$category->id}}</th>
                    <td>{{$category->name}}</td>
                    <td>
                        <a href="/categories/{{$category->id}}/edit" class="btn btn-warning">Edit</a>

                        <form action="/categories/{{$category->id}}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                       
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection