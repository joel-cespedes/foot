<br><br><br>
{{ csrf_field() }}



        <div class="form-group">
            {!!Form::label('Nombre','Nombre de la red',['class'=>'col-md-3 col-sm-3 col-xs-12 control-label'])!!}
            <div class="col-md-6 col-sm-6 col-xs-12">
                {!!Form::text('nombre',old('Nombre'),['class'=>'form-control'])!!}
            </div>
        </div>

        <div class="form-group">
            {!!Form::label('Nombre','Url',['class'=>'col-md-3 col-sm-3 col-xs-12 control-label'])!!}
            <div class="col-md-6 col-sm-6 col-xs-12">
                {!!Form::url('url',old('Nombre'),['class'=>'form-control'])!!}
            </div>
        </div>

        <div class="form-group">
            {!!Form::label('Nombre','Clase de Fontastic',['class'=>'col-md-3 col-sm-3 col-xs-12 control-label'])!!}
            <div class="col-md-6 col-sm-6 col-xs-12">
                {!!Form::text('clase',old('Nombre'),['class'=>'form-control'])!!}
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