@extends('layouts.app')

@section('content')
    <table class="table table-hover">
        <thead>
        <th>Image</th>
        <th>Post</th>
        <th>Category</th>
        <th>Editing</th>
        <th>Trash</th>
        </thead>
        <tbody>
        @if($posts->count() > 0)
            @foreach($posts as $post)
                <tr>
                    <td><img height="40px" width="60px" src="../{{$post->featured}}" alt=""></td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->category->name}}</td>
                    <td><a class="btn btn-xs btn-info" href="{{route('post.edit',['id'=> $post->id])}}">Edit</a></td>
                    <td><a class="btn btn-xs btn-danger" href="{{route('post.delete',['id'=> $post->id])}}">Trash</a></td>
                </tr>
            @endforeach
        @else
            <tr>
                <th colspan="5" class="text-center" >No published post</th>
            </tr>
         @endif
        </tbody>
    </table>

@stop
