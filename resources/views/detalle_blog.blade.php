@extends('inc.base')


@section('metas')
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@facilfood" />
    <meta name="twitter:creator" content="@facilfood" />
    <meta property="og:url" content="{{Request::url()}}" />
    <meta property="og:title" content="{{$truco->m_title}}" />
    <meta property="og:description" content="{{ $truco->m_description}}" />
    <meta property="og:image" content="{{asset('img/'.$truco->img)}}" />

    <meta property="og:image" content="{{asset('img/'.$truco->img)}}" />
    <meta property="og:image:secure_url" content="{{asset('img/'.$truco->img)}}" />
    <meta property="og:image:width" content="1063" />
    <meta property="og:image:height" content="1021" />





    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="FacilFood">
    <meta name="twitter:title" content="{{ $truco->m_title}}">
    <meta name="twitter:description" content="{{ $truco->m_description}}">
    <meta name="twitter:creator" content="@FacilFood">
    <meta name="twitter:image" content="{{asset('img/'.$truco->img)}}">
    <meta name="twitter:domain" content="https://facilfood.cl">

@endsection
@section('title'){{ $truco->m_title}}@endsection
@section('m-description'){{ $truco->m_description}}@endsection
@section('m-keywords'){{ $truco->m_key}}@endsection
@section('canonical')
    @if(isset($truco->canonical))
        <link rel=”canonical” href=”{{$truco->canonical}}” />
    @endif
@endsection

@section('title'){{ isset($truco) ? $truco->m_title:''}}@endsection
@section('m-description'){{ isset($truco) ? $truco->m_description:''}}@endsection
@section('m-keywords'){{ isset($truco) ? $truco->m_key:''}}@endsection
@section('canonical')@if(isset($truco->canonical))<link rel=”canonical” href=”{{$truco->canonical}}” />@endif @endsection



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
          <h1 class="top_carrt">{{$truco->nombre}}</h1>
        <div class="izq_content">
          
          <div class="box_contenido">
            <div class="bar-comparir">
                <div class="redess">
                    <div class="fb-share-button"
                         data-href="{{Request::url()}}"
                         data-layout="button_count">
                    </div>

                    <a class="twitter-share-button"
                       href="https://twitter.com/intent/tweet?text={{ $truco->m_description}}">
                        Tweet</a>
                    <g:plus action="share" annotation="bubble"></g:plus>

                </div>
              <div class="dato_articulo"><i class="fas fa-calendar-alt"></i>Publicado el {{$truco->created_at->format('d-m-Y')}}</div>
              @if($truco->cnoticia->first())
                <div class="dato_articulo"><i class="fas fa-folder-open"></i>{{$truco->cnoticia->first()->nombre}}</div>
                @endif
            </div>

            <div class="box_im_contenido">
                @if(file_exists(public_path('img/'.$truco->img)))
                    <img src="{{asset('img/'.$truco->img)}}" alt="{{$truco->nimg}}"/>
                @else
                    <img src="{{asset('img/no-image.jpg')}}" alt="Facilfood"/>
                @endif
            </div>
              <div class="cuer_deta">
                  {!!$truco->cuerpo!!}
              </div>
        
          </div>
          <div class="line_btm_ppgndr"><a href="{{URL::previous()}}"><< Atras</a></div>

        </div>




@include('inc.dere_blog')
@if(isset($truco->producto))

      <div class="cntrl_recomendados">
          <h3 class="top_carrt dfff_carssl"> Recomendados</h3>

          <div class="owl-carousel">




                  @foreach($truco->producto as $prods)
                      <div class="box_producto_nw">
                          <div class="space_img_prd_nw">
                              @if($prods->oferta==1)
                                  <div class="oferrta_rr">¡Oferta!</div>
                              @endif
                              <div class="bx_cntrl_prddd_nw">
                                  @if(file_exists(public_path('img/'.$prods->img)))
                                      <img src="{{asset('img/'.$prods->img)}}" alt=""{{$prods->nimg}}/>
                                  @else
                                      <img src="{{asset('img/no-image.jpg')}}" alt="Facilfood"/>

                                  @endif
                              </div>


                          </div>

                          <div class="dett_prddct_nw">
                              <div class="cntrl_bg_cnt_dt_nw">
                                  <div class="top_detalle_prdd_nw">
                                      <a class="name_prd" href="{{ url("$prods->url") }}">{{$prods->nombre}}</a>


                                  </div>

                                  <div class="spac_btms_dt_nw">

                                      <a class="vver" href="{{ url("$prods->url") }}">Ver</a>
                                      <div class="price_prd">
                                          @if(isset($prods->precio_falso))
                                              <span class="p_falso">$ {{$prods->precio_falso}}</span><br>
                                          @endif
                                          <span class="p_normal">$ {{$prods->precio}}</span>
                                      </div>
                                      <a class="caar addd-carttt" href="#" data-id="{{$prods->id}}" data-slug="{{$prods->url}}">
                                          <div class="icon-cart"></div>
                                      </a>

                                  </div>
                              </div>
                          </div>

                      </div>
                  @endforeach





          </div>
      </div>

