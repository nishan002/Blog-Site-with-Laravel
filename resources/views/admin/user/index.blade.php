@extends('layouts.app')
@section('content')
    <table class="table table-hover">
        <thead>
        <th>Image</th>
        <th>Name</th>
        <th>Permission</th>
        <th>Delete</th>
        </thead>
        <tbody>
        @if($users->count() > 0)
            @foreach($users as $user)
                <tr>
                    <td><img src="../{{ $user->profile->avatar }}" height="30px" width="30px" border-radius="50%" alt=""></td>
                    <td>{{$user->name}}</td>
                    <td>
                        @if($user->admin)
                            <a href="{{ route('user.not.admin',['id'=>$user->id]) }}" class="btn btn-xs btn-danger" >Remove Permission</a>
                        @else
                            <a href="{{ route('user.admin',['id'=>$user->id]) }}" class="btn btn-xs btn-success" >Make Admin</a>
                        @endif
                    </td>
                    <td>
                        @if(Auth::id() !== $user->id)
                            <a class="btn btn-xs btn-danger" href="{{route('user.delete',['id'=> $user->id])}}">Delete</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <th colspan="5" class="text-center" >No User</th>
            </tr>
        @endif
        </tbody>
    </table>
@stop
