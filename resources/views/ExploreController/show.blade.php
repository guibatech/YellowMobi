@extends('template')

@section('title')
Explore
@endsection

@section('body')

    @include('Components.header')

    @csrf

@endsection

@section('scripts')

    @vite('resources/js/explore.js')

@endsection
