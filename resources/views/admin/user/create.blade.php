@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header"><h3 style="text-align: center">Create User</h3></div>
        <div class="card-body">
            <form action="{{route('user.store')}}" method="post">
                {{csrf_field()}}

                <div class="form-group">
                    <label for="name">User Name</label>
                    <input id="name" type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <input class="btn btn-primary" type="submit" value="Create User">
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
