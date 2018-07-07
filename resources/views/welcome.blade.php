<html lang="en">
    <head>
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Ruang Pangan</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        
        <style>
            html, body {
                background-color: #ddd;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                margin: 0;
            }
            .top_bar{
              position:relative; width:99%; top:0; padding:5px; margin:0 5
            }
            .full-height {
              margin-top:50px
            }
            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }
            .position-ref {
                position: relative;
            }
            .top-right {
                position: absolute;
                right:5px; top:15px
            }
            .top-left {
                position: absolute;
                width:40%

            }
            .content {
                text-align: center;
            }
            .title {
                font-size: 84px;
            }
            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            .m-b-md {
                margin-bottom: 30px0;
            }
            .head_har{
              background-color: #f6f7f9;
                    border-bottom: 1px solid #dddfe2;
                    border-radius: 2px 2px 0 0;
                    font-weight: bold;
                    padding: 8px 6px;

            }
            .left-sidebar, .right-sidebar{
              background-color:#fff;
              height:600px;

            }
            .posts_div{margin-bottom:10px !important;}
            .posts_div h3{
              margin-top:4px !important;

            }
            #postText{
              border:none;
              height:100px
            }
            .likeBtn{
              color: #4b4f56; font-weight:bold; cursor: pointer;
            }
            .left-sidebar li { padding:10px;
              border-bottom:1px solid #ddd;
            list-style:none; margin-left:-20px}
            .dropdown-menu{min-width:120px; left:-30px}
            .dropdown-menu a{ cursor: pointer;}
            .dropdown-divider {
              height: 1px;
              margin: .5rem 0;
              overflow: hidden;
              background-color: #eceeef;}
              .user_name{font-size:18px;
               font-weight:bold; text-transform:capitalize; margin:3px}
              .all_posts{background-color:#fff; padding:5px;
               margin-bottom:15px; border-radius:5px;
                -webkit-box-shadow: 0 8px 6px -6px #666;
  	            -moz-box-shadow: 0 8px 6px -6px #666;
  	             box-shadow: 0 8px 6px -6px #666;}
                #commentBox{
                  background-color:#ddd;
                  padding:10px;
                  width:99%; margin:0 auto;
                  background-color:#F6F7F9;
                  padding:10px;
                  margin-bottom:10px
                }
                #commentBox li { list-style:none; padding:10px; border-bottom:1px solid #ddd}
                .commet_form{ padding:10px; margin-bottom:10px}
                .commentHand{color:blue}
                .commentHand:hover{cursor:pointer}
                .upload_wrap{
                  position:relative;
                  display:inline-block;
                  width:100%
                }
                .center-con{
                  max-height:600px;
                  position: absolute;
                  left:calc(25%);
                  overflow-y: scroll;
                }
                @media (min-width: 268px) and (max-width: 768px) {

                  .center-con{
                    max-height:600px;
                    position: relative;
                    left:0px;
                    overflow-y: scroll;
                  }
                }


        </style>

    </head>
    <body>
<div id="app">
<div class="top_bar" >

      <div class="top-left links" style="float:left">
            <div class="container">
                <h3>{{ config('app.name', 'Laravel') }}</h3>
            </div>
      </div>

          <div class="top-right links" style="float:right">
              @if (Auth::check())
                <a href="{{ url('/home') }}">Dashboard
                (<span style="text-transform:capitalize;
                color:green">{{ucwords(Auth::user()->name)}}</span>)</a>
                    <a href="{{ url('/logout') }}">Logout</a>
              @else
                  <a href="{{ url('/login') }}">Login</a>
                  <a href="{{ url('/register') }}">Register</a>
              @endif
          </div>

    </div>

<div class="flex-center position-ref full-height">



  <div class="col-md-12 "  >
@if(Auth::check())
    <!-- left side start -->
    <div class="col-md-3 left-sidebar hidden-xs hidden-sm" style="position:fixed; left:10px">

     <ul>
       <li>
         <a href="{{ url('/profile') }}/{{Auth::user()->slug}}"> <img src="{{url('../')}}/public/img/{{Auth::user()->pic}}"
         width="32" style="margin:5px"  />
         {{Auth::user()->name}}</a>
       </li>
       <li>
         <a href="{{url('/')}}"> <img src="{{ ('img/feed.png ') }}"
                 width="32" style="margin:5px"  />
                 Berita Terbaru</a>
       </li>
       <li>
         <a href="{{url('/friends')}}"> <img src="{{ ('img/teman.png ') }}"
         width="32" style="margin:5px"  />
         Teman </a>
       </li>
       <li>
         <a href="{{url('/campaign')}}"> <img src="{{Config::get('app.url')}}/public/img/msg.png"
         width="32" style="margin:5px"  />
        Campaign</a>
       </li>
       <li>
         <a href="{{url('/findFriends')}}"> <img src="{{ ('img/FF.png ') }}"
         width="32" style="margin:5px"  />
        Temukan Teman</a>
       </li>

       <li>
       </li>
     </ul>


    </div>
    <!-- left side end -->

    <!-- center content start -->
    <div class="col-md-6 col-sm-12 col-xs-12 center-con">
            <form class="" action="{{route('store')}}" method="post">
                    {{csrf_field()}}
                    
                    <div class="form-control">
                        <label for="">Status Baru:</label>
                        <textarea name="content" class="form-control"></textarea>

                    </div>
                    
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Post">
                    </div>

                    @foreach($posts as $post)
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
                            
                            
                    
                            <div class="form-group">
                                <p class="likeBtn"><i class="fa fa-thumbs-up"></i> Like</p>
                                
                            </div>
                        </div>
                        
                    </div>
                    
                @endforeach
                </form>
                
                
        </div>

       </div>
        </div>
    <!-- center content end -->

    <!-- right side start -->
    

    </div>
    <!-- right side end -->
    @else


    <h1 align="center">
      <img src="{{ ('img/RP.png ') }}"
        width="256" style="margin:5px"  />
    </h1>
    <br>
<h2 align="center">Silahkan Masukan Akun Anda</h2>
</br>

@endif
  </div>

</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!--
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/botstrap.min.js"></script>

<script src="{{asset('/js/like.js')}}"></script>-->
    </body>
</html>
