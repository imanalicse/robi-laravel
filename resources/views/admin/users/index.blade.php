@extends('layouts.app')

@section('content')
    <users token="{{Auth::user()->api_token}}"></users>
@endsection
