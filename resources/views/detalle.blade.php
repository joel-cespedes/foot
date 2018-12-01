@extends('inc.base')

@section('metas')


    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@facilfood" />
    <meta name="twitter:creator" content="@facilfood" />
    <meta property="og:url" content="{{Request::url()}}" />
    <meta property="og:title" content="{{$producto->m_title}}" />
    <meta property="og:description" content="{{ $producto->m_description}}" />
    <meta property="og:image" content="{{asset('img/'.$producto->img)}}" />

    <meta property="og:image" content="{{asset('img/'.$producto->img)}}" />
    <meta property="og:image:secure_url" content="{{asset('img/'.$producto->img)}}" />
    <meta property="og:image:width" content="1063" />
    <meta property="og:image:height" content="1021" />





    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="FacilFood">
    <meta name="twitter:title" content="{{ $producto->m_title}}">
    <meta name="twitter:description" content="{{ $producto->m_description}}">
    <meta name="twitter:creator" content="@FacilFood">
    <meta name="twitter:image" content="{{asset('img/'.$producto->img)}}">
    <meta name="twitter:domain" content="https://facilfood.cl">





@endsection
@section('title'){{ $producto->m_title}}@endsection
@section('m-description'){{ $producto->m_description}}@endsection
@section('m-keywords'){{ $producto->m_key}}@endsection
@section('canonical')
    @if(isset($producto->canonical))
        <link rel=”canonical” href=”{{$producto->canonical}}” />
    @endif
@endsection
@section('section')
      <section class="pg_contenido">

          <div class="element1">
              <img src="{{asset('img/elemento1.jpg')}}" alt="">
          </div>


          <div class="container">

              <div class="main_contentt_nuevo">

                  <div class="space_top_tienda_new">


                      <div class="tiitt_tienda_nuevo">Tienda</div>

                      <form method="get" action="{{url('buscar_truco')}}">
                          <input type="text" name="nombre" placeholder="Buscar..."/>
                          <button type="submit">
                              <img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTYuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgd2lkdGg9IjI0cHgiIGhlaWdodD0iMjRweCIgdmlld0JveD0iMCAwIDMxMC40MiAzMTAuNDIiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDMxMC40MiAzMTAuNDI7IiB4bWw6c3BhY2U9InByZXNlcnZlIj4KPGc+Cgk8Zz4KCQk8cGF0aCBkPSJNMjczLjU4NywyMTQuOTY1YzQ5LjExLTQ5LjExMSw0OS4xMDktMTI5LjAyMSwwLTE3OC4xMzJjLTQ5LjExMS00OS4xMTEtMTI5LjAyLTQ5LjExMS0xNzguMTMsMCAgICBDNTMuNzkzLDc4LjQ5Nyw0Ny40ODMsMTQwLjQ2Miw3Ni41MSwxODguODVjMCwwLDIuMDg1LDMuNDk4LTAuNzMxLDYuMzEyYy0xNi4wNjUsMTYuMDY0LTY0LjI2Myw2NC4yNjMtNjQuMjYzLDY0LjI2MyAgICBjLTEyLjc5MSwxMi43OS0xNS44MzYsMzAuNjc1LTQuNDkzLDQyLjAybDEuOTUzLDEuOTUxYzExLjM0MywxMS4zNDUsMjkuMjI5LDguMzAxLDQyLjAxOS00LjQ5YzAsMCw0OC4wOTYtNDguMDk3LDY0LjEyOC02NC4xMjggICAgYzIuOTUxLTIuOTUxLDYuNDQ4LTAuODY2LDYuNDQ4LTAuODY2QzE2OS45NTgsMjYyLjkzOCwyMzEuOTIzLDI1Ni42MjksMjczLjU4NywyMTQuOTY1eiBNMTE4LjcxMSwxOTEuNzEgICAgYy0zNi4yODgtMzYuMjg4LTM2LjI4Ny05NS4zMzIsMC4wMDEtMTMxLjYyYzM2LjI4OC0zNi4yODcsOTUuMzMyLTM2LjI4OCwxMzEuNjE5LDBjMzYuMjg4LDM2LjI4NywzNi4yODgsOTUuMzMyLDAsMTMxLjYyICAgIEMyMTQuMDQzLDIyNy45OTYsMTU1LDIyNy45OTYsMTE4LjcxMSwxOTEuNzF6IiBmaWxsPSIjRkZGRkZGIi8+CgkJPGc+CgkJCTxwYXRoIGQ9Ik0xMjYuNzUsMTE4LjQyNGMtMS42ODksMC0zLjQwNi0wLjMzMi01LjA2MS0xLjAzMWMtNi42MTEtMi43OTgtOS43MDQtMTAuNDI2LTYuOTA2LTE3LjAzOCAgICAgYzE3LjU4Ni00MS41NTksNjUuNzAzLTYxLjA2MiwxMDcuMjYxLTQzLjQ3NmM2LjYxMSwyLjc5OCw5LjcwNCwxMC40MjYsNi45MDYsMTcuMDM4Yy0yLjc5OSw2LjYxMi0xMC40MjUsOS43MDMtMTcuMDM5LDYuOTA2ICAgICBjLTI4LjM1NC0xMS45OTgtNjEuMTg2LDEuMzA5LTczLjE4MywyOS42NjNDMTM2LjYyOSwxMTUuNDQ1LDEzMS44MTUsMTE4LjQyNCwxMjYuNzUsMTE4LjQyNHoiIGZpbGw9IiNGRkZGRkYiLz4KCQk8L2c+Cgk8L2c+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPC9zdmc+Cg==" />
                          </button>
                      </form>

                  </div>
              </div>

              <div class="space_ddetalle_producto">
                  <div class="spc_cntrll_img_inttrr">
                      @if($producto->oferta==1)
                          <div class="oferrta_rr">¡Oferta!</div>
                      @endif
                      <div class="box_imgg_producto">
                          @if(file_exists(public_path('img/'.$producto->img)))
                              <img src="{{asset('img/'.$producto->img)}}" alt="{{$producto->nimg}}"/>
                          @else
                              <img src="{{asset('img/no-image.jpg')}}" alt="Facilfood"/>
                          @endif
                      </div>

                          <div class="redess">

                              <div class="fb-share-button"
                                   data-href="{{Request::url()}}"
                                   data-layout="button_count">
                              </div>

                              <a class="twitter-share-button"
                                 href="https://twitter.com/intent/tweet?text={{ $producto->m_description}}">
                                  Tweet</a>
                              <g:plus action="share" annotation="bubble"></g:plus>

                      </div>
                  </div>

                  <div class="space_informacion_detalle_producto">
                      <div class="cntrl_top_detalle_producto">
                          <div class="top_info_producto_d">
                              <h1>{{$producto->nombre}}</h1>
                              <div class="bar-fdssss">

                                  {{$producto->slogan}}
                              </div>

                              <div class="space_tabs_info">
                                  <div class="links_tabs">
                                      <div class="link_tab actvv">Beneficios</div>
                                      <div class="link_tab">Informacion Nutricional</div>
                                  </div>
                                  <div class="paddr_itemmms">
                                      <div class="box_tab_contentt actvv padre_segundo_cont">
                                          <div class="icon-arrow-circle-down topsf"></div>
                                          <div class="icon-arrow-circle-down"></div>
                                          <div class="segundo_cont">
                                              @foreach($producto->beneficio as $bb)
                                                  <p class="toppsf"><i class="icon icon-circle"></i>  {{$bb->titulo}}</p>
                                                  <p class="kbaa"> {{$bb->nombre}}</p>
                                              @endforeach
                                          </div>
                                      </div>
                                      <div class="box_tab_contentt padre_segundo_cont">

                                          <div class="icon-arrow-circle-down topsf"></div>
                                          <div class="icon-arrow-circle-down"></div>

                                          <div class="segundo_cont dgs">
                                              {!!  $producto->informa_nutri!!}

                                          </div>
                                      </div>
                                  </div>
                              </div>


                          </div>


                          <div class="dv_cntrls_rds_envio">


                          </div>
                      </div>
                  </div>


                  <div class="detalle_productt_cpss">
                      @if(isset($producto->cantidad_pastillas))
                          <div class="ingg">{{$producto->cantidad_pastillas}} capsulas /
                              @endif
                              @if(isset($producto->peso))
                                  {{$producto->peso}} mg</div>
                      @endif
                      <div class="ingg">Precio:$ {{ $producto->precio}} </div>

                  </div>

                  <div class="envio_gratis_icon">
                      <div class="box_env_gratis">
                          <img src="{{asset('img/envio_gratis-01.png')}}" alt="">
                      </div>
                      a todo Chile
                  </div>

                  <div class="space_form_detalle_producto">
                      <form>

                          @if(isset(Session::get('cart')[$producto->url]))
                              <button type="submit" class="dfsg agregado" id="{{$producto->id}}" data-slug="{{$producto->url}}">
                                  Agregado
                                  @else
                                      <button type="submit" class="dfsg" id="{{$producto->id}}" data-slug="{{$producto->url}}">
                                          Añadir
                                          @endif


                                          <i class="fa fa-carrito"></i>
                                      </button>
                                      <input type="number" class="cantidad" value="1" min="1"/>
                      </form>

                  </div>

                  {{--@if(isset($producto->promo))--}}
                      {{--<div class="btmm_oferta_priductt">--}}
                          {{--<p> {{$producto->promo}}</p>--}}
                      {{--</div>--}}
                  {{--@endif--}}

              </div>
          </div>
