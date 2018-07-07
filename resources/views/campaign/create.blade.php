@extends('profile.master')

@section('content')
    <div class="container">
    <form class="" action="{{route('campaign.store')}}" method="post">
        {{csrf_field()}}
        <h2> Buat Campaign </h2>
        
        <div class="form-group">
            <label>Judul</label>
            <input type="text" class="form-control" name="title" placeholder="Judul">
        </div>

        <div class="form-group">
            <label>Target Donasi</label>
            <input type="number" class="form-control" name="target" placeholder="Target Donasi">
        </div>

        <div class="form-group">
                <label>Konten</label>
                <textarea class="form-control" row="5" name="content" placeholder="Konten"></textarea>
        </div>

        <div class="form-group">
                <label>Deadline</label>
                <input type="date" class="form-control" name="deadline" placeholder="Deadline">
        </div>

        <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Kirim Campaign">
                
        </div>

        </form>    
    </div>
@endsection