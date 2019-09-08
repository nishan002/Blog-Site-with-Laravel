@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header"><h3 style="text-align: center">Edit Blog Setting</h3></div>
        <div class="card-body">
            <form action="{{route('settings.update')}}" method="post">
                {{csrf_field()}}

                <div class="form-group">
                    <label for="site_name">Site Name</label>
                    <input id="site_name" type="text" name="site_name" class="form-control" value="{{ $settings->site_name }}">
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input id="address" type="text" name="address" class="form-control" value="{{ $settings->address }}">
                </div>
                <div class="form-group">
                    <label for="contact_number">Contact Number</label>
                    <input id="contact_number" type="text" name="contact_number" class="form-control" value="{{$settings->contact_number}}">
                </div>
                <div class="form-group">
                    <label for="contact_email">Contact Email</label>
                    <input id="contact_email" type="text" name="contact_email" class="form-control" value="{{$settings->contact_email}}">
                </div>
                <div class="form-group">
                    <input class="btn btn-primary" type="submit" value="Update site setting">
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
