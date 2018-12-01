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
      <div class="main_contentt_nuevo">
          <div class="space_top_tienda_new">
              <h1 class="tiitt_tienda_nuevo">Comprar maqui, arandano y spirulina.</h1>
              <form method="get" action="{{url('buscar_truco')}}">
                  <input type="text" name="nombre" placeholder="Buscar..."/>
                  <button type="submit">
                      <img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTYuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgd2lkdGg9IjI0cHgiIGhlaWdodD0iMjRweCIgdmlld0JveD0iMCAwIDMxMC40MiAzMTAuNDIiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDMxMC40MiAzMTAuNDI7IiB4bWw6c3BhY2U9InByZXNlcnZlIj4KPGc+Cgk8Zz4KCQk8cGF0aCBkPSJNMjczLjU4NywyMTQuOTY1YzQ5LjExLTQ5LjExMSw0OS4xMDktMTI5LjAyMSwwLTE3OC4xMzJjLTQ5LjExMS00OS4xMTEtMTI5LjAyLTQ5LjExMS0xNzguMTMsMCAgICBDNTMuNzkzLDc4LjQ5Nyw0Ny40ODMsMTQwLjQ2Miw3Ni41MSwxODguODVjMCwwLDIuMDg1LDMuNDk4LTAuNzMxLDYuMzEyYy0xNi4wNjUsMTYuMDY0LTY0LjI2Myw2NC4yNjMtNjQuMjYzLDY0LjI2MyAgICBjLTEyLjc5MSwxMi43OS0xNS44MzYsMzAuNjc1LTQuNDkzLDQyLjAybDEuOTUzLDEuOTUxYzExLjM0MywxMS4zNDUsMjkuMjI5LDguMzAxLDQyLjAxOS00LjQ5YzAsMCw0OC4wOTYtNDguMDk3LDY0LjEyOC02NC4xMjggICAgYzIuOTUxLTIuOTUxLDYuNDQ4LTAuODY2LDYuNDQ4LTAuODY2QzE2OS45NTgsMjYyLjkzOCwyMzEuOTIzLDI1Ni42MjksMjczLjU4NywyMTQuOTY1eiBNMTE4LjcxMSwxOTEuNzEgICAgYy0zNi4yODgtMzYuMjg4LTM2LjI4Ny05NS4zMzIsMC4wMDEtMTMxLjYyYzM2LjI4OC0zNi4yODcsOTUuMzMyLTM2LjI4OCwxMzEuNjE5LDBjMzYuMjg4LDM2LjI4NywzNi4yODgsOTUuMzMyLDAsMTMxLjYyICAgIEMyMTQuMDQzLDIyNy45OTYsMTU1LDIyNy45OTYsMTE4LjcxMSwxOTEuNzF6IiBmaWxsPSIjRkZGRkZGIi8+CgkJPGc+CgkJCTxwYXRoIGQ9Ik0xMjYuNzUsMTE4LjQyNGMtMS42ODksMC0zLjQwNi0wLjMzMi01LjA2MS0xLjAzMWMtNi42MTEtMi43OTgtOS43MDQtMTAuNDI2LTYuOTA2LTE3LjAzOCAgICAgYzE3LjU4Ni00MS41NTksNjUuNzAzLTYxLjA2MiwxMDcuMjYxLTQzLjQ3NmM2LjYxMSwyLjc5OCw5LjcwNCwxMC40MjYsNi45MDYsMTcuMDM4Yy0yLjc5OSw2LjYxMi0xMC40MjUsOS43MDMtMTcuMDM5LDYuOTA2ICAgICBjLTI4LjM1NC0xMS45OTgtNjEuMTg2LDEuMzA5LTczLjE4MywyOS42NjNDMTM2LjYyOSwxMTUuNDQ1LDEzMS44MTUsMTE4LjQyNCwxMjYuNzUsMTE4LjQyNHoiIGZpbGw9IiNGRkZGRkYiLz4KCQk8L2c+Cgk8L2c+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPC9zdmc+Cg==" />
                  </button>
              </form>
          </div>
          <div class="proddss">
          @foreach($productos as $ppo)
          <div class="box_producto_nw">
              <div class="space_img_prd_nw">
                  @if($ppo->oferta==1)
                    <div class="oferrta_rr">¡Oferta!</div>
                  @endif
                  <div class="bx_cntrl_prddd_nw">
                      @if(file_exists(public_path('img/'.$ppo->img)))
                          <img src="{{asset('img/'.$ppo->img)}}" alt=""{{$ppo->nimg}}/>
                      @else
                          <img src="{{asset('img/no-image.jpg')}}" alt="Facilfood"/>
                      @endif
                  </div>
                  <div class="rn_name">{{$ppo->nombre}}</div>
              </div>
              <div class="dett_prddct_nw">
                  <div class="cntrl_bg_cnt_dt_nw">
                      <div class="spac_btms_dt_nw">
                          <a class="vver" href="{{ url("$ppo->url") }}">Ver</a>
                          <div class="price_prd">
                                <span class="jfonss">{{$ppo->nombre}}</span>
                              @if(isset($ppo->precio_falso))
                                  <span class="p_falso">$ {{$ppo->precio_falso}}</span>
                              @endif
                              <span class="p_normal">$ {{$ppo->precio}}</span>
                          </div>
                          <a class="caar addd-carttt" href="#" data-id="{{$ppo->id}}" data-slug="{{$ppo->url}}">
                              <div class="icon-cart"></div>
                          </a>
                      </div>
                  </div>
              </div>
          </div>
          @endforeach
          </div>
        @include('inc.dere_pro')
    </div>
    </div>
  </section>
@endsection
@section('script')
<script>
    $('.addd-carttt').click(function(e){
        e.preventDefault();
        var loggg = $(this).data('slug');
        var id = $(this).data('id');
        var canti = $("#cantid").val();

        $(this).css({ 'background-color':'#d9edf7',
            'border':'1px solid #505050' });
        $(this).find('i').css({   'color':'#505050'   });

        $(this).css({   'color':'#505050'   });
        $.get('{{url('cart-add/')}}/'+id+'-' + loggg+'/'+ 1, function (res, estado) {
            $('#cantidadProductos').text(res);
        });
    });
</script>

@endsection