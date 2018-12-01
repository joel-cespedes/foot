

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
                {!!Form::label('Nombre','Select Grouped',['class'=>'col-md-3 col-sm-3 col-xs-12 control-label '])!!}
                <div class="col-md-9 col-sm-9 col-xs-12">
                    <select class="select2_group form-control" name="producto_id[]" multiple size="20">
                        @foreach($cproductos as $cem)
                        <optgroup label="{{$cem->nombre}}">
                            @foreach($cem->producto as $emp)
                                <option value="{{$emp->id}}"
                                        @if(isset($producto))
                                @foreach($producto as $cemp)
                                        @if($cemp->id == $emp->id) selected
                                        @endif
                                    @endforeach
                                @endif
                                >{{$emp->nombre}}</option>
                            @endforeach
                        </optgroup>
                        @endforeach
                    </select>
                </div>
            </div>
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

