@extends('layouts.adminLayout')
@section('content')
   <div class="container">
        <div>
            <h2><b> {{$company->name}}</b></h2> <br>
            <h2>Jobs</h2>
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
            @foreach($company->jobs as $job)
                <tr>
                    <td>{{$job->title}}</td>
                    <td>{{$job->user->name}}</td>
                    <td>
                        <img src="/uploads/{{$job->logo}}" width="80" alt="">
                    </td>
                    <td>
                        <a href="/show/job/{{$job->id}}" class="btn btn-success">Show</a>
                       
                    </td>
                </tr>
            @endforeach
            </tbody>
        </div>
   </div>
@endsection