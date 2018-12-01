<div class="col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>S.E.O.</h2>
            <div class="clearfix"></div> </div>
        <div class="col-md-6 col-xs-12">
            <div class="form-group">
                {!!Form::label('Nombre','Meta Title',['class'=>'col-md-3 col-sm-3 col-xs-12 control-label'])!!}
                <div class="col-md-9 col-sm-9 col-xs-12">
                    {!!Form::text('m_title',null,['class'=>'form-control','id'=>'meta_title'])!!}
                    <div id="res_title">Contador.</div>
                </div>
            </div>
            <div class="form-group">
                {!!Form::label('Nombre','Meta Descripción',['class'=>'col-md-3 col-sm-3 col-xs-12 control-label'])!!}
                <div class="col-md-9 col-sm-9 col-xs-12">
                    {!!Form::text('m_description',null,['class'=>'form-control','id'=>'meta_description'])!!}
                    <div id="res_description">Contador.</div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xs-12">
            <div class="form-group">
                {!!Form::label('Nombre','keywords',['class'=>'col-md-3 col-sm-3 col-xs-12 control-label'])!!}
                <div class="col-md-9 col-sm-9 col-xs-12">
                    {!!Form::text('m_key',null,['class'=>'form-control','id'=>'meta_keywords'])!!}
                    <div id="res_keywords">Contador.</div>
                </div>
            </div>
            <div class="form-group">
                {!!Form::label('Nombre','canonical',['class'=>'col-md-3 col-sm-3 col-xs-12 control-label'])!!}
                <div class="col-md-9 col-sm-9 col-xs-12">
                    {!!Form::text('canonical',null,['class'=>'form-control','id'=>'meta_canoti'])!!}

                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-xs-12">
    <div class="x_panel">
        <h2>Categoría Producto</h2>
        <div class="clearfix"></div> </div>
        <div class="x_content">
            <div class="form-group">
                {!!Form::label('Nombre','Nombre',['class'=>'col-xs-3 col-xs-12 control-label'])!!}
                <div class="col-xs-9 col-xs-12">
                    {!!Form::text('nombre',null,['class'=>'form-control'])!!}
                </div>
            </div>
            <div class="form-group">
                {!!Form::label('Nombre','Descripción',['class'=>'col-xs-3 col-xs-12 control-label'])!!}
                <div class="col-xs-9 col-xs-12">
                    {!!Form::textarea('descripcion',null,['class'=>'form-control'])!!}
                </div>
            </div>
         <br>

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