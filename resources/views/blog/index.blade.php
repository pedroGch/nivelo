@extends('layouts.main')

@section('title', 'Blog')


@section('header')

<x-NavbarTop/>

@endsection

@section('content')

<section class="container margin-navs">
  <div class="row d-flex vh-100">
    <div class="mb-2">
      <div class="row my-4 mx-auto">
        <div class="col-12 my-4 border-bottom border-dark-subtle pb-3">
          <div class="d-flex ">
            <h2 class="h3 fw-bold">Blog</h2>
            <span class="bg-movimiento ms-3"></span>
          </div>
        </div>

        <div class="row d-flex col-12 my-4">
          {{-- acá arranca el foreach --}}
          <article class="col-4">
            <div class="my-2">
              <h3>Maternindad y accesibilidad</h3>
            </div>
            <div class="imagenDeTapa">
              <img src="{{asset('storage/places/kSysaXa4dXROO7kTgdV6hZSEMskBJNZdb4SmpQIE.jpg') }}" class="d-block w-100 1:3" alt="una imagen">
            </div>
            <div class="my-2">
              <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Commodi illum asperiores velit ex incidunt reprehenderit modi dignissimos possimus molestiae inventore dicta doloremque similique necessitatibus minus distinctio, molestias dolorum repudiandae! Quos.</p>
            </div>
            <div class="my-2">
              <div>
                <form action="#" method="get">
                  <button class="btn bg-verde-principal" type="submit">
                    Leer más
                  </button>
              </div>
            </div>
          </article>

          {{-- acá cierra el foreach --}}
        </div>
      </div>
    </div>
  </div>


</section>

@endsection

@section('footer')

<x-NavbarBottom/>

@endsection
