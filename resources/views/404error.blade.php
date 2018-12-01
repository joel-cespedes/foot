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
        <div class="space_error1">
          <div class="top_error">Error 404</div>
          <div class="sub-errr">La pagina no se ha encontrado</div>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam accusantium praesentium non dolore harum in exercitationem, rem nostrum, sed nobis facilis provident debitis accusamus omnis dolorem dolorum reprehenderit ratione quia?</p>
        </div>
      </div>
    </div>
  </section>
  @endsection