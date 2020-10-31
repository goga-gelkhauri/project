@extends('layouts.adminLayout')
@section('content')
    <div class="container">
        <form method="get" action="/jobs/search">
            <div class="form-group">
                <label for="name">enter name</label>
                <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Enter Name">
            </div>
            <div class="form-group">
                <label for="skills">Enter Skills</label>
                <select class="form-control" multiple name="skills[]" id="skills">
                @foreach($skills as $skill)
                    <option value="{{$skill->name}}">{{$skill->name}}</option>
                @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="categories">Enter Category</label>
                <select class="form-control" multiple name="categories[]" id="categories">
                @foreach($categories as $category)
                    <option value="{{$category->name}}">{{$category->name}}</option>
                @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
        @auth
        <a href="/jobs/create" class="btn btn-success float-right my-2">Create Job</a>
        @endauth
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
                        <a href="/show/job/{{$job->id}}" class="btn btn-success">Show</a>
                       <a href="/addBookmark/{{$job->id}}"><img width="20" src="images/bookmark.svg" alt=""></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection