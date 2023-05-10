@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        @foreach($data as $d)
         {!! $d !!}
        @endforeach
    </div>
@endsection
