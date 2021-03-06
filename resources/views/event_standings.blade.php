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
            <th>Image</th>
            <th>Vote Count</th>
            <th></th>
            </thead>
            <tbody>
            @foreach($result as $value)
                <tr>
                <td>{{$value->name}}</td>
                <td><img src="<?php echo asset("images/$value->image_url")?>"></img></td>
                <td class="vote_count">{{$value->votes_count}}</td>
                <td data-image="{{$value->id}}"><button type="submit" class="btn btn-success set_vote" name="set_vote"
                            value="upd">
                        <span class="glyphicon glyphicon-thumbs-up"></span>
                    </button></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
            </div>
        </div>
    </div>

    <script type='text/javascript' src="{{asset('js/event_standings.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/event_standings.css')}}">

@endsection