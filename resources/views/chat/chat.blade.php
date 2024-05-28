@extends('layouts.main')

@section('title', 'Blog de nivelo, noticias de accesibilidad')


@section('header')

<x-NavbarTop/>

@endsection

@section('content')

<section class="container margin-navs">
  <div class="container custom-container">
    @if (isset($chat_id))
      @livewire('chat-component', ['chat_id' => $chat_id])
    @else
      @livewire('chat-component')
    @endif
  </div>


</section>

@endsection

@section('footer')

<x-NavbarBottom/>

@endsection
