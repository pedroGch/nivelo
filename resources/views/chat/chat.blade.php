@extends('layouts.main')

@section('title', 'Chat')

@section('header')
<x-NavbarTop/>
@endsection

@section('content')
<section class="container margin-navs">
  <div class="col-12 my-2 d-flex border-bottom border-dark-subtle pb-3">
    <a href="{{ route('categories') }}"><img src="{{ url('/img/icons/back_icon.svg') }}" alt="atrás" class="me-1 mt-2 mb-2" height="20px"></a>
    <div class="d-flex ">
      <h1 class="h3 fw-bold">Chats</h1>
      <span class="bg-movimiento ms-3"></span>
    </div>
  </div>

  @if($existingChats == false)
    <div class="alert alert-warning align-self-center mt-3" role="alert">
      Aún no hay chats iniciados.
    </div>

    <div>
      <p class="h4 lh-md text-center px-5 pt-5">Navegando por los distintos lugares podrás contactarte con otros usuarios e iniciar una conversación. Juntos podemos hacer crecer la comunidad de #YoNivelo.</p>
    </div>

    <div class="my-4 d-flex justify-content-center">
      <a href="{{ route('categories') }}" class="my-3 form-control btn rounded-pill p-3 shadow-sm bg-verde-principal btn-verde-hover text-white w-50 fw-semibold">Conocer lugares</a>
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
<x-NavbarBottom :chatInboxActive="$chatInboxActive ? 'true' : 'false'" :unreadMessages="$unreadMessages" />
@endsection
