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
            <h4>Cupones</h4>
        </div>
    </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                           <div class="text-center">
                               <a href="{{ url('adm/cupon/create') }}" class="btn btn-app text-center">
                                   <i class="fa fa-plus-circle "></i> Agregar Cupon
                               </a>
                           </div>

                    <div class="col-sm-12">
                        <div class="row">

                            <table id="datatable-buttons" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Código</th>
                                    <th>Restan por usar</th>
                                    <th>Descuento</th>
                                    <th style="width: 50px">Accion</th>
                                </tr>
                                </thead>

                                <tbody class="sopor">
                                @foreach($cpro as $pro)
                                <tr id="tabla_{{$pro->id}}">
                                    <td>{{$pro->id}}</td>
                                    <td><strong style="font-size: 2em;">{{$pro->code}}</strong></td>
                                    <td>{{$pro->cant_a_usar}}</td>
                                    <td>{{$pro->descuento}} @if($pro->type==1) % @elseif($pro->type==0) $ @endif</td>

                                    <td>
                                        <div class="botns">
                                            <a href="{{ url('adm/cupon/'.$pro->id.'/edit') }}" class="btn btn-raised btn-primary btn-xs">Editar<i class="fa fa-edit"></i>
                                                <div class="ripple-container"></div>
                                            </a>
                                            {!! Form::open(['url'=>'adm/cupon/'.$pro->id,'method'=>'DELETE']) !!}
                                            {{ csrf_field() }}
                                            <button class="btn btn-raised btn-danger btn-xs" onclick="return confirm('seguro que deseas eliminarlo?')">Eliminar<i class="fa fa-trash-o"></i>
                                                <div class="ripple-container"></div>
                                            </button>
                                            {!! Form::close() !!}    </div>
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
  <script>



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


        $('.reds').click(function(e){

            var elid = $(this).data('v');

            $.get('{{url('adm/cambiar_red/')}}/' + elid, function (res, estado) {

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