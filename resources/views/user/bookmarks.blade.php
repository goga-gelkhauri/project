@extends('layouts.adminLayout')
@section('content')
    <div class="container">
        <h1>Job Bookmarks</h1>
        <table class="table table-dark mt-3">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($user->bookmarks as $bookmark)
                <tr>
                    <td>{{$bookmark->name}}</td>
                    <td><a href="/deleteBookmark/{{$bookmark->id}}" class="btn btn-danger">delete</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <h1>Company Bookmarks</h1>
        <table class="table table-dark mt-3">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($user->companybookmarks as $bookmark)
                <tr>
                    <td>{{$bookmark->name}}</td>
                    <td><a href="/deleteCompanyBookmark/{{$bookmark->id}}" class="btn btn-danger">delete</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection