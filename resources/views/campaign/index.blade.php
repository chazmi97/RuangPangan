@extends('profile.master')

@section('content')
<div class="col-md-12">
    <div class="col-md-12" align="center">
        <div class="card-body">
                <div class="panel panel-default">
                    <a href="{{url('/campaign/create')}}"><button class="btn btn-xs btn-primary"> Buat campaign baru</button></a>
                </div>
        </div>
    </div>

    @foreach($campaign->sortByDesc('created_at') as $post) 
    <div class="container">           
        <div class="col-md-8">
            <div class="card">
                <div class="panel panel-default">
                    <div class="container">
                        <div class="panel-heading">
                            <h3>{{$post->title}}</h3>
                        </div>
                        <div class="panel-body">
                            <p>Perkiraan kebutuhan: {{$post->target}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection