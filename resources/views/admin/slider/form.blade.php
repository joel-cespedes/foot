<br><br><br>



<div class="form-group">
    <div class="row">
        <div class="col-xs-offset-4 col-xs-4" style="display: flex; justify-content: space-between; align-items: center ">
            @if(isset($cpro->img))
            <div class="img_ks">
                <img src="{{asset('img/'.$cpro->img)}}" alt="">
            </div>
            @endif
            <div>
            </div>
        </div>
    </div>
    {!!Form::label('Nombre','nombre Imágen del Registro',['class'=>'control-label col-md-3 col-sm-3 col-xs-12 '])!!}
    <div class="col-md-6 col-sm-6 col-xs-12 text-center">
        <div class="action">
            <input type="file" name="img" class="file oo" >
        </div>
    </div>
</div>
        <div class="form-group">
            {!!Form::label('Nombre','Nombre de la imágen',['class'=>'col-md-3 col-sm-3 col-xs-12 control-label'])!!}
            <div class="col-md-6 col-sm-6 col-xs-12">
                {!!Form::text('nimg',null,['class'=>'form-control'])!!}
            </div>
        </div>
            <div class="form-group">
                {!!Form::label('Nombre','Texto del slider',['class'=>'col-md-3 col-sm-3 col-xs-12 control-label'])!!}
                <div class="col-md-6 col-sm-6 col-xs-12">
                    {!!Form::textarea('texto',null,['class'=>'form-control','id'=>'editor'])!!}
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