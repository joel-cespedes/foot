
<div class="col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Datos de la web</h2>
            <div class="clearfix"></div> </div>


        <div class="form-group">
            {!!Form::label('Nombre','Ubicación',['class'=>'col-md-3 col-sm-3 col-xs-12 control-label'])!!}
            <div class="col-sm-9 col-xs-12">
                {!!Form::text('ublicacion',null,['class'=>'form-control'])!!}
            </div>
        </div>
        <div class="form-group">
            {!!Form::label('Nombre','Telefono 1',['class'=>'col-md-3 col-sm-3 col-xs-12 control-label'])!!}
            <div class="col-sm-9 col-xs-12">
                {!!Form::text('telefono',null,['class'=>'form-control'])!!}
            </div>
        </div>
       <div class="form-group">
            {!!Form::label('Nombre','Email',['class'=>'col-md-3 col-sm-3 col-xs-12 control-label'])!!}
           <div class="col-sm-9 col-xs-12">
                {!!Form::text('email',null,['class'=>'form-control'])!!}
            </div>
        </div>
        <div class="form-group">
            {!!Form::label('Nombre','Mapa',['class'=>'col-md-3 col-sm-3 col-xs-12 control-label'])!!}
            <div class="col-sm-9 col-xs-12">
                {!!Form::text('mapa',null,['class'=>'form-control'])!!}
            </div>
        </div>
        <div class="form-group">
            {!!Form::label('Nombre','Texto de contacto',['class'=>'col-md-3 col-sm-3 col-xs-12 control-label'])!!}
            <div class="col-sm-9 col-xs-12">
                {!!Form::text('texto_contacto',null,['class'=>'form-control'])!!}
            </div>
        </div>
        <div class="form-group">
            {!!Form::label('Nombre','Condiciones de Compra',['class'=>'col-md-3 col-sm-3 col-xs-12 control-label'])!!}
            <div class="col-sm-9 col-xs-12">
                {!!Form::text('condiciones_compra',null,['class'=>'form-control'])!!}
            </div>
        </div>


        <div class="form-group">
            {!!Form::label('Nombre','Tasa del día Paypal',['class'=>'col-md-3 col-sm-3 col-xs-12 control-label'])!!}
            <div class="col-sm-9 col-xs -12">
                {!!Form::text('tasa',null,['class'=>'form-control'])!!}
            </div>
        </div>



        <div class="form-group">
            {!!Form::label('Nombre','Palabras de inicio',['class'=>'col-md-3 col-sm-3 col-xs-12 control-label'])!!}
            <div class="col-sm-9 col-xs-12">
                {!!Form::textarea('textos_inicio',null,['class'=>'form-control','id'=>'editor6'])!!}
            </div>
        </div>
        <div class="form-group">
            {!!Form::label('Nombre','Script de Google Analitycs',['class'=>'col-md-3 col-sm-3 col-xs-12 control-label'])!!}
            <div class="col-sm-9 col-xs-12">
                {!!Form::textarea('analitycs',null,['class'=>'form-control'])!!}
            </div>
        </div>
            <div class="form-group">
            {!!Form::label('Nombre','Datos Bancarios',['class'=>'col-md-3 col-sm-3 col-xs-12 control-label'])!!}
            <div class="col-sm-9 col-xs-12">
                {!!Form::textarea('cuentas',null,['class'=>'form-control','id'=>'editor4'])!!}
            </div>
        </div>


<div class="ln_solid"></div>
    <div class="form-group">
        <div class="col-md-6 col-md-offset-3">
            <a href="{{ URL::previous() }}" type="submit" class="btn btn-primary">Cancelar</a>
            <button id="send" type="submit" class="btn btn-success">
                @if(isset($cpro))
                    Guardar
                @else
                    Agregar
                @endif
            </button>
        </div>
    </div>