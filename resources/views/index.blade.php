<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>{{$seo->m_title}}</title>
    <meta name="description" content="{{$seo->m_descripction}}">
    <meta name="keywords" content="{{$seo->m_key}}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <link rel="stylesheet" href="{{asset('css/todo.css?v=1')}}"/>
    <link rel="icon" href="{{asset('img/favicon.ico')}}" type="image/x-icon">

  </head>
</html>
<body>

  <nav class="menu inic">
    <div class="icon-barras">
    </div>
    <div class="wrap_menu"><ul>
      <li><a href="{{url('/')}}">
        <div class=" icon-home-house-streamline"></div>
      </a>
    </li>
    <li><a href="{{url('/tienda')}}">Tienda</a></li>
        <li> <a href="{{url('salud')}}">Super Tips</a></li>
        <li><a href="{{url('/contacto')}}">Contacto</a></li>
        <li><a href="{{url('/compra')}}"> 
          <div class=" icon-cart">
              <span id="cantidadProductos">
                @if(Session::has('cart'))

                    @if(count(Session::get('cart'))!=0)
                        {{count(Session::get('cart'))}}
                    @endif
                @endif
            </span>
          </div>
      </a>
      </li>
    </ul>
  </div>
  </nav>
  <nav class="menu2 has">
    <div class="cntrl_menu2_a">
        <div class="logo_res_in">
            <a href="{{ url('/') }}">
              <img id="cam_logo" src="{{ asset('img/logo.png') }}" alt="FacilFood"></a>
          </div>
    <div class="icon-barras"></div>
    <div class="wrap_menu">
      <ul>
          <li><a href="{{url('')}}"><div class="icon icon-home-house-streamline"></div></a></li>
          <li><a href="{{url($producto[3]->url)}}">Arándano</a></li>
          <li><a href="{{url($producto[2]->url)}}">Frambuesa </a></li>
          <li><a href="{{url($producto[4]->url)}}">Rosa Mosqueta</a></li>
          <li><a href="{{url($producto[0]->url)}}">Maquí</a></li>
          <li><a href="{{url($producto[1]->url)}}">Spirulina</a></li>
      </ul>
    </div>
    </div>
  </nav>
  <div id="preloader_all"> </div>
  <div id="fullpage">
    <section class="vertical">
      <div id="preloader"></div>
      <div class="background">
        <div class="black"></div>
        <div class="base"></div>
        <div class="movimiento"></div>
      </div>
      <div class="contenido animacion_component">
        <div class="logo"> <img src="img/logo.png" alt="Facilfood"/></div>
          <h1 class="tile_h">Cambia tu vida <br> superalimentos en chile</h1>
        <div class="ventajas">
          <ul class="kkks">
            {!! $datos->textos_inicio !!}
          </ul>
        </div>
      </div>
      <div class="down"><a href="#"><span> </span></a></div>
    </section>
    <section class="vertical section2">
      <div class="background">
        <div class="base2"></div>
        <div class="movimiento2"></div>
      </div>
      <div class="librito"><a class="ir1" href="#">
          <div class="icon-cart"></div></a></div>
      <div class="down"><a href="#"><span></span></a></div>
      <div class="conteo">2/6</div>

      <div class="con_index">

      <div class="interno_rigth interno">
        <div class="interno_t">Arándano</div>
        <div class="interno_des"></div>
        <ul class="lista_corta">
        @if(isset($producto[3]->beneficio))
        @foreach($producto[3]->beneficio as $hh)
          <li>
            <div class="in_ti">{{$hh->titulo}}</div>
            <p class="in_p">{{$hh->nombre}}</p>
          </li>
         @endforeach
       @endif
        </ul>
      </div>

    </div>

      @if(isset($producto[3]->beneficio))
      <div class="ventana_flotante">
        <div class="absulute_all">
          <div class="fill"></div>
          <div class="absolute_rigth absolute">
            <div class="content_ab">
              <div class="left_ab">
                <div class="titulo1_ab">{{$producto[3]->nombre}}</div>
                <div class="complemento_ab">{{$producto[3]->slogan}}</div>
                <p class="texto_ab">{{$producto[3]->descripcion}}{{strlen($producto[3]->descripcion)>340 ? '...': ''}} <a href="{{$producto[3]->url}}">Mas información</a></p>
                <div class="cart">
                  <div class="precio_index">
                    <span class="imsf">Precio: </span> $ {{$producto[3]->precio}}</div>
                    {{--<div class="call_to">--}}
                      {{--<div class="fil">50%</div>--}}
                      {{--<div class="fil2">3° Unidad</div>--}}
                   {{--</div>--}}
                </div>
                <a class="comprar" data-id="{{$producto[3]->id}}" data-slug="{{$producto[3]->url}}">AÑADIR AL CARRITO</a>
                <div class="call_ab">{{$producto[3]->promo}}</div>
              </div>
              <div class="rigth_ab"> <img src="img/section2/frasco.png" alt="{{$producto[3]->nombre}}"/></div>

        {{--      <div class="footer_ab">

                <ul>
                  <li>
                    {{$producto[3]->palabras}}
                  </li>
                </ul>
              </div>--}}
              <div class="space_cntrl_grddcc">
                <div class="box_packs_index1">

                  @if(isset($tag[0]))
                  @foreach($tag[0]->producto->slice(1) as $tagg)
                  <a class="box_opcion_indxq1" href="{{$tagg->url}}">
                    <div class="spc_img_chckksxx"><img src="{{asset('img/'.$tagg->img)}}" alt="{{$tagg->nimg}}"/></div>
                    <div class="space_dttt_pckk">
                      <div class="nmbrrr">{{$tagg->nombre}}</div>
                    </div>
                  </a>
                @endforeach
                    @endif
                </div>
              </div>
              <div class="spac_price_ap">

              </div>
            </div>
          </div>
        </div>
      </div>
      @endif
    </section>
    <section class="vertical section3">
      <div class="conteo">3/6</div>
      <div class="background">
        <div class="base3"></div>
        <div class="movimiento3"></div>
      </div>
      <div class="librito"><a class="ir2" href="#">
          <div class="icon-cart"></div></a></div>
      <div class="down"><a href="#"><span></span></a></div>
        <div class="con_index">
      <div class="interno_left interno">
        <div class="interno_t">{{$producto[2]->nombre}}</div>
        <div class="interno_des"></div>
        <ul class="lista_corta">
          @if(isset($producto[2]->beneficio))
            @foreach($producto[2]->beneficio as $hhj)
              <li>
                <div class="in_ti">{{$hhj->titulo}}</div>
                <p class="in_p">{{$hhj->nombre}}</p>
              </li>
            @endforeach
          @endif
        </ul>
      </div>
      </div>
      <div class="ventana_flotante">
        <div class="absulute_all">
          <div class="absolute_left absolute">
            <div class="content_ab">
              <div class="left_ab">
                <div class="titulo1_ab">{{$producto[2]->nombre}}</div>
                <div class="complemento_ab">{{$producto[2]->slogan}}</div>
                <p class="texto_ab">{{substr($producto[2]->descripcion, 0,340)}}{{strlen($producto[2]->descripcion)>340 ? '...': ''}} <a href="{{$producto[2]->url}}">Mas información</a</p>
                <div class="cart">
                  <div class="precio_index">
                    <span class="imsf">Precio: </span> $ {{$producto[2]->precio}}</div>
                  {{--<div class="call_to">--}}
                    {{--<div class="fil">50%</div>--}}
                    {{--<div class="fil2">3° Unidad</div>--}}
                  {{--</div>--}}
                </div>
                <a class="comprar" data-id="{{$producto[2]->id}}" data-slug="{{$producto[2]->url}}">AÑADIR AL CARRITO</a>
                <div class="call_ab">{{$producto[2]->promo}}</div>
              </div>
              <div class="rigth_ab"> <img src="img/section3/frasco.png" alt="{{$producto[2]->nombre}}"/></div>
           {{--   <div class="footer_ab">
                <ul class="fsddd">
                  <li>
                    {{$producto[2]->palabras}}
                  </li>
                </ul>
              </div>--}}
              <div class="space_cntrl_grddcc">
                <div class="box_packs_index1">
                  @if(isset($tag[1]))
                    @foreach($tag[1]->producto->slice(1) as$tago)
                      <a class="box_opcion_indxq1" href="{{$tago->url}}">
                        <div class="spc_img_chckksxx"><img src="{{asset('img/'.$tago->img)}}" alt="{{$tago->nimg}}"/></div>
                        <div class="space_dttt_pckk">
                          <div class="nmbrrr">{{$tago->nombre}}</div>
                        </div>
                      </a>
                    @endforeach
                  @endif
                </div>
              </div>

            </div>
          </div>
          <div class="fill"></div>
        </div>
      </div>
    </section>
    <section class="vertical section4">
      <div class="conteo">4/6</div>
      <div class="background">
        <div class="base4"></div>
        <div class="movimiento4"></div>
      </div>
      <div class="librito"><a class="ir3" href="#">
          <div class="icon-cart"></div></a></div>
      <div class="down"><a href="#"><span></span></a></div>
      <div class="con_index">

      <div class="interno_left interno change_colors">
        <div class="interno_t">{{$producto[4]->nombre}}</div>
        <div class="interno_des"></div>
        <ul class="lista_corta">
          @if(isset($producto[4]->beneficio))
            @foreach($producto[4]->beneficio as $hhpqo)
              <li>
                <div class="in_ti">{{$hhpqo->titulo}}</div>
                <p class="in_p">{{$hhpqo->nombre}}</p>
              </li>
            @endforeach
          @endif
        </ul>
      </div>
      </div>

      @if(isset($producto[4]->beneficio))
      <div class="ventana_flotante">
        <div class="absulute_all">
          <div class="absolute_left absolute">

            <div class="content_ab">
              <div class="left_ab">
                <div class="titulo1_ab">{{$producto[4]->nombre}}</div>
                <div class="complemento_ab">{{$producto[4]->slogan}}</div>
                <p class="texto_ab">{{substr($producto[4]->descripcion, 0,340)}}{{strlen($producto[4]->descripcion)>340 ? '...': ''}} <a href="{{$producto[4]->url}}">Mas información</a</p>
                <div class="cart">
                  <div class="precio_index">
                    <span class="imsf">Precio: </span> $ {{$producto[4]->precio}}</div>
                  {{--<div class="call_to">--}}
                    {{--<div class="fil">50%</div>--}}
                    {{--<div class="fil2">3° Unidad</div>--}}
                  {{--</div>--}}
                </div>
                <a class="comprar" data-id="{{$producto[4]->id}}" data-slug="{{$producto[4]->url}}">AÑADIR AL CARRITO</a>
                <div class="call_ab">{{$producto[4]->promo}}</div>
              </div>
              <div class="rigth_ab"> <img src="img/section4/frasco.png" alt="{{$producto[4]->nombre}}"/></div>
        {{--      <div class="footer_ab">
                <ul>
                  <li>
                    {{$producto[4]->palabras}}
                  </li>
                </ul>
              </div>--}}
              <div class="space_cntrl_grddcc">
                <div class="box_packs_index1">
                  @if(isset($tag[2]))
                    @foreach($tag[2]->producto->slice(1) as$taggy)
                      <a class="box_opcion_indxq1" href="{{$taggy->url}}">
                        <div class="spc_img_chckksxx"><img src="{{asset('img/'.$taggy->img)}}" alt="{{$taggy->nimg}}"/></div>
                        <div class="space_dttt_pckk">
                          <div class="nmbrrr">{{$taggy->nombre}}</div>

                        </div>
                      </a>
                    @endforeach
                  @endif
                </div>
              </div>
              <div class="spac_price_ap">
                <div class="cart">

                </div>

              </div>
            </div>
          </div>
          <div class="fill"></div>
        </div>
      </div>
      @endif
    </section>
    <section class="vertical section5">
      <div class="conteo">5/6</div>
      <div class="background">
        <div class="base5"></div>
        <div class="movimiento5"></div>
      </div>
      <div class="librito"><a class="ir4" href="#">
          <div class="icon-cart"></div></a></div>
      <div class="down"><a href="#"><span></span></a></div>

      <div class="con_index">

      <div class="interno_rigth interno change_colors">
        <div class="interno_t">Maqui</div>
        <div class="interno_des"></div>
        <ul class="lista_corta">
          @if(isset($producto[0]->beneficio))
            @foreach($producto[0]->beneficio as $hpp)
              <li>
                <div class="in_ti">{{$hpp->titulo}}</div>
                <p class="in_p">{{$hpp->nombre}}</p>
              </li>
            @endforeach
          @endif
        </ul>
      </div>
    </div>

      @if(isset($producto[0]->beneficio))
      <div class="ventana_flotante">
        <div class="absulute_all">
          <div class="fill"></div>
          <div class="absolute_rigth absolute">

            <div class="content_ab">
              <div class="left_ab">
                <div class="titulo1_ab">{{$producto[0]->nombre}} </div>
                <div class="complemento_ab">{{$producto[0]->slogan}}.</div>
                <p class="texto_ab">{{substr($producto[0]->descripcion, 0,340)}}{{strlen($producto[0]->descripcion)>340 ? '...': ''}} <a href="{{$producto[0]->url}}">Mas información</a</p>
                <div class="cart">
                  <div class="precio_index">
                    <span class="imsf">Precio: </span> $ {{$producto[0]->precio}}</div>
                  {{--<div class="call_to">--}}
                    {{--<div class="fil">50%</div>--}}
                    {{--<div class="fil2">3° Unidad</div>--}}
                  {{--</div>--}}
                </div>
                <a class="comprar" data-id="{{$producto[0]->id}}" data-slug="{{$producto[0]->url}}" >AÑADIR AL CARRITO</a>
                <div class="call_ab">{{$producto[0]->promo}}</div>
              </div>
              <div class="rigth_ab"> <img src="img/section5/frasco.png" alt=""/></div>
              {{--<div class="footer_ab">
                <ul>
                  <li>
                    {{$producto[0]->palabras}}
                  </li>
                </ul>
              </div>--}}
              <div class="space_cntrl_grddcc">
                <div class="box_packs_index1">
                  @if(isset($tag[3]))
                    @foreach($tag[3]->producto->slice(1) as $taghhg)
                      <a class="box_opcion_indxq1" href="{{$taghhg->url}}">
                        <div class="spc_img_chckksxx"><img src="{{asset('img/'.$taghhg->img)}}" alt="{{$taghhg->nimg}}"/></div>
                        <div class="space_dttt_pckk">
                          <div class="nmbrrr">{{$taghhg->nombre}}</div>
                          {{--                      <div class="cssttt">{{$tagg->precio}}$</div>--}}
                        </div>
                      </a>
                    @endforeach
                  @endif
                </div>
              </div>
              <div class="spac_price_ap">
                <div class="cart">

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endif
    </section>
    <section class="vertical section6">
      <div class="conteo">6/6</div>
      <div class="background">
        <div class="base6"></div>
        <div class="movimiento6"></div>
      </div>
      <div class="librito"><a class="ir5" href="#">
          <div class="icon-cart"></div></a></div>
      <div class="down"><a href="#"><span></span></a></div>

      <div class="con_index">
      <div class="interno_rigth interno change_colors">
        <div class="interno_t">{{$producto[1]->nombre}}</div>
        <div class="interno_des"></div>
        <ul class="lista_corta">
          @if(isset($producto[1]->beneficio))
            @foreach($producto[1]->beneficio as $hhep)
              <li>
                <div class="in_ti">{{$hhep->titulo}}</div>
                <p class="in_p">{{$hhep->nombre}}</p>
              </li>
            @endforeach
          @endif
        </ul>
      </div>
      </div>
      <div class="ventana_flotante">
        <div class="absulute_all">
          <div class="fill"></div>
          <div class="absolute_rigth absolute">
            <div class="content_ab">
              <div class="left_ab">
                <div class="titulo1_ab">{{$producto[1]->nombre}}</div>
                <div class="complemento_ab">{{$producto[1]->slogan}}</div>
                <p class="texto_ab">{{substr($producto[1]->descripcion, 0,340)}}{{strlen($producto[1]->descripcion)>340 ? '...': ''}}
                   <a href="{{$producto[1]->url}}">Mas información</a</p>
                <div class="cart">
                  <div class="precio_index">
                    <span class="imsf">Precio: </span> $ {{$producto[1]->precio}}</div>
                  {{--<div class="call_to">--}}
                    {{--<div class="fil">50%</div>--}}
                    {{--<div class="fil2">3° Unidad</div>--}}
                  {{--</div>--}}
                </div>
                <a class="comprar" data-id="{{$producto[1]->id}}" data-slug="{{$producto[1]->url}}">AÑADIR AL CARRITO</a>
                <div class="call_ab">{{$producto[1]->promo}}</div>
              </div>
              <div class="rigth_ab"> <img src="img/section6/frasco.png" alt="{{$producto[1]->nombre}}"/></div>
              {{--<div class="footer_ab">
                <ul>
                  <li>
                    {{$producto[1]->palabras}}
                  </li>
                </ul>
              </div>--}}
              <div class="space_cntrl_grddcc">
                <div class="box_packs_index1">
                  @if(isset($tag[4]))
                    @foreach($tag[4]->producto->slice(1) as $taggs)
                      <a class="box_opcion_indxq1" href="{{$taggs->url}}">
                        <div class="spc_img_chckksxx"><img src="{{asset('img/'.$taggs->img)}}" alt="{{$taggs->nimg}}"/></div>
                        <div class="space_dttt_pckk">
                          <div class="nmbrrr">{{$taggs->nombre}}</div>
                          {{--                      <div class="cssttt">{{$tagg->precio}}$</div>--}}
                        </div>
                      </a>
                    @endforeach
                  @endif
                </div>
              </div>
              <div class="spac_price_ap">

            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="vertical section7">
     
     <div class="parallax">
       <div class="info_pallx">
         <p>¿Quieres ser distribuidor?</p>
         <a href="tel:{{str_replace(' ', '', $datos->telefono)}}">{{$datos->telefono}}</a>
       </div>
       <div class="sub_info">
         <form action="{{url('newsletter_mayorista')}}" method="post">
           <input type="hidden" name="_token" value="{{ csrf_token() }}">
           <input type="text" name="nombre" placeholder="Tu nombre">
           <input type="email" name="email" placeholder="Tu Email">
           <button type="submit">Enviar</button>
         </form>
       </div>
     </div>
     
     


      <div class="ft-footer">
        <div class="container">
          <div class="cont_ap">
            <div class="c_footer">
              <div class="logo_footer">
                <div class="box_logo_footr_cntrl">
                  <a href="{{url('/')}}">
                    <img src="{{asset('img/logo.png')}}" alt="Facilfood"/>
                  </a>

                </div>
                <div class="pagooooss">
                  <img src="{{asset('img/formas_de_pago.png')}}" alt="Facilfood"/>
                </div>

              </div>

              <div class="mennnu_footer ">
                <h4 class="titt_lis_footer">Súper tienda</h4>
                <a href="{{url('como_comprar')}}">Como comprar</a>
                <a href="{{url('como_pagar')}}">Como pagar</a>
                <a href="{{url('metodo_envio')}}">Metodos de envios</a>
                <a href="{{url('preguntas-frecuentes')}}">Faq's</a>
              </div>
              <div class="social_media_footer ">
                <h4 class="titt_lis_footer">Social</h4>
                <div class="redesssa">
                  @foreach($redes as $redd)
                    <li>
                      <a href="{{$redd->url}}">
                        <div class="icon icon-{{$redd->clase}}"> {{$redd->nombre}}</div>
                      </a>
                    </li>
                  @endforeach
                </div>
              </div>

              <div class="mennnu_footer asdf1">
                <h4 class="titt_lis_footer">Menu</h4>
                <a href="{{url('/tienda')}}">Tienda</a>
                <a href="{{url('salud')}}">Super Tips</a>
                <a href="{{url('distribuidor')}}">Distribuidor</a>
                <a href="{{url('contacto')}}">Contacto</a>
              </div>

              <div class="mennnu_footer asdf1">
                <h4 class="titt_lis_footer">FacilFood</h4>
                <a href="{{url('nosotros')}}">Empresa</a>
                <a href="{{url('politica-privacidad')}}">Politicas de privacidad</a>
                <a href="{{url('politica-de-cookies')}}">Politicas de cookies</a>
                <a href="{{url('como_comprar')}}">Politicas de compras</a>
              </div>


            </div>
          </div>

        </div>
        </div>
        <footer>
          <div class="cont_ap">
            <div class="container">
              <div class="cnttr-fftr">
                <div class="cont_copy">
                  <p>Copyright FacilFood</p>
                </div>
                <div class="bx_medios_pago">

                  <div class="space_logos_footer_mmm">
                    <img src="{{asset('img/envio.jpg')}}" alt="Facilfood"/>
                  </div>

                </div>
              </div>
            </div>
          </div>
          <div class="line_authrr">
            <p>Pagina desarrollada por</p><a href="http://socialestrategia.com/">SocialEstrategia</a>
          </div>
          <a href="#" id="back-to-top" title="Back to top"><div class="icon-arrow-circle-up"></div></a>
        </footer>
      </div>
  </div>


  <script src="{{asset('js/todo.js')}}"></script>
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-117200171-1"></script>
  <script>


      $('.comprar').click(function(e){
          e.preventDefault();
          var loggg = $(this).data('slug');
          var id = $(this).data('id');
          var canti = $("#cantid").val();

          $(this).css({ 'background-color':'#d9edf7',
              'border':'1px solid #505050' });
          $(this).find('i').css({   'color':'#505050'   });

          $(this).css({   'color':'#505050'   });
          $.get('{{url('cart-add/')}}/'+id+'-' + loggg+'/'+ 1, function (res, estado) {
              window.location.href = "{{url('compra')}}";
          });
      });




      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-117200171-1');
  </script>

</body>