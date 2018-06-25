@extends('profile.master')

@section('content')


<div class="container">
  <ol class="breadcrumb">
    <li><a href="{{url('/home')}}">Home  /</a></li>
    <li><a href="{{url('/profile')}}/{{Auth::user()->slug}}">Profile </a></li>
    <!-- <li class="active">Data</li> -->
  </ol>

    <div class="row justify-content-center">

      @include('profile.sidebar')
            <!-- <div class="col-md-3">
                <div class="card-header">SideBar</div>
            </div> -->


        @foreach($userData as $uData)
        {{$uData->user_id}}

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$uData->name}}</div>

                <div class="panel-body">
                  <div class="row">
                    <div class="col-sm-6 col-md-4">
                      <div class="thumbnail">
                        <div class="card">

                        <h3 align="center"> {{$uData->name}}</h3>
                        <div class="container">
                        <img src="{{url('../')}}/public/img/{{$uData->pic}}" width="100px" height="100px" class="img-circle ctr"/>
                    </div>
                        <div class="caption">
                          <!-- <img src="{{url('../')}}/public/img/{{Auth::user()->pic}}" width="80px" height="80px class="img-circle"/> -->

                          <p align="center">{{$uData->city}} - {{$uData->country}}</p>
                          @if($uData->id == Auth::user()->id)
                          <p align="center"><a href="{{url('/editProfile')}}"
                            class="btn btn-primary" role="button">Edit Profile</a></p>
                            @endif
                        </div>
                      </div>
                    </div>
                  </div>


                  <div class="col-sm-6 col-md-4">
                    <h4 class=""><span class="label label-default">About</span></h4>
                    <p> {{$uData->about}}</p>
                  </div>

                </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
