@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header"><h3 style="text-align: center">Edit Tag</h3></div>
        <div class="card-body">
            <form action="{{route('tag.update',['id'=>$tag->id])}}" method="post">
                {{csrf_field()}}
                @method('put')
                <div class="form-group">
                    <label for="tag">Title</label>
                    <input id="tag" type="text" name="tag" class="form-control">
                </div>
                <div class="form-group">
                    <input class="btn btn-primary" type="submit" value="Update">
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
