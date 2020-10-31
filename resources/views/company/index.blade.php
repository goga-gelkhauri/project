@extends('layouts.adminLayout')
@section('content')
    <div class="container">
   
        <table class="table table-dark mt-3">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    @auth
                    <th scope="col">Action</th>
                    @endauth
                </tr>
            </thead>
            <tbody>
            @foreach($companies as $company)
                
                @if(isset($user->id) && $user->id == $company->id)
                    @continue
                @endif
                    <tr>
                        <td><a href="/company/{{$company->id}}">{{$company->name}}</a></td>
                        @auth
                        <td>
                        @if(Helper::Follows($company->id) > 0)
                        <a href="/unfollow/{{$company->id}}" class="btn btn-primary">Unfollow</a>
                        @else
                        <a href="/follow/{{$company->id}}" class="btn btn-primary">Follow</a>
                        @endif
                        <a href="/addCompanyBookmark/{{$company->id}}"><img width="20" src="images/bookmark.svg" alt=""></a>
                        @endauth
                        </td>
                    </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection