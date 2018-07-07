@extends('profile.master')

@section('content')

<div class="row">

    @include('profile.sidebar')
    
<div class="col-md-8">
    <div class="container">
        <div class="col-md-12" style="background-color:#fff">
            <div class="col-md-2 pull-left">
                <img src="{{url('../')}}/public/img/{{$post->pic}}" style="width:50px; margin:5px">
            </div>
        
        <div class="col-md-10">
            <h3>{{ucwords($post->name)}}</h3>
            <p> <i class=""fa fa-globe></i>
                {{ucwords($post->city)}}, {{ucwords($post->country)}}</p>
        </div>
        <p class="col-md-12" style="color:#333"> {{$post->content}} </p>
        <p class="likeBtn">
                <i class="fa fa-thumbs-up"></i>Like
            </p>
        <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Komentar">
            </div>
        </div>
        
    </div>
</div>
</div>


@endsection
