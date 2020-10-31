@extends('layouts.adminLayout')
@section('content')
    <div class="container">
        <a href="/jobs/create" class="btn btn-success float-right my-2">Create Job</a>
        <table class="table table-dark mt-3">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Publisher</th>
                    <th scope="col">Image</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($jobs as $job)
                <tr>
                    <td>{{$job->title}}</td>
                    <td>{{$job->user->name}}</td>
                    <td>
                        <img src="/uploads/{{$job->logo}}" width="80" alt="">
                    </td>
                    <td>
                        <a href="/jobs/{{$job->id}}" class="btn btn-success">Show</a>
                        <form action="/jobs/{{$job->id}}" method="POST">
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