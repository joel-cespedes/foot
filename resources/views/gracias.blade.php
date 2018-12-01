@extends('inc.base')
@section('title'){{ isset($seo) ? $seo->m_title:''}}@endsection
@section('m-description'){{ isset($seo) ? $seo->m_description:''}}@endsection
@section('m-keywords'){{ isset($seo) ? $seo->m_key:''}}@endsection
@section('canonical')@if(isset($seo->canonical))<link rel=”canonical” href=”{{$seo->canonical}}” />@endif @endsection
@section('section')
<section class="pg_contenido">
    <div class="element1">
        <img src="{{asset('img/elemento1.jpg')}}" alt="">
    </div>
    <div class="element2">
        <img src="{{asset('img/elemento2.jpg')}}" alt="">
    </div>

    <div class="container">
      <div class="main_contentt ajusttt">
          <h3 class="top_carrt">Gracias por tu compra</h3>

          
          <div class="box_contenido kkasdf">
            <h3>En breve nos comunicaremos contigo</h3>
            <p>Si tienes una inquietud puedes localizarnos por chat o a éste número:
                {{$datos->telefono}}
            </p>
              <br>
              <br>
            <h4>Tu Número de seguimiento es:
           {{$pedido->id}}

            </h4>
          </div>
        </div>


    </div>
  </section>
  @endsection