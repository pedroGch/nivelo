@extends('layouts.main')

@section('title', 'Blog de nivelo, noticias de accesibilidad')


@section('header')

<x-NavbarTop/>

@endsection

@section('content')

<section class="container margin-navs">
  <div>
    <h2 class="fw-bold py-3">Chats</h2>
  </div>

  @if(empty($chats))
    <div class="alert alert-warning align-self-center" role="alert">
      Aún no hay chats iniciados.
    </div>

    <div>
      <p class="h4 lh-md text-center px-5 pt-5">Navegando por los distintos lugares podrás contactarte con otros usuarios e iniciar una conversación. Juntos podemos hacer crecer la comunidad de #YoNivelo.</p>
    </div>

    <div class="my-4 d-flex justify-content-center">
      <a href="{{ route('categories') }}" class="my-3 form-control btn rounded-pill p-3 shadow-sm bg-verde-principal btn-verde-hover text-white w-50 fw-bold">Conocer lugares</a>
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
