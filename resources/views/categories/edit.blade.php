@extends('layouts.adminLayout')
@section('content')
    <div class="container">
        <form action="/categories/{{$category->id}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" value="{{$category->name}}" name="name" class="form-control" id="name" placeholder="Enter category name">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection