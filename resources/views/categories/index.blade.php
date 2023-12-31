<?php

/**
 * @var \App\Models\Category[] $categories
 */

?>

@extends('layouts.main')

@section('title', 'Categorías')

@section('header')

<x-NavbarTop/>

@endsection

@section('content')

<section class="container margin-navs">
  <div class="mx-2 my-4 mb-5">
    @if (\Session::has('status.message'))
      <div class="alert alert-{{ \Session::get('status.type', 'success') }} d-flex align-items-center row alert-dismissible fade show" role="alert">
        {!! \Session::get('status.message') !!}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
      </div>
    @endif
    <div class="row pt-3">
      <div class="col-6 col-md-9 d-flex mt-3 ps-2">
        <h2 class="h3 fw-bold">Categorías</h2>
      </div>
      <div class="col-6 col-md-3 d-flex justify-content-end">
        <div>
          <a class="btn rounded-pill pt-3 px-3 pb-3 shadow-sm bg-verde-principal text-white w-standard " >
            <img src="{{ url('/img/location.png') }}" alt="icono lugar" class="me-1 mb-2">
            <span class="fw-semibold mt-2">Ver mapa</span>
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="row my-3">
    <div class="col-12">
      <form action="{{ route('searchPlaces') }}" method="get">
        @csrf
        <div class="input-group">
          <input type="text" class="form-control buscador-principal" name="buscar" id="buscar" placeholder="Lugar, ciudad o provincia" aria-label="buscar" aria-describedby="buscar">
          <button class="btn bg-verde-principal" type="submit" id="button-addon2">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#FFF" class="bi bi-search" viewBox="0 0 16 16">
              <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg>
          </button>
        </div>
      </form>
    </div>
  </div>
  <div class="row g-3 my-3 mb-5 pt-3 d-flex">
    @foreach ($categories as $category)
    <div class="col-12 col-md-6 col-xl-4 position-relative">
      <a href=" {{ route('categoryDetail', ['category_id' => $category->category_id ]) }} ">
        <div class="stablished-height col-12 d-flex">
          <img src="{{asset('storage/'.$category->image_cat) }}" alt="{{ $category->alt_img_cat }}" class="w-100 rounded rounded-3 shadow-sm">
          <div class="bg-violeta-dark rounded rounded-3 position-absolute start-0 bottom-0 mb-0 ms-2 shadow-sm">
            <h3 class="fs-6 pt-3 pb-2 px-4 text-white">{{ $category->name }}</h3>
          </div>
        </div>
      </a>
    </div>
    @endforeach
  </div>
</section>

@endsection

@section('footer')

<x-NavbarBottom/>

@endsection
