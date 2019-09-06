@extends('layouts.app')

@section('content')
    <table class="table table-hover">
        <thead>
            <th>Category Name</th>
            <th>Editing</th>
            <th>Deleting</th>
        </thead>
        <tbody>
        @if($categories->count()>0)
            @foreach($categories as $category)
                <tr>
                    <td>{{$category->name}}</td>
                    <td><a class="btn btn-xs btn-info" href="{{route('category.edit',['id'=> $category->id])}}"><span class="glyphicon glyphicon-pencil" ></span></a></td>
                    <td><a class="btn btn-xs btn-danger" href="{{route('category.delete',['id'=> $category->id])}}"><span class="glyphicon glyphicon-delete" ></span></a></td>
                </tr>
            @endforeach
        @else
            <tr>
                <th colspan="5" class="text-center" >No Categories</th>
            </tr>
        @endif
        </tbody>
    </table>

@stop
