@extends('layouts.main')

@section('title', 'Blog de nivelo, noticias de accesibilidad')


@section('header')

<x-NavbarTop/>

@endsection

@section('content')

<section class="container margin-navs">
  @if(empty($chats))
    <div class="alert alert-warning align-self-center" role="alert">
      Aún no hay chats iniciados.
    </div>
  @else
    <div class="container custom-container">
      @if (isset($chat_id))
        @livewire('chat-component', ['chat_id' => $chat_id])
      @else
        @livewire('chat-component')
      @endif
    </div>
  @endif


</section>

@endsection

@section('footer')

<x-NavbarBottom :chatInboxActive="$chatInboxActive ? 'true' : 'false'"  />

@endsection
