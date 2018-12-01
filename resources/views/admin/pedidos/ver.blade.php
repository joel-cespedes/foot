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
            <h4>Detalle Pedido</h4>
        </div>
    </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 lsnd">
                <div class="x_panel">

                       <div class="col-sm-12 lsnd">
                        <div class="row">
                            <div class="panel panel-default">
                                <div class="panel-heading">Pedido Número: {{$pedido->id}}</div>
                                <div class="panel-body" style="padding: ">
                                    <div class="present">
                                        <div class="d_logo"><img src="{{asset('admin/images/logo_original.png')}}" width="100"></div>
                                        <div class="fegh">Fecha: {{$pedido->updated_at->format('d-m-Y')}}</div>
                                    </div>

                                    <br><br>
                                    <div class="li"> <strong>Nombres : </strong>{{$pedido->nombre}} &nbsp; {{$pedido->nombre}}</div>
                                    <div class="li"> <strong>C.i.:</strong> {{$pedido->ci}}</div>
                                    <div class="li"> <strong>Email:</strong> {{$pedido->email}}</div>
                                    <div class="li"> <strong>Teléfono:</strong> {{$pedido->telefono}}</div>
                                    <div class="li"> <strong>Dirección 1: </strong>{{$pedido->direccion1}}</div>
                                    <div class="li"> <strong>Dirección 2:</strong> {{$pedido->direccion2}}</div>
                                    <div class="li"> <strong>Tipo de Compra: </strong>{{$pedido->compra}}</div>
                                    <div class="li"> <strong>Referencia: </strong>{{$pedido->referencia}}</div>
                                    <div class="li"> <strong>Rif: </strong>{{$pedido->rif}}</div>
                                   @if(isset($pedido->img))
                                    <div class="li"> <strong>Imágen o archivo adjunto: </strong>
                                        <a href="{{ url('img/'.$pedido->img) }}">Descargar</a>
                                    </div>
                                    @else
                                    <div class="li"> <strong>Imágen o archivo adjunto: </strong>
                                        Sin archivo
                                    </div>
                                    @endif

                                </div>



                                <br><br><br>
                                <ul class="list-group">
                                    <li class="list-group-item kdb dkns">
                                        <div class="colu1">Id</div>
                                        <div class="colu1">Cantidad</div>
                                        <div class="colu2">Producto</div>
                                        <div class="colu3">Precio</div>
                                    </li>

                                    @foreach($pedido->detalle as $dd)
                                        <li class="list-group-item kdb">
                                            <div class="colu1">{{$dd->id}}</div>
                                            <div class="colu1">{{$dd->cantidad}}</div>
                                            <div class="colu2">{{$dd->nombre}}</div>
                                            <div class="colu3">{{$dd->precio}}</div>
                                        </li>
                                        @endforeach

                                        <li class="list-group-item kdb dkns">
                                            <div class="col1"></div>
                                            <div class="col2">Total</div>
                                            <div class="colu3">{{$pedido->total}}</div>
                                        </li>
                                </ul>
                                <br><br><br>
                                <div class="text-center">
                                 <a href='javascript:window.print(); void 0;' class="btn btn-default">Imprimir</a>
                                </div>
                                <br><br><br>


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

            $.get('{{url('admin/cambiar_pedido/')}}/' + elid, function (res, estado) {

                if(res==1){

                    $(e.target).removeClass('btn-default').addClass('btn-info').text('Procesado');

                }
                if(res==0){

                    $(e.target).removeClass('btn-info').addClass('btn-default').text('Sin procesar');
                }

            });

        });



    </script>
 @endsection