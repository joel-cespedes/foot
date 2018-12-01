@extends('admin.adm.base')
@section('section')
    <div class="page-title">
        <div class="title_left">
            <h3><a href="{{URL::previous()}}" class="btn btn-default"> <i class="fa fa-angle-double-left"></i>&nbsp;Volver</a></h3>
        </div>

        <div class="title_right text-right">
            <h4>Editar Cupon</h4>
        </div>
    </div>
<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Cupon</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>

                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                {!! Form::model($cpro,['url'=>['adm/cupon',$cpro->id], 'method'=>'patch', 'class'=>'form-horizontal formulario']) !!}

                @include('admin.cupon.form')

                {!! Form::close() !!}
            </div>



        </div>
    </div>
</div>

@endsection
@section('script')
    <script>
        $('.bus').click(function () {
            var text = "";
            var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            for (var i = 0; i < 5; i++)
                text += possible.charAt(Math.floor(Math.random() * possible.length));
            $('#cup').val(text);
        });
    </script>
@endsection