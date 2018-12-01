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
            <h3><a href="{{URL::previous()}}" class="btn btn-default"> <i class="fa fa-angle-double-left"></i>&nbsp;Volver</a></h3>
        </div>

        <div class="title_right text-right">
            <h4>Pedidos</h4>
        </div>
    </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                            <div class="col-sm-12">
                        <div class="row">

                            <table id="datatable-buttons" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Comprado por:</th>
                                    <th>Estado</th>
                                    <th>Despacho</th>
                                    <th>Entrega</th>
                                    <th>Cantidad de productos</th>
                                    <th>Detalles</th>
                                    <th>Fecha</th>
                                    <th>Total</th>

                                </tr>
                                </thead>

                                <tbody class="sopor">
                                @foreach($cpro as $pro)
                                <tr id="tabla_{{$pro->id}}">
                                    <td>{{$pro->id}}</td>
                                    <td>{{$pro->nombre}} </td>

                                    <td>

                                        @if($pro->estado ==1)
                                            <a data-v="{{$pro->id}}" class="btn pedi btn-raised btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="Cambiar de estado" data-original-title="Cambiar de estado">Procesado</a>
                                        @else
                                            <a data-v="{{ $pro->id }}" class="btn pedi btn-raised btn-default btn-xs" data-toggle="tooltip" data-placement="top" title="Cambiar de estado" data-original-title="Cambiar de estado">Sin procesar</a>
                                        @endif
                                    </td>
                                    <td>

                                        @if($pro->despachado ==1)
                                            <a data-v="{{$pro->id}}" class="btn despachado btn-raised btn-primary btn-xs" data-toggle="tooltip" data-placement="top" title="Cambiar de estado" data-original-title="Cambiar de estado">Despachado</a>
                                        @else
                                            <a data-v="{{ $pro->id }}" class="btn despachado btn-raised btn-default btn-xs" data-toggle="tooltip" data-placement="top" title="Cambiar de estado" data-original-title="Cambiar de estado">Sin despachar</a>
                                        @endif
                                    </td>
                                    <td>
                                         @if($pro->entregado ==1)
                                            <a data-v="{{$pro->id}}" class="btn entregado btn-raised btn-success btn-xs" data-toggle="tooltip" data-placement="top" title="Cambiar de estado" data-original-title="Cambiar de estado">Entregado</a>
                                        @else
                                            <a data-v="{{ $pro->id }}" class="btn entregado btn-raised btn-default btn-xs" data-toggle="tooltip" data-placement="top" title="Cambiar de estado" data-original-title="Cambiar de estado">Sin Entregar</a>
                                        @endif



                                    </td>
                                    <td>{{count($pro->detalle)}}</td>
                                    <td><a href="{{url('adm/ver_detalle/'.$pro->id.'')}}" class="btn btn-raised btn-info btn-xs">Ver detalles</a></td>
                                    <td>{{ $pro->updated_at->format('d-m-Y') }}</td>
                                    <td>$ {{$pro->total}}</td>

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
    <script>


        $( ".sopor" ).sortable({
            update: function(event, ui) {
                var orden = $(this).sortable('toArray').toString();

                $.ajax({
                    url: '{{url('admin/order_tag')}}',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: {"data": orden},
                    type: 'post'
                }).done(function(data) {
                    console.log(data);
                });
            }
        });
        $(document).ready(function() {
            var handleDataTableButtons = function() {
                if ($("#datatable-buttons").length) {
                    $("#datatable-buttons").DataTable({
                        "pageLength": 50,
                        "lengthMenu": [ 10, 25, 50, 75, 100 ],
                        dom: "Bfrtip",
                        buttons: [
                            {
                                extend: "copy",
                                className: "btn-sm"
                            },
                            {
                                extend: "csv",
                                className: "btn-sm"
                            },
                            {
                                extend: "excel",
                                className: "btn-sm"
                            },
                            {
                                extend: "pdfHtml5",
                                className: "btn-sm"
                            },
                            {
                                extend: "print",
                                className: "btn-sm"
                            }
                        ],

                        responsive: true
                    });
                }
            };

            TableManageButtons = function() {
                "use strict";
                return {
                    init: function() {
                        handleDataTableButtons();
                    }
                };
            }();

            TableManageButtons.init();
        });

        $('.pedi').click(function(e){
            var elid = $(this).data('v');
            $.get('{{url('adm/cambiar_pedido/')}}/' + elid, function (res, estado) {

                if(res==1){
                    $(e.target).removeClass('btn-default').addClass('btn-info').text('Procesado');
                }
                if(res==0){
                    $(e.target).removeClass('btn-info').addClass('btn-default').text('Sin procesar');
                }
            });
        });
        $('.despachado').click(function(e){
            var elid = $(this).data('v');
            $.get('{{url('adm/cambiar_despachado/')}}/' + elid, function (res, estado) {

                if(res==1){
                    $(e.target).removeClass('btn-default').addClass('btn-primary').text('Despachado');
                }
                if(res==0){
                    $(e.target).removeClass('btn-primary').addClass('btn-default').text('Sin despachar');
                }
            });
        });

        $('.entregado').click(function(e){
            var elid = $(this).data('v');
            $.get('{{url('adm/cambiar_entregado/')}}/' + elid, function (res, estado) {

                if(res==1){
                    $(e.target).removeClass('btn-default').addClass('btn-success').text('Entregado');
                }
                if(res==0){
                    $(e.target).removeClass('btn-success').addClass('btn-default').text('Sin entregar');
                }
            });
        });



    </script>
 @endsection