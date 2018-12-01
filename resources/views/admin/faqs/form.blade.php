

<div class="col-xs-12">
    <div class="x_panel">
        <div class="x_content">
            <div class="form-group">
                {!!Form::label('Nombre','Pregunta',['class'=>'col-md-3 col-sm-3 col-xs-12 control-label'])!!}
                <div class="col-md-9 col-sm-9 col-xs-12">
                    {!!Form::text('pregunta',old('nimg'),['class'=>'form-control'])!!}
                </div>
            </div>
            <div class="form-group">
                {!!Form::label('Nombre','Respuesta',['class'=>'col-md-3 col-sm-3 col-xs-12 control-label'])!!}
                <div class="col-md-9 col-sm-9 col-xs-12">
                    {!!Form::text('respuesta',old('nimg'),['class'=>'form-control'])!!}
                </div>
            </div>

<div class="col-xs-12">
    <div class="ln_solid"></div>
    <div class="form-group text-center">
        <div class="col-md-12">
            <a href="{{ URL::previous() }}" type="submit" class="btn btn-primary">Cancelar</a>
            <button id="send" type="submit" class="btn btn-success">
                @if(isset($pro))
                    Guardar
                @else
                    Agregar

                @endif
            </button>
        </div>
    </div>
</div>

