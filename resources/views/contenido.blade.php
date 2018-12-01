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
      <div class="main_contentt">
          <h3 class="top_carrt">{{$interno->nombre}}</h3>
        <div class="izq_content">
          
          <div class="box_contenido">
            {!! $interno->cuerpo !!}
          </div>
  
        </div>
        @include('inc.dere_pro')
      </div>
    </div>
  </section>
  @endsection