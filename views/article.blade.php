@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-12" style="height: 350px; background-image: url('/images/{{$article['images']}}'); object-fit: cover;">
        </div>
        <div class="col-md-12" style="padding-left: 120px; padding-right: 120px">
            <h1><span style="padding-top: 60px;">{{ $article['title'] }}</span></h1>
            {!! $article['body'] !!}
        </div>
    </div>

@endsection
