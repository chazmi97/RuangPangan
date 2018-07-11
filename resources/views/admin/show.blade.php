@extends('admin.adminmaster')

@section('content')
<div class="container">
    <h3>{{$campaign->title}}</h3>
    <p>{{$campaign->content}}</p>
    <p>Target donasi terkumpul: {{$campaign->target}}</p>
</div>


@endsection
