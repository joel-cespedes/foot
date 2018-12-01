@extends('inc.base')
@section('title'){{ isset($seo) ? $seo->m_title:''}}@endsection
@section('m-description'){{ isset($seo) ? $seo->m_description:''}}@endsection
@section('m-keywords'){{ isset($seo) ? $seo->m_key:''}}@endsection
@section('canonical')@if(isset($seo->canonical))<link rel=”canonical” href=”{{$seo->canonical}}” />@endif @endsection
@section('section')
  <div class="call_t_action">
    <div class="envio1">¡Envío gratis a todo Chile!</div>
  </div>



  <section class="carrito_compss pg_contenido ">

      <div class="element1">
          <img src="{{asset('img/elemento1.jpg')}}" alt="">
      </div>
      <div class="element2">
          <img src="{{asset('img/elemento2.jpg')}}" alt="">
      </div>
      <div class="element3">
          <img src="{{asset('img/elemento3.jpg')}}" alt="">
      </div>


    <div class="gftt_btmm">
      <img src="img/gftt1.png" alt=""/>
    </div>


    @if(Session::get('cart')==null)


      <div class="container">
          <h4 class="tiit_contcc">Tu carrito de compras</h4>
        <div class="space_compl_compra">
          <div class="space_para_texto_pago">
            <div class="ggsd icon icon-bag-1"></div>
            <div class="tiittt_tx">Debes agregar antes un producto al carrito.</div>
            <p>{{$datos->condiciones_compra}} </p>
          </div>
        </div>
      </div>

    @else

    <div class="container">
    <h4 class="tiit_contcc">Tu carrito de compras</h4>
      <div class="space_carrito">
        <div class="tabbl">
          <div class="top_tbblll_cartt">
            <div class="spc-foto"></div>
            <div class="spc-elimm">Producto</div>
            <div class="spc-producto">Detalle</div>
            <div class="spc-cantidad">Cant.</div>
            <div class="spc-precio">Precio</div>
          </div>



          <div class="space_cntrl_carrrtt1">
          @foreach($car as $ha)

          <div class="cntrl_line_cart">
            <div class="line_tbl_cart">
              <a class="space_photo" href="{{$ha->url}}">
                @if(file_exists(public_path('img/'.$ha->img)))
                  <img src="{{asset('img/'.$ha->img)}}" alt="{{$ha->nimg}}"/>
                @else
                  <img src="{{asset('img/no-image.jpg')}}" alt="Facilfood"/>
                @endif
              </a>
              <div class="btm_eliminar"><a  href="{{url('cart-borrar/'.$ha->id.'-'.$ha->url)}}" onclick="return confirm('seguro que deseas eliminarlo?')">x</a></div>
              <a class="space_info_pedido" href="#">
                <h5>{{substr($ha->nombre, 0,40)}}{{strlen($ha->nombre)>40 ?'...': ''}}</h5>
                <p>{{substr($ha->descripcion, 0,350)}}{{strlen($ha->descripcion)>350 ?'...': ''}}</p>
              </a>
              <div class="space_pedidoo">
                <input type="number" id="{{$ha->id}}"  min="1" max="50" value="{{$ha->cantidad}}"/>
                <button type="submit" class="dfsg actualizar{{$ha->id}}" data-slug="{{$ha->slug}}" id="{{$ha->id}}">Actualizar</button>
              </div>
              <div class="pricee pre_u{{$ha->id}}">${{$ha->cantidad*$ha->precio}}</div>
            </div>
          </div>
          @endforeach
        </div>

        </div>
        <div class="line-btm_toottt_pedido">
          <div class="boton-back"> <a href="{{ url('tienda') }}">Seguir Comprando</a></div>
          <div class="space_total_p">
              <div class="total">
                  <span  class="gs_env">SubTotal:</span><div class="sub_tt">$ {{$conteo_carrito}}</div></div>
              <div class="total">
                  <span  class="gs_env">Envío:</span><div class="gs_env asdee">  {{$subtotal==0? 'GRATIS': '$ '.$subtotal}}</div></div>
             @if(Session::has('cupon'))
              <div class="total hhhhh">
                  <span  class="gs_env">Cupon de Descuento: </span><div class="gs_env asdee">-  $ {{Session::get('cupon')[0]}}</div>
              </div>
              @endif
            <div class="total">
                <span  class="gs_env">Total:</span> <span class="tott">$ {{$total}}</span>
            </div>
          </div>
        </div>
          <div class="cupons">
              <div></div>
              <div class="leffs">
                  <div class="alertCupon">Cupón inválido</div>
                  <input type="text" id="cupon" placeholder="Ingrésa tu número de cupón">
                  <div class="textCup">
                      <button id="sendcupon">Aplicar Cupón</button>
                  </div>

              </div>
          </div>
        <div class="space_compl_compra">
          <div class="space_para_texto_pago">
            <div class="tiittt_tx">Condiciones de Compra.</div>
            <p>{{$datos->condiciones_compra}} </p>
            </div>
          <div class="form_completar_pedido">
            <div class="space_carrito">
              <h3 class="top_carrt">Tranferencia o Cotización</h3>
            </div>

              <div class="cuentas_bank">
                 <!-- <div class="line_btm_enviar_pedido2">
                      <div class="ggsdf">Pagar con Tranferencia</div>
                  </div>-->
                  <div class="bank_title">
                    <span class="icon-plus-circle">
                      </span> Cuentas bancarias</div>
                  <div class="dcuentas">
                   {!! $datos->cuentas !!}
                  </div>
              </div>
            <form method="post" action="{{url('pedido')}}" class="pa_form" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="space_grd_env_pedido">
                <input type="text" name="nombre" placeholder="Nombre" required/>
                <input type="text" name="email" placeholder="Correo" required/>
                <input type="text" name="telefono" placeholder="Telefono" required/>
                <input type="text" name="identificacion" placeholder="Documento de identidad" required/>
                <textarea name="direccion" cols="30" rows="7" placeholder="Direccion de Envío"></textarea>
                <textarea name="mensaje" class="gassg" cols="30" rows="10" placeholder="Mensaje"></textarea>
              </div>
              <input type="file" name="img" class="jfilestyle"/>
              <div class="line_btm_enviar_pedido">
                <button type="submit">Enviar</button>
              </div>
            </form>
          </div>

          <div class="ooo"> <span></span></div>
          <div class="space_rgbb">
            <div class="space_carrito">
              <h3 class="top_carrt">Pago On-Line</h3>
            </div>
              <div class="box_pasas_khipu">
                  <a href="{{url('/k')}}">
                      <div class="text"> Pagar con Khipu</div>
                      <div class="log"><img src="{{asset('img/khipu.png')}}" alt="khipu"></div>
                  </a>
              </div>
            <div class="box_pass_pago">
              <div class="box_input_metodo_pago ">
                <a href="{{url('paypal_pago')}}">
                  <img width="100" src="img/paypal.png" /></span>
                </a>
              </div>
                <div class="line_btm_enviar_pedido2">
                    <a href="{{url('paypal_pago')}}" type="submit">Pagar con Paypal</a>
                </div>
            </div>

          </div>
        </div>
      </div>
    </div>
