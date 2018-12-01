@extends('inc.base')
@section('title'){{ isset($seo) ? $seo->m_title:''}}@endsection
@section('m-description'){{ isset($seo) ? $seo->m_description:''}}@endsection
@section('m-keywords'){{ isset($seo) ? $seo->m_key:''}}@endsection
@section('canonical')@if(isset($seo->canonical))<link rel=”canonical” href=”{{$seo->canonical}}” />@endif @endsection
@section('section')
  <section class="faqs pg_contenido">
    <div class="element1">
      <img src="{{asset('img/elemento1.jpg')}}" alt="">
    </div>
    <div class="element2">
      <img src="{{asset('img/elemento2.jpg')}}" alt="">
    </div>


    <div class="container">
      <h3 class="top_carrt">Preguntas frecuentes</h3>
      <div class="space_faqs">

        @foreach($faq as $ggggg)

        <div class="pregunta-q">
          <div class="anglle"></div><span>{{$ggggg->pregunta}}</span>
        </div>
        <div class="box-answer">
          <div class="space-resssp"><span>R:</span>
            <div class="text-resppp"><p>{{$ggggg->respuesta}}</p>
            </div>
          </div>
        </div>@endforeach

      </div>
    </div>
  </section>
 @endsection