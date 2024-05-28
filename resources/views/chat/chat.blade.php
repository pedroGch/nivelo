@extends('layouts.main')

@section('title', 'Blog de nivelo, noticias de accesibilidad')


@section('header')

<x-NavbarTop/>

@endsection

@section('content')

<section class="container margin-navs">
  <div class="container custom-container">
    @livewire('chat-component', ['chat_id' => $chat_id])
  </div>


</section>

@endsection

@section('footer')

<x-NavbarBottom/>

@endsection