</section>


      <section class="bg_plxx">
          <div class="box_contt__b">
              <h4>{{$producto->slogan}}</h4>
              <p>{{ $producto->descripcion}} </p>
          </div>
          <div class="img_bg_x">

              <img src="{{asset('img/'.$producto->img_bg)}}" alt="Facil food"/>
          </div>
      </section>
      <section class="tit_pacc">
          <div class="box_img_promo">
              <img src="{{asset('img/promo_pack-01.png')}}" alt="Pack Facil food"/>
          </div>
      </section>




      <div class="space_packss owl-carousel">

      @foreach($los_pack as $pacc)


              <div class="box_producto_nw">
                  <div class="space_img_prd_nw">

                      <div class="bx_cntrl_prddd_nw">
                          @if(file_exists(public_path('img/'.$pacc->img)))
                              <img src="{{asset('img/'.$pacc->img)}}" alt="{{$pacc->nimg}}"/>
                          @else
                              <img src="{{asset('img/no-image.jpg')}}" alt="Facilfood"/>
                          @endif
                      </div>
                      <div class="rn_name">{{$pacc->nombre}}</div>
                  </div>

                  <div class="dett_prddct_nw">
                      <div class="cntrl_bg_cnt_dt_nw">
                          <div class="top_detalle_prdd_nw">
                              <a class="name_prd" href="{{$pacc->url}}">{{$pacc->nombre}}</a>

                          </div>

                          <div class="spac_btms_dt_nw">

                              <a class="vver" href="{{$pacc->url}}">Ver</a>
                              <div class="price_prd">
                                  @if(isset($pacc->precio_falso))
                                      <span class="p_falso">$ {{$pacc->precio_falso}}</span><br>
                                  @endif
                                  <span class="p_normal">$ {{$pacc->precio}}</span>
                              </div>
                              <a class="caar addd-carttt" href="#" data-id="{{$pacc->id}}" data-slug="{{$pacc->url}}">
                                  <div class="icon-cart"></div>
                              </a>

                          </div>
                      </div>
                  </div>

              </div>

    @endforeach
      </div>


    </section>
    <div class="space_btmmm">
      <div class="containerr">
          <div class="text-s">Mantente súper informada,

              Suscríbete!</div>
        <div class="spc_lllg_txt">

          <div class="space_ttt_sscrb">¡Suscríbete!</div>
          <div class="space_form_nwslettt">
            <form method="post" action="{{url('newsletter')}}">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="text" name="nombre" placeholder="Nombre" required/>
              <input type="email" name="email" placeholder="Correo" required/>
              <button type="submit">Suscribirme</button>
            </form>
          </div>
        </div>
      </div>
    </div>


    <section class="comentarios_nw">
      <div class="spac_img_razz1">
          <img src="{{asset('img/top_bgg.png')}}" alt="">
      </div>  
      <div class="space_cont_commentss">
        <div class="container">
          <div class="grd_comentarioss">
            <div class="space_ccmmts">
              <h3 class="top_carrt dsfff">Comentarios Anteriores</h3>
              <div class="pdrr_bx_commm">
                <div class="box_comentarios_anteriores">
                  @if(count($producto->comentario)==0)
                    <div class="sin_come">
                      <p>Ésta nota no tiene comentarios aún.</p>
                      <br>
                      <p>¡Sé el primero!</p>
                    </div>
                  @else
                    @foreach($producto->comentario as $key => $coments)
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
              <h3 class="top_carrt dsfff">Escríbe un comentario</h3>
              <form  method="post" action="{{url('comentario_producto')}}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="producto_id" value="{{$producto->id}}">
                <input type="hidden" id="poner" name="puntuacion" value="5">
                <div class="space_estrellas">
                  <div class="estrellas"><div class="starnew"> </div> </div>
                  <p>Valora este artículo</p>
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
        <div class="spac_img_razz2">
            <img src="{{asset('img/top_bggg.png')}}" alt="">
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
      $('.dfsg').click(function(e){
          e.preventDefault();
          var id=   $(this).attr('id');
          var loggg = $(this).data('slug');
          var cantidad = $(".cantidad").val();
          $.get('{{url('cart-add/')}}/'+id+'-' + loggg + '/'+cantidad, function (res, estado) {
              $('.dfsg').addClass('agregado');
              $('.dfsg').text('agregado');
              $('#cantidadProductos').text(res);
          });
          return false;
      });


      var cantidad = '{{count($producto->comentario)}}';

      for(i=0; i<cantidad+1;i++){
          $('.star'+i).rateYo({
              starWidth: "20px",
              rating    : $('.recig'+i).val(),
              readOnly: true
          });
      };

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