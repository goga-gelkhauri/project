@extends('layouts.adminLayout')
@section('content')
    <div class="container">
    <a href="/skills/create" class="btn btn-success float-right my-2">Add Skill</a>
        <table class="table table-dark mt-3">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($skills as $skill)
                <tr>
                    <th scope="row">{{$skill->id}}</th>
                    <td>{{$skill->name}}</td>
                    <td>
                        <a href="/skills/{{$skill->id}}/edit" class="btn btn-warning">Edit</a>

                        <form action="/skills/{{$skill->id}}" method="POST">
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