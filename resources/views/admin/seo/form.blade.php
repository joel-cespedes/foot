<br><br><br>
{{ csrf_field() }}



        <div class="form-group">
            {!!Form::label('Nombre','Nombre de la página',['class'=>'col-md-3 col-sm-3 col-xs-12 control-label'])!!}
            <div class="col-md-6 col-sm-6 col-xs-12">
                {!!Form::text('nombre_pagina',old('Nombre'),['class'=>'form-control'])!!}
            </div>
        </div>

        <div class="form-group">
            {!!Form::label('Nombre','Meta title',['class'=>'col-md-3 col-sm-3 col-xs-12 control-label'])!!}
            <div class="col-md-6 col-sm-6 col-xs-12">
                {!!Form::text('m_title',old('m_title'),['class'=>'form-control'])!!}
            </div>
        </div>

        <div class="form-group">
            {!!Form::label('Nombre','Meta Description',['class'=>'col-md-3 col-sm-3 col-xs-12 control-label'])!!}
            <div class="col-md-6 col-sm-6 col-xs-12">
                {!!Form::text('m_descripction',old('m_descripction'),['class'=>'form-control'])!!}
            </div>
        </div>

        <div class="form-group">
            {!!Form::label('Nombre','Canonical',['class'=>'col-md-3 col-sm-3 col-xs-12 control-label'])!!}
            <div class="col-md-6 col-sm-6 col-xs-12">
                {!!Form::text('m_key',old('m_key'),['class'=>'form-control'])!!}
            </div>
        </div>
          <div class="form-group">
                {!!Form::label('Canonical','Meta keywords',['class'=>'col-md-3 col-sm-3 col-xs-12 control-label'])!!}
                <div class="col-md-6 col-sm-6 col-xs-12">
                    {!!Form::text('canonical',old('canonical'),['class'=>'form-control'])!!}
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