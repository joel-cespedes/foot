@extends('inc.base')
@section('title'){{ isset($seo) ? $seo->m_title:''}}@endsection
@section('m-description'){{ isset($seo) ? $seo->m_description:''}}@endsection
@section('m-keywords'){{ isset($seo) ? $seo->m_key:''}}@endsection
@section('canonical')@if(isset($seo->canonical))<link rel=”canonical” href=”{{$seo->canonical}}” />@endif @endsection
@section('section')
    <div class="container">


<section class="pg_contenido">
    <div class="element1">
        <img src="{{asset('img/elemento1.jpg')}}" alt="">
    </div>
    <div class="element2">
        <img src="{{asset('img/elemento2.jpg')}}" alt="">
    </div>

    <div class="container">
      <div class="main_contentt ajusttt">
          <h3 class="top_carrt"></h3>

          
          <div class="box_contenido kkasdf">
            <h3>Ultimo paso: ¡Déjanos tus datos para el envío!</h3>
              <div class="form_compra">
                  <form method="post" action="{{url('compra_khipu')}}">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <input type="text" name="nombre" placeholder="Nombre"/>
                      <input type="text" name="email" placeholder="Correo"/>
                      <input type="text" name="telefono" placeholder="telefono"/>
                      <textarea name="direccion" cols="10" rows="10" placeholder="Dirección de envío"></textarea>
                      <div class="space_enviar">
                          <button type="submit">Enviar</button>
                      </div>
                  </form>
              </div>
          </div>


          </div>



    </div>
  </section>
    </div>
  @endsection