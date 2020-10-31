@extends('layouts.adminLayout')
@section('content')
   <div class="container d-flex justify-content-sm-between">
   <div>
       
        <h2><b> {{$job->title}}</b></h2>
        <p>Publisher: <b> {{$job->user->name}}</b> </p>

        <p>Fields: <br>
            @foreach($job->categories as $cat)
                <b>{{$cat->name}}</b>
            @endforeach
        </p>

        <p>Skills: <br>
            @foreach($job->skills as $skill)
            <b>{{$skill->name}}</b> <br>
                
            @endforeach
        </p>

        <p>logo here</p>
        <p>Schedule: <b>{{$job->schedule}}</b> </p>
        <p>Description: <br> {{$job->description}}</p>
        <p>Created On: <b>{{$job->added_on}}</b> </p>
        <p>DeadLine: <b> {{$job->end_on}}</b> </p>
   </div>
        <div class="mt-3">
            <img src="/uploads/{{$job->logo}}" width="400">
        </div>
   </div>
@endsection