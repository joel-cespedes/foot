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
    <div class="element3">
      <img src="{{asset('img/elemento3.jpg')}}" alt="">
    </div>
    <div class="container">
      <div class="main_contentt">
          <h1 class="top_carrt">Consejos naturales para cambiar tu vida.</h1>
        <div class="izq_content">
          
          <div class="list_blog">
            @foreach($blogs as $bsf)
            <a class="line_blog" href="{{$bsf->url}}">
              <div class="top_artcl_blog">
                <div class="box_img_lis_blog">
                  @if(file_exists(public_path('img/'.$bsf->img)))
                    <img src="{{asset('img/'.$bsf->img)}}" alt="{{$bsf->nimg}}"/>
                  @else
                    <img src="{{asset('img/no-image.jpg')}}" alt="Facilfood"/>
                  @endif
                </div>
                <div class="box_top_desc">
                  <h4>{{$bsf->nombre}}</h4>
                <p>{{$bsf->descripcion}}</p>
                </div>
              </div>
              <div class="ssssstg">
                <div class="space_commmnts_vall">
                  <div class="commmtss">Comentarios <span> ({{count($bsf->comentario)}})</span></div>
                  <div class="valll">
                    <div class="feccch">Creado el {{$bsf->created_at->format('d-m-Y')}}</div>
                  </div>
                </div>
              </div>
            </a>

            @endforeach
          </div>
          <div class="text-center">
            {{$blogs->links()}}
          </div>
        </div>
        @include('inc.dere_blog')
      </div>
    </div>
  </section>
 @endsection