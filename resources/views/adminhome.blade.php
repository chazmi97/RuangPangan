@extends('admin.adminmaster')

@section('content')

    <div class="card">
            <div class="card-header no-border">
            <h3 class="card-title">Campaign</h3>
           
            </div>
            <div class="card-body p-0">
            <table class="table table-striped table-valign-middle">
                <thead>
                <tr>
                <th>Judul Campaign</th>
                <th>Target</th>
                <th>Deskripsi</th>
                <th>Pilihan</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($campaign as $campaign)
                    <tr>
                            <td>
                                    {{$campaign->title}}
                                </td>
                                <td>{{$campaign->target}}</td>
                                <td>
                                <a href="{{route('admin.show', $campaign->id)}}">Deskripsi</a>
                                </td>
                                <td>
                                    <form class="" action="{{route('campaign.approve', $campaign->id)}}" method="post">
                                    {{csrf_field()}}
                                        <button class="btn btn-xs btn-primary">Accept</button>
                                    </form>
                                    <form class="" action="{{route('campaign.decline', $campaign->id)}}"  method="post">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                        <button class="btn btn-xs btn-warning">Decline</button>
                                    </form>
                                </td>
                                </tr>

                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
    
@endsection