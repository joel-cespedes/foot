@extends('admin.adm.base')
@section('css')
    <link href="{{asset('admin/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css')}}" rel="stylesheet">
    @endsection
@section('section')
    <div class="page-title">
        <div class="title_left">
            <h3><a href="{{URL::previous()}}" class="btn btn-default"> <i class="fa fa-angle-double-left"></i>Volver</a></h3>
        </div>
        <div class="title_right text-right">
            <h4>Empresas</h4>
        </div>
    </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="text-center">
                        <a href="{{ url('adm/producto/create') }}" class="btn btn-app text-center">
                            <i class="fa fa-plus-circle"></i> Agregar Nuevo
                        </a>
                    </div>
                    <div class="col-sm-12">
                        <div class="row">
                            <table id="datatable-buttons" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Imágen</th>
                                    <th>Categoría a la que pertenece</th>
                                    <th>Visitas</th>
                                    <th style="width: 100px">Accion</th>
                                </tr>
                                </thead>
                                <input type="hidden" id="oam" value="{{count($cpro)}}">
                                <tbody class="sopor">
                                @foreach($cpro as $pro)
                                   <tr id="tabla_{{$pro->id}}">
                                    <td>{{$pro->id}}</td>
                                    <td>{{$pro->nombre}}</td>
                                    <td class="text-center">
                                        @if($pro->img)
                                        <img src="{{asset('img/'.$pro->img)}}" width="40" alt="">
                                        @endif
                                    </td>
                                       <td>{{$pro->cproducto['nombre']}}</td>
                                    <td>{{$pro->visitas }}</td>
                                    <td>
                                        <div class="botns">
                                            <a href="{{ url('adm/producto/'.$pro->id.'/edit') }}" class="btn btn-raised btn-primary btn-xs">Editar<i class="fa fa-edit"></i>
                                                <div class="ripple-container"></div>
                                            </a>
                                            {!! Form::open(['url'=>'adm/producto/'.$pro->id,'method'=>'DELETE']) !!}
                                            <button class="btn btn-raised btn-danger btn-xs" onclick="return confirm('seguro que deseas eliminarlo?')">Eliminar<i class="fa fa-trash-o"></i>
                                                <div class="ripple-container"></div>
                                            </button>
                                            {!! Form::close() !!}
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                              </tbody>
                            </table>
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
    <script src="{{asset('admin/js/moment-with-locales.js')}}"></script>
    <script src="{{asset('admin/js/bootstrap-datetimepicker.js')}}"> </script>
      <script>


          $('.fa-trash').click(function(e) {
              var var_id =$(this).data('id');
              $.get("eliminar_horario/"+e.target.id, function(das){
                  $('#myModal'+var_id).modal('toggle');
                  location.reload();
                });
          });

              $('.days-list a').on('click', function(){
                  if ($(this).hasClass('active-day')){
                      $(this).removeClass('active-day');
                  }else{
                      $(this).addClass('active-day');
                  }
              });




          for(i=1; i<=1000 ; i++){
                  $('.entrada'+i).datetimepicker({
                      format:'LT'
                  });
                  $('.salida'+i).datetimepicker({
                      format:'LT'
                  });
              }



          $('.hoja').change(function (e) {
              var jsid= e.target.id;
              var apertura = $(this).parents().parents().find('#apertura'+jsid);
              var cierre = $(this).parents().parents().find('#cierre'+jsid);
              if ($(this).is(':checked')) {
                  $(apertura).addClass('ss');
                  $( cierre).addClass('ss');
              }else {
                  $(apertura).removeClass('ss');
                  $( cierre).removeClass('ss');
              }
          });


          $( ".sopor" ).sortable({
              update: function(event, ui) {
                  var orden = $(this).sortable('toArray').toString();

                  $.ajax({
                      url: '{{url('adm/orden_redes')}}',
                      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                      data: {"data": orden},
                      type: 'post'
                  }).done(function(data) {
                      console.log(data);
                  });
              }
          });




    </script>
 @endsection