
<div class=" col-sm-6 col-xs-12">
  <div class="x_panel">
      <div class="x_title">
          <div class="kns"></div>
          <h2>Empresa </h2>
          <div class="clearfix"></div>
      </div>
      <div class="form-group">
          {!! Form::label('categoria','Empresa',['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) !!}
          <div class="col-md-9 col-sm-9 col-xs-12">
              {!! Form::select('empresa_id',$empresas, null, ['class'=>'form-control  target col-md-7 col-xs-12','id'=>'cat']) !!}
          </div>
      </div>
  </div>
</div>



<div class=" col-sm-6 col-xs-12">
  <div class="x_panel">
      <div class="x_title">
          <div class="kns"></div>
          <h2>Imágenes</h2>
          <div class="clearfix"></div>
      </div>

  <div class="col-xs-12 marvv">
      <a href="#" class="add_field_button "><i class="fa fa-plus"></i></a>
  </div>
<br><br>
<div class="form-group input_fields_wrap">

  @if(isset($imagenes) and count($imagenes)>0)

          @foreach($imagenes as $imgsd)
          <div class="row">
              <div class="col-xs-offset-4 col-xs-4" style="display: flex; justify-content: space-between; align-items: center ">

                  @if(isset($imgsd->images))
                      <div class="img_ks">
                          <img src="{{asset('img/'.$imgsd->images)}}" alt="{{$imgsd->nimages}}">
                      </div>
                  @endif
                  <div>
                  </div>
              </div>
          </div>
          <div class="form-group col-xs-11 col-sm-5 mar_top">
              <div class="col-xs-12 col-sm-9">
                  <div class="fileUpload btn btn-success btn-block lskmnf">
                      <span>Subir imágen</span>
                      <input type="file" name="images[]" class="upload"></div>
              </div>
          </div>
          <input type="hidden" name="id_img[]" value="{{$imgsd->id}}">
          <div class="form-group col-xs-9 col-sm-5">
              {!!Form::label('Nombre','Nombre imágen',['class'=>'col-sm-3 col-xs-12 control-label'])!!}
              <div class="col-sm-9 col-xs-12">
                  <input type="text" name="nimages[]" value="{{$imgsd->nimages}}" class="form-control"/>
              </div>
          </div>
          <div class="form-group col-xs-3 col-sm-2">
              <a href="{{url('adm/dele_img/'.$imgsd->id)}}" class="fnsd">Eliminar</a>
          </div>
      @endforeach
  @else
      <div class="parts_sec">
          <div class="form-group col-xs-11 col-sm-5 mar_top">
              <div class="col-xs-12 col-sm-9">
                  <div class="fileUpload btn btn-success btn-block lskmnf">
                      <span>Subir imágen</span>
                      <input type="file" name="images[]" class="upload"></div>
              </div>
          </div>
          <div class="form-group col-xs-11 col-sm-5">
              <label for="Nombre" class="col-sm-3 col-xs-12 control-label">Nombre imágen</label>
              <div class="col-sm-9 col-xs-12"><input type="text" name="nimages[]" class="form-control">
              </div>
          </div>
          <div class="form-group col-xs-1 exis">
              <a href="#" class="remove_field"> <span class="glyphicon glyphicon-remove">
                  </span>
              </a>
          </div>
          </div>
      @endif
  </div>
  </div>
</div>



<div class="col-xs-12">
  <div class="ln_solid"></div>
  <div class="form-group text-center">
      <div class="col-md-12">
          <a href="{{ URL::previous() }}" type="submit" class="btn btn-primary">Cancelar</a>
          <button id="send" type="submit" class="btn btn-success">
              @if(isset($pro))
                  Editar
              @else
                  Agregar

              @endif
          </button>
      </div>
  </div>
</div>


