@extends('inc.base')
@section('title'){{ isset($seo) ? $seo->m_title:''}}@endsection
@section('m-description'){{ isset($seo) ? $seo->m_description:''}}@endsection
@section('m-keywords'){{ isset($seo) ? $seo->m_key:''}}@endsection
@section('canonical')@if(isset($seo->canonical))<link rel=”canonical” href=”{{$seo->canonical}}” />@endif @endsection
@section('section')
<section class="pg_contenido aaaa">
    <div class="container">
      <div class="main_contentt ajusttt">
          <h3 class="top_carrt">Atención!</h3>
          <div class="box_contenido">
            <h3>Nota:</h3>
            <p>Antes de realizar esta acción, debes cargar primero el carrito de compra!</p>
          </div>
        </div>
    </div>
  </section>
  @endsection