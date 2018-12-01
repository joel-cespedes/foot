@extends('inc.base')
@section('title'){{ isset($seo) ? $seo->m_title:''}}@endsection
@section('m-description'){{ isset($seo) ? $seo->m_description:''}}@endsection
@section('m-keywords'){{ isset($seo) ? $seo->m_key:''}}@endsection
@section('canonical')@if(isset($seo->canonical))<link rel=”canonical” href=”{{$seo->canonical}}” />@endif @endsection
@section('section')
  <section class="pg_contenido ">
      <div class="element1">
          <img src="{{asset('img/elemento1.jpg')}}" alt="">
      </div>
      <div class="element2">
          <img src="{{asset('img/elemento2.jpg')}}" alt="">
      </div>

    <div class="container">
      <div class="main_contentt">
          <h1 class="top_carrt">Donde comprar maqui, arandano, spirulina en chile.</h1>
        <div class="izq_content">
            <div class="dircc">
                <h4 class="tiit_contcc">Ubicanos</h4>
                <p>{{ $datos->texto_contacto }}</p>
            </div>

            <div class="text_contacto">
                {{-- <div class="mapa">
                  {!! $datos->mapa !!}
                </div> --}}
                <div class="space_form-contact">
                    <form method="post" action="{{url('email')}}" class="contact_form">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="text" name="nombre" placeholder="Nombre"/>
                        <input type="text" name="email" placeholder="Correo"/>
                        <input type="text" name="telefono" placeholder="telefono"/>
                        <input type="text" name="asunto" placeholder="Asunto"/>
                        <textarea name="mensaje" cols="30" rows="10" placeholder="Mensaje"></textarea>
                        <div class="space_enviar">
                            <button type="submit">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="padre_cntrdsf1">
                <div class="contccc_xcbv">
                    <h4 class="tiit_contcc">Contacto</h4>
                    <div class="redesss conncdc">
                        <a href="tel:{{str_replace(' ', '', $datos->telefono)}}">
                            <div class="icon icon-phone"> </div>
                            <span> {{ $datos->telefono }}</span>
                        </a>
                        <a href="mailto:{{ $datos->email }}">
                            <div class="icon icon-email"> </div>
                            <span> {{ $datos->email }}</span>
                        </a>
                        <a href="#">
                            <div class="icon icon-map-1"> </div>
                            <span> {{ $datos->ublicacion }}</span>
                        </a>
                    </div>
                </div>

                <div class="redesss_new">
                    <div class="redes_contacto">
                        <h4 class="tiit_contcc">Nuestras redes</h4>
                        <div class="redesss">

                            @foreach ($redes as $red)

                                <li>
                                    <a href="{{ $red->url }}">
                                        <div class="icon icon-{{ $red->clase }}"> </div>
                                        <span>{{ $red->nombre }}</span>
                                    </a>
                                </li>
                            @endforeach

                        </div>

                    </div>
                </div>
            </div>
        </div>

          <div class="espacio">
        @include('inc.dere_pro')
      </div>
      </div>
    </div>
  </section>
@endsection