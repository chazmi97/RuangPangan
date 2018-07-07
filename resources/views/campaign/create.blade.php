@extends('layouts.app')

@section('content')
    <div class="container">
    <form class="" action="{{route('store')}}" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <label>Judul</label>
            <input type="text" class="form-control" name="title" placeholder="Judul">
        </div>

        <div class="form-group">
                <label>Konten</label>
                <textarea class="form-control" row="5" name="content" placeholder="Konten"></textarea>
        </div>

        <div class="form-group">
            <label>Target Donasi</label>
            <input type="number" class="form-control" name="target" placeholder="Isi nominal target donasi">
        </div>

        <div class="form-group">
                <label>Deadline</label>
                <input type="date" class="form-control" name="deadline" placeholder="Deadline">
        </div>

        <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Save">
                
        </div>
        </form>    
    </div>
@endsection