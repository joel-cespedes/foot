
<div class="col-xs-12">
    <div class="x_panel">
        <div class="x_content">
            <div class="form-group">
                {!!Form::label('Nombre','usuario',['class'=>'col-md-3 col-sm-3 col-xs-12 control-label'])!!}
                <div class="col-md-9 col-sm-9 col-xs-12">
                    {!!Form::text('name',old('name'),['class'=>'form-control'])!!}
                </div>
            </div>
            <div class="form-group">
                {!!Form::label('Nombre','Email',['class'=>'col-md-3 col-sm-3 col-xs-12 control-label'])!!}
                <div class="col-md-9 col-sm-9 col-xs-12">
                    {!!Form::text('email',old('email'),['class'=>'form-control'])!!}
                </div>
            </div>
            <div class="form-group">
                {!!Form::label('Nombre','Password',['class'=>'col-md-3 col-sm-3 col-xs-12 control-label'])!!}
                <div class="col-md-9 col-sm-9 col-xs-12">
                    {!!Form::text('password','',['class'=>'form-control'])!!}
                </div>
            </div>
            <div class="form-group">
                {!!Form::label('Nombre','Confirmar Password',['class'=>'col-md-3 col-sm-3 col-xs-12 control-label'])!!}
                <div class="col-md-9 col-sm-9 col-xs-12">
                    {!!Form::text('password_confirmation',null,['class'=>'form-control'])!!}
                </div>
            </div>

<div class="col-xs-12">
    <div class="ln_solid"></div>
    <div class="form-group text-center">
        <div class="col-md-12">
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
</div>

