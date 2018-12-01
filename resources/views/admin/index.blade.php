@extends('admin.adm.base')
@section('css')
  <link href="{{asset('admin/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('admin/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('admin/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('admin/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('admin/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css')}}" rel="stylesheet">
@endsection
@section('section')
  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">

        <div class="col-sm-12">
          <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="dashboard_graph">

                <div class="row jjsd">
                  <div class="row tile_count">
                    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                      <span class="count_top">Categorías de Productos</span>
                      <div class="count">{{count($cempresas)}}</div>
                    </div>
                      <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                          <span class="count_top">Total de Productos</span>
                          <div class="count">{{count($empresas)}}</div>
                      </div>

                      <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                          <span class="count_top">Categorías de Noticias</span>
                          <div class="count">{{count($cnoticias)}}</div>
                      </div>
                      <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                          <span class="count_top">Total de Noticias</span>
                          <div class="count">{{count($noticias)}}</div>
                      </div>
                      <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                          <span class="count_top">Comentarios</span>
                          <div class="count">{{count($comentarios)}}</div>
                      </div>
                      <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                          <span class="count_top">Cantidad de Visitas</span>
                          <div class="count">{{$datos}}</div>
                      </div>

                  </div>
                </div>
              </div>
              </div>

                  <div class="col-md-6">
                    <div class="x_panel">
                     <div id="div2"></div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="x_panel">
                        <div id="div3"></div>
                    </div>
                  </div>
              <div class="col-md-4">
                  <div class="x_panel">
                      <div class="x_title">
                          <h2>Últimos Productos</h2>
                          <ul class="nav navbar-right panel_toolbox">
                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                              </li>
                              <li class="dropdown">
                                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                  <ul class="dropdown-menu" role="menu">
                                      <li><a href="#">Settings 1</a>
                                      </li>
                                      <li><a href="#">Settings 2</a>
                                      </li>
                                  </ul>
                              </li>
                              <li><a class="close-link"><i class="fa fa-close"></i></a>
                              </li>
                          </ul>
                          <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                          @foreach($empresas->take(6) as $cl)
                              <article class="media event">
                                  <a class="pull-left date">
                                      <p class="day">{{ $cl->updated_at->format('M') .' '. $cl->updated_at->format('d') }}</p>
                                      <p class="day">{{ $cl->updated_at->format('h:i') }}</p>
                                  </a>
                                  <div class="media-body">
                                      <a class="title" href="#">{{substr($cl->nombre,0,60) }}..</a>
                                      <p> {{substr($cl->descripcion,0,45) }}.. </p>
                                  </div>
                              </article>
                          @endforeach

                      </div>
                  </div>
              </div>
              <div class="col-md-4">
                  <div class="x_panel">
                      <div class="x_title">
                          <h2>Últimas Noticias</h2>
                          <ul class="nav navbar-right panel_toolbox">
                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                              </li>
                              <li class="dropdown">
                                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                  <ul class="dropdown-menu" role="menu">
                                      <li><a href="#">Settings 1</a>
                                      </li>
                                      <li><a href="#">Settings 2</a>
                                      </li>
                                  </ul>
                              </li>
                              <li><a class="close-link"><i class="fa fa-close"></i></a>
                              </li>
                          </ul>
                          <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                          @foreach($noticias->take(6) as $clg)
                              <article class="media event">
                                  <a class="pull-left date">
                                      <p class="day">{{ $clg->updated_at->format('M') .' '. $clg->updated_at->format('d') }}</p>
                                      <p class="day">{{ $clg->updated_at->format('h:i') }}</p>
                                  </a>
                                  <div class="media-body">
                                      <a class="title" href="#">{{substr($clg->nombre,0,60) }}..</a>
                                      <p> {{substr($clg->descripcion,0,45) }}.. </p>
                                  </div>
                              </article>
                          @endforeach

                      </div>
                  </div>
              </div>
              <div class="col-md-4">
                  <div class="x_panel">
                      <div class="x_title">
                          <h2>Últimos Comentarios</h2>
                          <ul class="nav navbar-right panel_toolbox">
                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                              </li>
                              <li class="dropdown">
                                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                  <ul class="dropdown-menu" role="menu">
                                      <li><a href="#">Settings 1</a>
                                      </li>
                                      <li><a href="#">Settings 2</a>
                                      </li>
                                  </ul>
                              </li>
                              <li><a class="close-link"><i class="fa fa-close"></i></a>
                              </li>
                          </ul>
                          <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                          @foreach($comentarios->take(6) as $c)
                              <article class="media event">
                                  <a class="pull-left date">
                                      <p class="day">{{ $c->updated_at->format('M') .' '. $c->updated_at->format('d') }}</p>
                                      <p class="day">{{ $c->updated_at->format('h:i') }}</p>
                                  </a>
                                  <div class="media-body">
                                      <a class="title" href="#">{{substr($c->nombre,0,60) }}..</a>
                                      <p> {{substr($c->comentario,0,45) }}.. </p>
                                  </div>
                              </article>
                          @endforeach

                      </div>
                  </div>
              </div>


        </div>
      </div>

  </div>
  </div>