@endif
  </section>
  @endsection
@section('script')


  <script>

      $('#sendcupon').click(function(e){
          e.preventDefault();
            var cupon =$('#cupon').val().replace(' ','');
          if(cupon.length<4){
              $('.alertCupon').slideToggle(200);
              return false;
          }else{
              $('.alertCupon').slideUp(200);
          }
          $.get('{{url('enviar_cupon/')}}/'+cupon, function (ress, estado) {
              if(ress==26){
                  $('.alertCupon').slideDown(200);   return false;
              }
              $('#sendcupon').text('Cupón Aplicado');
              $('#cupon').val('¡Felicidades!');
              conteo_carrito();
              traer_subtotal();
              traer_to();
              location.reload();
          });
      });


      $('.ggsdf').click(function () {
          return false;
      });


      $(":file").jfilestyle(
          {placeholder: "Agregar Recibo de pago",
              text: "Subir"}
          );
      $('.dfsg').click(function(e){
          e.preventDefault();
          var id=   $(this).attr('id');
          var inputs =  $("input[id="+id+"]");
          var loggg = $(this).data('slug');
          var cantidad = inputs.val();
          $.get('{{url('cart_actualizar/')}}/'+id+'-' + loggg + '/'+cantidad, function (res, estado) {
            $('.actualizar'+id).text('actualizado');
            $('.pre_u'+id).text('$ '+res);
              conteo_carrito();
              traer_subtotal();
              traer_to();
          });

          traer_to();
          return false;
      });
      function  traer_to() {
          $.get('{{url('traer_total/')}}', function (ress, estado) {
              $('.tott').text('$ '+ress)
          });
      }
    function  conteo_carrito() {
          $.get('{{url('conteo_carrito/')}}', function (ressr, estado) {
              $('.sub_tt').text('$ '+ressr)
          });
      }
      function traer_subtotal() {
          $.get('{{url('traer_subtotal/')}}', function (envio, estado) {
              if(envio==0){
                  $('.asdee').text('GRATIS')
              }else{
                  $('.asdee').text('$ '+envio)
              }

          });
      }







  </script>
@endsection