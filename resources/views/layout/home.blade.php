@extends('layout.template')
@section('title','Home')

@section('content')
    <h1>Selamat Datang</h1>
    <h3>Nama            :  {{ Auth::user()->name }}</h3>
    <h3>Email           :  {{ Auth::user()->email }}</h3>
@endsection
