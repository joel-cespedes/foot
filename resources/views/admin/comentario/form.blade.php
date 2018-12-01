
<div class="col-xs-12">
    <div class="x_panel">
        <div class="x_content">
            <div class="form-group">
                {!!Form::label('Nombre','Nombre',['class'=>'col-md-3 col-sm-3 col-xs-12 control-label'])!!}
                <div class="col-md-9 col-sm-9 col-xs-12">
                    {!!Form::text('nombre',old('nimg'),['class'=>'form-control'])!!}
                </div>
            </div>

            <div class="form-group">
                {!!Form::label('Nombre','comentario',['class'=>'col-md-3 col-sm-3 col-xs-12 control-label'])!!}
                <div class="col-md-9 col-sm-9 col-xs-12">
                    {!!Form::text('comentario',old('comentario'),['class'=>'form-control'])!!}
                </div>
            </div>

             <input type="hidden" id="poner" name="puntuacion" value="{{$cpro->puntuacion}}">

            <div class="form-group">
                {!!Form::label('Nombre','puntuacion',['class'=>'col-md-3 col-sm-3 col-xs-12 control-label'])!!}
                <div class="col-md-9 col-sm-9 col-xs-12">
                <div class="starnew"> </div>

                </div>
            </div>


            <div class="form-group">
                {!!Form::label('estado','Estado',['class'=>'col-md-3 col-sm-3 col-xs-12 control-label'])!!}
                <div class="col-md-9 col-sm-9 col-xs-12">
                    <div class="">
                        <label>
                            @if(!empty($pro))
                                @if($pro->estado==1)
                                    <input type="checkbox" name="estado" class="js-switch" value="1" checked /> Aprobado
                                @else
                                    <input type="checkbox" name="estado" class="js-switch" /> No Aprobado
                                @endif
                            @else
                                <input type="checkbox" name="estado" class="js-switch" value="1" checked /> Aprobado
                            @endif
                        </label>
                    </div>
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

