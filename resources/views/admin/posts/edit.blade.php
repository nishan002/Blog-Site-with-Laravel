@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header"><h3 style="text-align: center">Edit Post</h3></div>
        <div class="card-body">
            <form action="{{route('post.update',['id'=> $post->id])}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                @method('put')

                <div class="form-group">
                    <label for="title">Title</label>
                    <input id="title" type="text" name="title" class="form-control" value="{{$post->title}}">
                </div>
                <div class="form-group">
                    <label for="fi">Featured Image</label>
                    <input id="fi" type="file" name="featured" class="form-control">
                </div>
                <div class="form-group">
                    <label for="category">Select Category</label>
                    <select name="category_id" id="category" class="form-control">
                        <option value="">{{$post->category->name}}</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}"
                                @if($post->category->id == $category->id)
                                    selected
                                @endif
                            >{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="from-group">
                    <label for="tags">Tags</label>
                    @foreach($tags as $tag)
                        <div class="checkbox">
                            <label><input type="checkbox" name="tags[]" value="{{$tag->id}}"
                                @foreach($post->tags as $t)
                                    @if($tag->id == $t->id)
                                        checked
                                    @endif
                                @endforeach
                                > {{$tag->tag}}</label>
                        </div>
                    @endforeach
                </div>
                <div class="form-group">
                    <label for="content">content</label>
                    <textarea class="form-control" name="content" id="" cols="5" rows="5"></textarea>
                </div>
                <div class="form-group">
                    <input class="btn btn-primary" type="submit" value="Submit">
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
