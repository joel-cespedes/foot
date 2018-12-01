@extends('admin.adm.base')
@section('css')
    <link href="{{asset('admin/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/vendors/starrr/dist/starrr.css')}}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="{{asset('admin/vendors/starrr/dist/starrr.js')}}"></script>
    @endsection
@section('section')
    <div class="page-title">
        <div class="title_left">
            <h3><a href="{{URL::previous()}}" class="btn btn-default"> <i class="fa fa-angle-double-left"></i>&nbsp;Volver</a></h3>
        </div>

        <div class="title_right text-right">
            <h4>Comentarios</h4>
        </div>
    </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                           {{--<div class="text-center">--}}
                               {{--<a href="{{ url('adm/comentario/create') }}" class="btn btn-app text-center">--}}
                                   {{--<i class="fa fa-plus-circle "></i> Agregar Nuevo--}}
                               {{--</a>--}}
                           {{--</div>--}}

                            <div class="col-sm-12">
                        <div class="row">
                            <table id="datatable-buttons" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Comentario</th>
                                    <th>Articulo</th>
                                    <th>Estado</th>
                                    <th>Puntuación</th>

                                    <th style="width: 100px">Accion</th>
                                </tr>
                                </thead>

                                <tbody class="sopor">
                                @foreach($cpro as $pro)
                                   <tr id="tabla_{{$pro->id}}">
                                    <td>{{$pro->id}}</td>
                                    <td>{{$pro->nombre}}</td>
                                    <td>{{$pro->comentario}}</td>
                                    <td>@if(isset($pro->empresa))
                                           {{$pro->empresa->nombre}}
                                        @elseif(isset($pro->noticia))
                                            {{$pro->noticia->nombre}}
                                        @endif
                                    </td>
                                    <td>@if($pro->estado ==1)
                                            <a data-v="{{$pro->id}}" class="btn est_cate btn-raised btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="Cambiar de estado" data-original-title="Cambiar de estado">Aprobado</a>
                                        @else
                                            <a data-v="{{ $pro->id }}" class="btn est_cate btn-raised btn-default btn-xs" data-toggle="tooltip" data-placement="top" title="Cambiar de estado" data-original-title="Cambiar de estado">No aprobado</a>
                                        @endif</td>
                                    <td>  <div class='starrr'></div>
                                        <script>$('.starrr').starrr({
                                                rating:'{{$pro->puntuacion}}',
                                                readOnly:true
                                            });</script>
                                    </td>
                                    <td>
                                        <div class="botns">
                                            <a href="{{ url('adm/comentario/'.$pro->id.'/edit') }}" class="btn btn-raised btn-primary btn-xs">Editar<i class="fa fa-edit"></i>
                                                <div class="ripple-container"></div>
                                            </a>
                                            {!! Form::open(['url'=>'adm/comentario/'.$pro->id,'method'=>'DELETE']) !!}
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
                                <div class="text-center">
                                    {{$cpro->links()}}
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

      <script>




          $('.est_cate').click(function(e){
              var elid = $(this).data('v');
              $.get('{{url('adm/cambiar_comentario/')}}/' + elid, function (res, estado) {
                  if(res==1){
                      $(e.target).removeClass('btn-default').addClass('btn-info').text('Aprobado');
                  }
                  if(res==0){
                      $(e.target).removeClass('btn-info').addClass('btn-default').text('No aprobado');
                  }
              });
          });

      {{--$( ".sopor" ).sortable({--}}
                {{--update: function(event, ui) {--}}
                    {{--var orden = $(this).sortable('toArray').toString();--}}
                    {{--$.ajax({--}}
                        {{--url: '{{url('adm/orden_comentarios')}}',--}}
                        {{--headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},--}}
                        {{--data: {"data": orden},--}}
                        {{--type: 'post'--}}
                    {{--}).done(function(data) {});--}}
                {{--}--}}
            {{--});--}}

        // $(document).ready(function() {
        //     var handleDataTableButtons = function() {
        //         if ($("#datatable-buttons").length) {
        //             $("#datatable-buttons").DataTable({
        //                 "pageLength": 50,
        //                 "lengthMenu": [ 10, 25, 50, 75, 100 ],
        //                 dom: "Bfrtip",
        //                 buttons: [
        //                     {
        //                         extend: "copy",
        //                         className: "btn-sm"
        //                     },
        //                     {
        //                         extend: "csv",
        //                         className: "btn-sm"
        //                     },
        //                     {
        //                         extend: "excel",
        //                         className: "btn-sm"
        //                     },
        //                     {
        //                         extend: "pdfHtml5",
        //                         className: "btn-sm"
        //                     },
        //                     {
        //                         extend: "print",
        //                         className: "btn-sm"
        //                     }
        //                 ],
        //
        //                 responsive: true
        //             });
        //         }
        //     };
        //
        //     TableManageButtons = function() {
        //         "use strict";
        //         return {
        //             init: function() {
        //                 handleDataTableButtons();
        //             }  };
        //     }();
        //     TableManageButtons.init();
        // });

        $('.esta').click(function(e){
            var elid = $(this).data('v');
            $.get('{{url('adm/cambiar_programa/')}}/' + elid, function (res, estado) {
                if(res==1){
                    $(e.target).removeClass('btn-default').addClass('btn-info').text('Activo');
                }
                if(res==0){

                    $(e.target).removeClass('btn-info').addClass('btn-default').text('Inactivo');
                }
            });

        });



    </script>
 @endsection