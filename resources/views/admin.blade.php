@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">


            <div class="col-md-12">
                <div class="table-responsive table-bordred main" id="main">
                    <label id="labelContent"></label>
                    <table id="mainTable" class="table table-bordred table-striped table-hover table-condensed">
                        <thead>
                        <th>Nickname</th>
                        <th>Role</th>
                        <th>Image</th>
                        <th>Active</th>
                        </thead>
                        <tbody>
                        @foreach($result as $value)
                            <tr>
                                <td>{{$value->name}}</td>
                                <td>{{$value->role}}</td>
                                <td><img src="<?php echo asset("images/$value->image_url")?>"></img></td>
                                <td data-id="{{$value->id}}" class="active">
                                        <label>
                                            @if ($value->active == '1')
                                                <input type="checkbox" name="play" checked="">
                                                <span></span>
                                            @else
                                                <input type="checkbox" name="play">
                                                <span></span>
                                            @endif
                                        </label>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script type='text/javascript' src="{{asset('js/admin.js')}}"></script>
    {{--<link rel="stylesheet" href="{{asset('css/event_standings.css')}}">--}}

@endsection