@endsection
@section('script')
  <script src="{{asset('admin/vendors/datatables.net/js/jquery.dataTables.js')}}"></script>
  <script src="{{asset('admin/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
  <script src="{{asset('admin/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
  <script src="{{asset('admin/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
  <script src="{{asset('admin/vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
  <script src="{{asset('admin/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
  <script src="{{asset('admin/vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
  <script src="{{asset('admin/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
  <script src="{{asset('admin/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
  <script src="{{asset('admin/vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
  <script src="{{asset('admin/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
  <script src="{{asset('admin/vendors/datatables.net-scroller/js/datatables.scroller.min.js')}}"> </script>


  <script type="text/javascript">


      Highcharts.getOptions().colors = Highcharts.map(Highcharts.getOptions().colors, function (color) {
        return {
          radialGradient: {
            cx: 0.5,
            cy: 0.3,
            r: 0.7
          },
          stops: [
            [0, color],
            [1, Highcharts.Color(color).brighten(-0.3).get('rgb')]
          ]
        };
      });


      var torta = {
          chart: {
              renderTo: 'div2',
              type: 'pie',
              options3d: {
                  enabled: true,
                  alpha: 45
              } },
          title: {
              text: 'Productos mas Visitados'
          },
          plotOptions: {
              pie: {
                  innerSize: 100,
                  depth: 45
              }},
          series: [{
              name: 'Delivered amount',
              data: []
          }]
      };
      $.get('adm/empresas_visistadas',function(resultado){
          console.log(resultado);
      var dat =resultado;
         for(i=0 ; i< dat.length  ;i++){
           var obje = {name: dat[i].nombre.substring(0,9), y:parseInt(dat[i].visitas)} ;
            torta.series[0].data.push(obje);
              };

        var torta_lista = new Highcharts.chart(torta);
      });



      var paginas = {
        chart: {
          renderTo: 'div3',
          type: 'pie',
          options3d: {
            enabled: true,
            alpha: 45
          } },
        title: {
          text: 'Noticias mas Visitadas'
        },
        plotOptions: {
          pie: {
            innerSize: 100,
            depth: 45
          }},
        series: [{
          name: 'Delivered amount',
          data: []
        }]
      };
      $.get('adm/noticias_visistadas',function(resultad){
        var dats =resultad;
        console.log(resultad);

        for(i=0 ; i<= dats.length-2  ;i++){
          var obje = {name: dats[i].nombre.substring(0,15), y:parseInt(dats[i].visitas)} ;
          paginas.series[0].data.push(obje);
        };

        var paginas_lista = new Highcharts.chart(paginas)
      });



  </script>


@endsection