@endif

      </div>
        <div class="space_cont_commentss">
          <div class="container">
            <div class="grd_comentarioss transp">
              <div class="space_ccmmts">
                <h3 class="top_carrt">Comentarios Anteriores</h3>
                <div class="pdrr_bx_commm">
                  <div class="box_comentarios_anteriores">
                      @if(count($truco->comentario)==0)
                          <div class="sin_come">

                              <p>Ésta nota no tiene comentarios aún.</p>
                              <br>
                              <p>¡Sé el primero!</p>
                          </div>
                      @else
                    @foreach($truco->comentario as $key => $coments)
                      <div class="comentario">
                        <div class="box_user_name">
                          <div class="first_cartctr">{{substr($coments->nombre, 0,1)}}</div>
                          <div class="user_name">{{$coments->nombre}}</div>
                        </div>
                        <input type="hidden" class="recig{{$key}}" value="{{$coments->puntuacion}}">
                        <div class="box_comentario">
                          <p>{{$coments->comentario}}</p>
                          <div class="space_califf_date">
                            <div class="star{{$key}}"></div>
                            <span class="date_comn"> Publicado el {{$coments->created_at->format('d-m-Y')}}</span>
                          </div>
                        </div>
                      </div>

                    @endforeach
                            @endif

                  </div>
                </div>
              </div>
              <div class="space_ccmmts">
                <h3 class="top_carrt">Escríbe un comentario</h3>
                <form  method="post" action="{{url('comentario_truco')}}">

                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="noticia_id" value="{{$truco->id}}">
                  <input type="hidden" id="poner" name="puntuacion" value="5">

                  <div class="space_estrellas">
                    <div class="estrellas"><div class="starnew"> </div> </div>
                    <p>Valora este articulo</p>
                  </div>

                  <input type="text" name="nombre" placeholder="Nombre" class="hasdf"/>
                  <textarea name="comentario" cols="30" rows="10" class="hasdf" placeholder="Añade tu comentario"></textarea>
                  <div class="space_btmm_env_cmmmt">
                    <button type="submit">Enviar</button>
                  </div>
                </form>
              </div>
            </div>
          </div>

      </div>
        <div class="space_carousel_sellls">
            <div class="container_sclll">
                <div class="dffff_a owl-carousel2">
                    <div class="box_sellll">
                        <div class="cntttll_slll">
                            <img src="{{asset('img/a001.png')}}" alt="Facilfood"/>
                        </div>
                        <p>Texto texto texto texto</p>
                    </div>
                    <div class="box_sellll">
                        <div class="cntttll_slll">
                            <img src="{{asset('img/a002.png')}}" alt="Facilfood"/>
                        </div>
                        <p>Texto texto texto texto</p>
                    </div>
                    <div class="box_sellll">
                        <div class="cntttll_slll">
                            <img src="{{asset('img/a003.png')}}" alt="Facilfood"/>
                        </div>
                        <p>Texto texto texto texto</p>
                    </div>
                    <div class="box_sellll">
                        <div class="cntttll_slll">
                            <img src="{{asset('img/a004.png')}}" alt="Facilfood"/>
                        </div>
                        <p>Texto texto texto texto</p>
                    </div>
                    <div class="box_sellll">
                        <div class="cntttll_slll">
                            <img src="{{asset('img/a005.png')}}" alt="Facilfood"/>
                        </div>
                        <p>Texto texto texto texto</p>
                    </div>
                    <div class="box_sellll">
                        <div class="cntttll_slll">
                            <img src="{{asset('img/a001.png')}}" alt="Facilfood"/>
                        </div>
                        <p>Texto texto texto texto</p>
                    </div>


                </div>
            </div>
        </div>
    </div>

  </section>


 @endsection

@section('script')

    <script src="https://apis.google.com/js/plusone.js"></script>
  <script type="text/javascript" async src="https://platform.twitter.com/widgets.js"></script>
  <div id="fb-root"></div>
  <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = 'https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v3.0&appId=505713579638150&autoLogAppEvents=1';
          fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>
  <script>


      var cantidad = '{{count($truco->comentario)}}';

      for(i=0; i<cantidad+1;i++){
          $('.star'+i).rateYo({
              starWidth: "20px",
              rating    : $('.recig'+i).val(),
              readOnly: true
          })
      }

      $('.starnew').rateYo({
          starWidth: "30px",
          ratedFill: "#E74C3C",
          rating    : 5,
          fullStar: true,
          multiColor: {
              "startColor": "#e1d800", 
              "endColor"  : "#e1d800" 
          },
          onSet: function (rating, rateYoInstance) {
              $('#poner').val(rating);
          }
      })
  </script>
  @endsection