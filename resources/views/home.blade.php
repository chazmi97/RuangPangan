@extends('profile.master')

@section('content')
<div class="container">
  <ol class="breadcrumb">
    <li><a href="{{url('/home')}}">Home  /</a></li>
    <!-- <li class="active">Data</li> -->
  </ol>


    <div class="row">

            @include('profile.sidebar')
            <!-- <div class="col-md-3">
                <div class="card-header">SideBar</div>
            </div>
             -->
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
