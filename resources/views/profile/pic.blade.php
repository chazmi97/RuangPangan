@extends('profile.master')

@section('content')
<div class="container">
  <ol class="breadcrumb">
    <li><a href="{{url('/home')}}">Home</a></li>
    <li><a href="{{url('/profile')}}/{{Auth::user()->slug}}">/  Profile </a></li>
    <li><a href="{{url('/editProfile')}}">/ editProfile </a></li>

    <li><a href="">/ Ubah Gambar </a></li>

    <!-- <li class="active">Data</li> -->
  </ol>



    <div class="row justify-content-center">
            @include('profile.sidebar')
            <!-- <div class="col-md-3">
                <div class="card-header">SideBar</div>
            </div> -->

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{Auth::user()->name}}</div>

                <h3 align="center">Ubah Gambar</h3>

                <div class="card-body">


                  <!-- <div class="col-md-8">
                      <div class="card">
                          <div class="card-header">{{Auth::user()->name}}</div>

                          <div class="card-body">
                              @if (session('status'))
                                  <div class="alert alert-success">
                                      {{ session('status') }}
                                  </div>
                              @endif -->


                              <img src="{{url('../')}}/public/img/{{Auth::user()->pic}}" width="80px" height="80px" class="img-circle ctr"/><br>
                              <!-- <a href="{{url('/')}}/changePhoto" >Ubah Gambar</a> -->


                              <!-- <div class="col-md-12">
                                <div class="input-group">
                                  <span class="input-group-addon" id="basic-addon1">@</span>
                                  <input type="text" class="form-control" placeholder="Username" aria-describedby="basic-addon1" name="" value="">

                                </div>

                              </div> -->

                          </div>

                    <form action="{{url('/')}}/uploadPhoto" method="post" enctype="multipart/form-data">

                      <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                      <input type="file" name="pic" class="form-control"/>
                      <button type="submit" class="btn btn-success" name="btn"/>
                          Upload
                      </button>

                    </form>

                    <!-- <a href="{{url('/')}}/changePhoto" >Ubah Gambar</a> -->

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
