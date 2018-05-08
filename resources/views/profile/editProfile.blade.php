@extends('profile.master')

@section('content')


<div class="container">
  <ol class="breadcrumb">
    <li><a href="{{url('/home')}}">Home</a></li>
    <li><a href="{{url('/profile')}}/{{Auth::user()->slug}}">/  Profile </a></li>
    <li><a href="">/ editProfile </a></li>
  </ol>



    <div class="row justify-content-center">
      @include('profile.sidebar')
      <!-- <div class="col-md-3">
          <div class="card-header">SideBar</div>
      </div> -->

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{Auth::user()->name}}</div>

                <div class="panel-body">
                  <div class="row">
                    <div class="col-sm-6 col-md-12">
                      <div class="thumbnail">
                        <div class="card">

                      <h3 align="center"> {{ucwords(Auth::user()->name)}}</h3>
                      <div class="container ">
                      <img src="{{url('../')}}/public/img/{{Auth::user()->pic}}" width="100px" height="100px" class="img-circle ctr"/>
                      </div>

                      <div class="caption">
                        <p align="center">{{$data->city}} - {{$data->country}}</p>
                        <p align="center"><a href="{{url('/')}}/changePhoto" class="btn btn-primary" role="button">Ubah Gambar</a></p>
                      </div>
                    </div>
                  </div>

                </div>


                <div class="col-sm-6 col-md-12">
                                  <span class="label label-default"> Update Profile</span>
                                  <br>

<form action="{{url('/updateProfile')}}" method="post">
  <input type="hidden" name="_token" value="{{csrf_token()}}"/>





                  <div class="col-md-12">

                  <div class="input-group">
                    <span class="card-header" id="basic-addon1">City Name</span>
                    <input type="text" class="form-control col-md-12" placeholcard-headeria-describedby="basic-addon1" name="city">
                  </div>
                  <br>

                  <div class="input-group">
                    <span class="card-header" id="basic-addon1">Coutry Name</span>
                    <input type="text" class="form-control" placeholcard-headeria-describedby="basic-addon1" name="country">
                  </div>
                  <br>



                  <div class="input-group">
                    <span class="card-header" id="basic-addon1">About</span>
                    <textarea type="text" class="form-control" rows="7" name="about"></textarea>
                  </div>
                </div>
                <br>

                <div class="input-group">
                  <input type="submit" class="btn btn-success pull-right">
                </div>


                </div>
</form>
            </div>
        </div>
    </div>
  </div>
</div>
</div>
@endsection
