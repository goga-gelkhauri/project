@extends('layouts.adminLayout')
@section('content')
    <div class="container">
        <form action="/jobs" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Enter Job title">
            </div>
            <div class="form-group">
                <label for="skills">Skills(press ctrl to select multiple)</label>
                <select multiple class="form-control" id="skills" name="skills[]">
                    @foreach($data['skills'] as $skill)
                        <option value="{{$skill->id}}">{{$skill->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="categories">Categories(press ctrl to select multiple)</label>
                <select multiple class="form-control" id="categories" name="categories[]">
                    @foreach($data['categories'] as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="schedule">Work Schedule</label>
                <input type="text" name="schedule" class="form-control" id="schedule" placeholder="Enter Schedule ex(10.00-18.00)">
            </div>
            <div class="form-group">
                <label for="added_on" class="col-2 col-form-label">start time</label>
                <input class="form-control" name="added_on" type="datetime-local" value="2020-08-19T13:45:00" id="added_on"> 
            </div>
            <div class="form-group">
                <label for="end_on" class="col-2 col-form-label">end time</label>
                <input class="form-control" name="end_on" type="datetime-local" value="2020-08-19T13:45:00" id="end_on"> 
            </div>
            <div class="form-group">
                <label for="description" class="col-2 col-form-label">description</label>
                <textarea class="form-control" name="description" id="description" cols="30" rows="10"></textarea>
            </div>

            <div class="form-group">
                <label for="image" class="col-2 col-form-label">image</label>
                <input class="form-control" accept="image/*" name="logo" type="file" id="image"> 
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
        </form>
        @if($errors->any())
            @foreach ($errors->all() as $error)
                <div style="color:red;">{{ $error }}</div>
            @endforeach
        @endif
    </div>
@endsection