@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header"><h3 style="text-align: center">Update User</h3></div>
        <div class="card-body">
            <form action="{{route('user.profile.update')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}

                <div class="form-group">
                    <label for="name">User Name</label>
                    <input id="name" type="text" name="name" class="form-control" value="{{ $user->name }}" >
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" name="email" class="form-control" value="{{$user->email}}" >
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" type="password" name="password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="avatar">Upload image</label>
                    <input id="avatar" type="file" name="avatar" class="form-control">
                </div>
                <div class="form-group">
                    <label for="facebook">Facebook Profile</label>
                    <input id="facebook" type="text" name="facebook" class="form-control" value="{{ $user->profile->facebook }}">
                </div>
                <div class="form-group">
                    <label for="youtube">Youtube Profile</label>
                    <input id="youtube" type="text" name="youtube" class="form-control" value="{{ $user->profile->youtube }}">
                </div>
                <div class="form-group">
                    <label for="about">About you</label>
                    <textarea class="form-control" name="about" id="about" cols="6" rows="6" value="{{ $user->profile->about }}"></textarea>
                </div>
                <div class="form-group">
                    <input class="btn btn-primary" type="submit" value="Update User">
                </div>
            </form>
        </div>

        @if(count($errors)>0)
            <ul class="list-group">
                @foreach($errors->all() as $error)
                    <li class="list-group-item text-danger">
                        {{$error}}
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@stop
