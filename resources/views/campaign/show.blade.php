@extends('profile.master')

@section('content')
    <div class="container">           
        <div class="col-md-8">
            <div class="card">
                <div class="panel panel-default">
                    <div class="container">
                        <div class="panel-heading">
                            <h3>{{$campaign->title}}</h3>
                        </div>
                        <div class="panel-body">
                            <p>{{$campaign->content}}</p>
                            <p>Perkiraan kebutuhan: {{$campaign->target}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection