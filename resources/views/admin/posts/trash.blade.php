@extends('layouts.app')

@section('content')
    <table class="table table-hover">
        <thead>
        <th>Image</th>
        <th>Post</th>
        <th>Editing</th>
        <th>Restore</th>
        <th>Delete_Permanently</th>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr>
                <td><img height="25px" src="../{{$post->featured}}" alt=""></td>
                <td>{{$post->title}}</td>
                <td><a class="btn btn-xs btn-info" href="{{route('post.edit',['id'=> $post->id])}}">Edit</a></td>
                <td><a class="btn btn-xs btn-success" href="{{route('post.delete',['id'=> $post->id])}}">Restore</a></td>
                <td><a class="btn btn-xs btn-danger" href="{{route('post.kill',['id'=> $post->id])}}">Delete</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>

@stop
