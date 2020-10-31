@extends('layouts.adminLayout')
@section('content')
    <div class="container">
        <a href="/jobs/create" class="btn btn-success float-right my-2">Create Job</a>
        <table class="table table-dark mt-3">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Publisher</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($jobs as $job)
                <tr>
                    <td>{{$job->title}}</td>
                    <td>{{$job->user->name}}</td>
                    <td>
                        <a href="/show/job/{{$job->id}}" class="btn btn-success">Show</a>
                       
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection