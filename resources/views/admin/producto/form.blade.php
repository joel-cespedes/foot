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
      <div class="x_title">
          <h2>Categoria<small>Puedes agregar mas de una categoría por empresa.</small></h2>
          <div class="clearfix"></div> </div>
      <div class="form-group">
          {!! Form::label('categoria','Categoria al que pertenece',['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
          <div class="col-md-9 col-sm-9 col-xs-12">
              {!! Form::select('cproducto_id',$cempresa,isset($cpro)? $cpro->cempresa_id: null, ['class'=>'form-control col-md-7 col-xs-12','id'=>'cat']) !!}
          </div>
      </div>

  </div>
</div>

<div class="col-xs-12">
  <div class="x_panel">
      <div class="x_title">
          <h2>Empresa</h2>
          <div class="clearfix"></div> </div>
      <div class="x_content">

          <div class="form-group">
              {!!Form::label('Nombre','Nombre',['class'=>'col-md-3 col-sm-3 col-xs-12 control-label'])!!}
              <div class="col-md-9 col-sm-9 col-xs-12">
                  {!!Form::text('nombre',old('nombre'),['class'=>'form-control'])!!}
              </div>
          </div>

          <div class="form-group">
              {!!Form::label('Nombre','Slogan',['class'=>'col-md-3 col-sm-3 col-xs-12 control-label'])!!}
              <div class="col-md-9 col-sm-9 col-xs-12">
                  {!!Form::text('slogan',old('slogan'),['class'=>'form-control'])!!}
              </div>
          </div>

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
              {!!Form::label('Nombre','Imágen',['class'=>'control-label col-md-3 col-sm-3 col-xs-12 '])!!}
              <div class="col-md-6 col-sm-6 col-xs-12 text-center">
                  <div class="action">
                      <input type="file" name="img" class="file oo" >
                  </div>
              </div>
          </div>
          <div class="form-group">
              {!!Form::label('Nombre','Nombre de la imagen',['class'=>'col-md-3 col-sm-3 col-xs-12 control-label'])!!}
              <div class="col-md-9 col-sm-9 col-xs-12">
                  {!!Form::text('nimg',old('nimg'),['class'=>'form-control'])!!}
              </div>
          </div>







          <div class="form-group">
              <div class="row">
                  <div class="col-xs-offset-4 col-xs-4" style="display: flex; justify-content: space-between; align-items: center ">

                      @if(isset($cpro->img_bg))
                          <div class="img_ks">
                              <img src="{{asset('img/'.$cpro->img_bg)}}" alt="">
                          </div>
                      @endif
                      <div>
                      </div>
                  </div>
              </div>
              {!!Form::label('Nombre','Imágen background',['class'=>'control-label col-md-3 col-sm-3 col-xs-12 '])!!}
              <div class="col-md-6 col-sm-6 col-xs-12 text-center">
                  <div class="action">
                      <input type="file" name="img_bg" class="file oo" >
                  </div>
              </div>
          </div>
   



          <div class="form-group">
              {!!Form::label('Nombre','Descripción',['class'=>'col-md-3 col-sm-3 col-xs-12 control-label'])!!}
              <div class="col-md-9 col-sm-9 col-xs-12">
                  {!!Form::textarea('descripcion',null,['class'=>'form-control'])!!}
              </div>
          </div>

          <div class="form-group">
              {!!Form::label('Nombre','Información Nutricional',['class'=>'col-md-3 col-sm-3 col-xs-12 control-label'])!!}
              <div class="col-md-9 col-sm-9 col-xs-12">
                  {!!Form::textarea('informa_nutri',null,['class'=>'form-control','id'=>'editor4'])!!}
              </div>
          </div>
          <div class="form-group">
              {!!Form::label('Nombre','Agregar Beneficio',['class'=>'col-md-3 col-sm-3 col-xs-12 control-label'])!!}
              <div class="col-md-9 col-sm-9 col-xs-12">
            <div class="boton"><a href="#"><i class="fa fa-plus-circle"></i></a></div>
              </div>
          </div>
          <div class="p_agr">
          @if(isset($bene) and count($bene)>0)
              @foreach($bene as $imgsd)
                  <div class="form-group">
                      {!!Form::label('Nombre','Titulo beneficio',['class'=>'col-md-3 col-sm-3 col-xs-12 control-label'])!!}
                      <div class="col-md-8 col-sm-8 col-xs-11">
                          {!!Form::text('bene_title[]',$imgsd->titulo,['class'=>'form-control'])!!}
                      </div>
                      <div class="col-md-1 col-sm-1 col-xs-1">
                          <a href="{{url('adm/borrar_bene/'.$imgsd->id)}}"><i class="fa fa-trash"></i></a>
                      </div>
                      <input type="hidden" name="id_title_bene[]" value="{{$imgsd->id}}">
                  </div>
                      <div class="form-group">
                          {!!Form::label('Nombre','Texto Beneficios',['class'=>'col-md-3 col-sm-3 col-xs-12 control-label'])!!}
                          <div class="col-md-8 col-sm-8 col-xs-11">
                              {!!Form::text('bene_nombre[]',$imgsd->nombre,['class'=>'form-control'])!!}
                          </div>
                      </div>
              @endforeach
            @else
              <div class="form-group">
                  {!!Form::label('Nombre','Titulo beneficio',['class'=>'col-md-3 col-sm-3 col-xs-12 control-label'])!!}
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      {!!Form::text('bene_title[]',null,['class'=>'form-control'])!!}
                  </div>
              </div>
              <div class="form-group">
                  {!!Form::label('Nombre','Texto Beneficios',['class'=>'col-md-3 col-sm-3 col-xs-12 control-label'])!!}
                  <div class="col-md-8 col-sm-8 col-xs-11">
                      {!!Form::text('bene_nombre[]',null,['class'=>'form-control'])!!}
                  </div>
              </div>


              @endif
          </div>
          <br><br><b></b><b></b>

          <div class="form-group">
              {!!Form::label('Nombre','Promoción',['class'=>'col-md-3 col-sm-3 col-xs-12 control-label'])!!}
              <div class="col-md-9 col-sm-9 col-xs-12">
                  {!!Form::text('promo',old('promo'),['class'=>'form-control'])!!}
              </div>
          </div>
          <div class="form-group">
              {!!Form::label('Nombre','Palabras Clave',['class'=>'col-md-3 col-sm-3 col-xs-12 control-label'])!!}
              <div class="col-md-9 col-sm-9 col-xs-12">
                  {!!Form::text('palabras',old('palabras'),['class'=>'form-control'])!!}
              </div>
          </div>


        <div class="form-group">
              {!!Form::label('Nombre','Precio',['class'=>'col-md-3 col-sm-3 col-xs-12 control-label'])!!}
              <div class="col-md-9 col-sm-9 col-xs-12">
                  {!!Form::number('precio',old('palabras'),['class'=>'form-control'])!!}
              </div>
          </div>


        <div class="form-group">
              {!!Form::label('Nombre','Precio Falso',['class'=>'col-md-3 col-sm-3 col-xs-12 control-label'])!!}
              <div class="col-md-9 col-sm-9 col-xs-12">
                  {!!Form::number('precio_falso',old('palabras'),['class'=>'form-control'])!!}
              </div>
          </div>

        <div class="form-group">
              {!!Form::label('Nombre','Cantidad de Pastillas',['class'=>'col-md-3 col-sm-3 col-xs-12 control-label'])!!}
              <div class="col-md-9 col-sm-9 col-xs-12">
                  {!!Form::number('cantidad_pastillas',old('palabras'),['class'=>'form-control'])!!}
              </div>
          </div>

        <div class="form-group">
              {!!Form::label('Nombre','Peso',['class'=>'col-md-3 col-sm-3 col-xs-12 control-label'])!!}
              <div class="col-md-9 col-sm-9 col-xs-12">
                  {!!Form::number('peso',old('palabras'),['class'=>'form-control'])!!}
              </div>
          </div>
          <div class="form-group">
              {!!Form::label('Nombre','Costo del envío',['class'=>'col-md-3 col-sm-3 col-xs-12 control-label'])!!}
              <div class="col-md-9 col-sm-9 col-xs-12">
                  {!!Form::number('envio',old('palabras'),['class'=>'form-control'])!!}
              </div>
          </div>
             <div class="form-group">
              {!!Form::label('Nombre','Texto para envío o información',['class'=>'col-md-3 col-sm-3 col-xs-12 control-label'])!!}
              <div class="col-md-9 col-sm-9 col-xs-12">
                  {!!Form::text('texto_compras',old('texto_compras'),['class'=>'form-control'])!!}
              </div>
          </div>



          <div class="form-group">
              {!!Form::label('estado','Estado',['class'=>'col-md-3 col-sm-3 col-xs-12 control-label'])!!}
              <div class="col-md-9 col-sm-9 col-xs-12">
                  <div class="">
                      <label>
                          @if(!empty($cpro))
                              @if($cpro->estado==1)
                                  <input type="checkbox" name="estado" class="js-switch" value="1" checked /> Activo
                              @else
                                  <input type="checkbox" name="estado" class="js-switch" /> Activo
                              @endif
                          @else
                              <input type="checkbox" name="estado" class="js-switch" value="1" checked /> Activo
                          @endif
                      </label>
                  </div>
              </div>
          </div>

          <div class="form-group">
              {!!Form::label('estado','Oferta',['class'=>'col-md-3 col-sm-3 col-xs-12 control-label'])!!}
              <div class="col-md-9 col-sm-9 col-xs-12">
                  <div class="">
                      <label>
                          @if(!empty($cpro))
                              @if($cpro->oferta==1)
                                  <input type="checkbox" name="oferta" class="js-switch" value="1" checked /> Activo
                              @else
                                  <input type="checkbox" name="oferta" class="js-switch" /> Activo
                              @endif
                          @else
                              <input type="checkbox" name="oferta" class="js-switch" value="1" checked /> Activo
                          @endif
                      </label>
                  </div>
              </div>
          </div>

          <div class="form-group">
              {!!Form::label('Nombre','Url Amigable',['class'=>'col-md-3 col-sm-3 col-xs-12 control-label'])!!}
              <div class="col-md-9 col-sm-9 col-xs-12">
                  {!!Form::text('url',old('palabras'),['class'=>'form-control'])!!}
              </div>
          </div>

       <br>
  </div>
  </div>
</div>

<div class="col-xs-12">
  <div class="x_panel">
      <div class="x_title">
          <h2>Tags</h2>
          <div class="clearfix"></div> </div>
      <div class="x_content">

          <div class="forms-group">
                    {!! Form::label('categoria','Tags',['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        {!! Form::select('tag_id[]',$tags,isset($cpro)? $refTag : null, ['class'=>'form-control col-md-7 col-xs-12','id'=>'cat','size'=>5,'multiple']) !!}
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

