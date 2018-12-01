<br><br><br>

        <div class="form-group">
            {!!Form::label('Nombre','Código del Cupón',['class'=>'col-md-3 col-sm-3 col-xs-12 control-label'])!!}
            <div class="col-md-5 col-sm-5 col-xs-11">
                {!!Form::text('code',old('code'),['class'=>'form-control','id'=>'cup'])!!}
            </div>
            <div class="col-md-1 col-sm-1 col-xs-1">
                <div class="bus">
                    <i class="fa fa-refresh" aria-hidden="true"></i>
                </div>
            </div>
        </div>

        <div class="form-group">
            {!!Form::label('cantidad','Cantidad de Cupones',['class'=>'col-md-3 col-sm-3 col-xs-12 control-label'])!!}
            <div class="col-md-6 col-sm-6 col-xs-12">
                {!!Form::number('cant_a_usar',old('cant_a_usar'),['class'=>'form-control'])!!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('categoria','Tipo de cupon',['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
            <div class="col-md-6 col-sm-6 col-xs-12">
                {!! Form::select('type',[0=>'Cantidad',1=>'Porcentaje %'],isset($cpro)? $refCnoticia: null, ['class'=>'form-control col-md-7 col-xs-12','placeholder'=>'Tipo de descuento']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('Descuento','Descuento',['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
            <div class="col-md-6 col-sm-6 col-xs-12">
                {!! Form::text('descuento',old('descuento'),['class'=>'form-control','id'=>'cup'])!!}
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