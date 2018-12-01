@extends('admin.adm.base')
@section('css')
    <link href="{{asset('admin/vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="{{asset('admin/vendors/google-code-prettify/bin/prettify.min.css')}}" rel="stylesheet">
    <!-- Select2 -->
    <link href="{{asset('admin/vendors/select2/dist/css/select2.min.css')}}" rel="stylesheet">
    <!-- Switchery -->
    <link href="{{asset('admin/vendors/switchery/dist/switchery.min.css')}}" rel="stylesheet">
    <!-- starrr -->
    <link href="{{asset('admin/vendors/starrr/dist/starrr.css')}}" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="{{asset('admin/vendors/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
@endsection
@section('section')
    <div class="page-title">
        <div class="title_left">
            <h3><a href="{{URL::previous()}}" class="btn btn-default"> <i class="fa fa-angle-double-left"></i>&nbsp;Volver</a></h3>
        </div>

        <div class="title_right text-right">
            <h4>Noticias</h4>
        </div>
    </div>
<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Editar Noticia</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                @include('admin.adm.error')
                {!! Form::model($cpro,['url'=>['adm/noticia',$cpro->id], 'method'=>'patch', 'files' => true , 'class'=>'form-horizontal formulario']) !!}
                @include('admin.noticia.form')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
</div>

@endsection

@section('script')
    <script src="{{asset('admin/vendors/iCheck/icheck.min.js')}}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{asset('admin/vendors/moment/min/moment.min.js')}}"></script>
    <script src="{{asset('admin/vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="{{asset('admin/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js')}}"></script>
    <script src="{{asset('admin/vendors/jquery.hotkeys/jquery.hotkeys.js')}}"></script>
    <script src="{{asset('admin/vendors/google-code-prettify/src/prettify.js')}}"></script>
    <!-- jQuery Tags Input -->
    <script src="{{asset('admin/vendors/jquery.tagsinput/src/jquery.tagsinput.js')}}"></script>
    <!-- Switchery -->
    <script src="{{asset('admin/vendors/switchery/dist/switchery.min.js')}}"></script>
    <!-- Select2 -->
    <script src="{{asset('admin/vendors/select2/dist/js/select2.full.min.js')}}"></script>
    <!-- Parsley -->
    <script src="{{asset('admin/vendors/parsleyjs/dist/parsley.min.js')}}"></script>
    <!-- Autosize -->
    <script src="{{asset('admin/vendors/autosize/dist/autosize.min.js')}}"></script>
    <!-- jQuery autocomplete -->
    <script src="{{asset('admin/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js')}}"></script>
    <script src="{{asset('admin/js/jquery.bootstrap-duallistbox.js')}}"></script>
    <!-- starrr -->
    <script src="{{asset('admin/vendors/starrr/dist/starrr.js')}}"></script>
    <script>

        var max_fields      = 12; //maximum input boxes allowed
        var wrapper1         = $(".input_fields_wrap"); //Fields wrapper
        var add_button1      = $(".add_field_button"); //Add button ID
        var x = 1; //initlal text box count
        $(add_button1).click(function(e){ //on add input button click
            e.preventDefault();
            if(x < max_fields){ //max input box allowed
                x++; //text box increment
                $(wrapper1).append(
                    '<div class="parts_sec">'+
                    '<div class="form-group col-xs-11 col-sm-5 ">'+
                    '<div class="col-xs-12 col-sm-9">'+
                    '<div class="fileUpload btn btn-success btn-block">'+
                    '<span>Subir imágen</span>'+
                    '<input type="file" name="images[]" class="upload" />'+
                    '</div>'+
                    '</div>'+
                    '</div>'+
                    '<div class="form-group col-xs-11 col-sm-5 ">'+
                    '{!!Form::label('Nombre','Nombre imágen',['class'=>'col-sm-3 col-xs-12 control-label'])!!}'+
                    '<div class="col-sm-9 col-xs-12">'+
                    '<input type="text" name="nimages[]" class="form-control"/>'+
                    '</div>'+
                    '</div>'+
                    '<div class="form-group col-xs-1 exis">'+
                    '<a href="#" class="remove_field"> <span class="glyphicon glyphicon-remove"></span></a>'+
                    '</div>'+
                    '</div>' );
            }
        });
        $(wrapper1).on("click",".remove_field", function(e){ //user click on remove text
            e.preventDefault(); $(this).parent('div').parent('div').remove(); x--;
        })




        $('select[name="men[]"]').bootstrapDualListbox(
            {   moveOnSelect: false,
                }
            );
        $('#editor').redactor({
            imageUpload: '{{url('adm/subir_imagen')}}'
        });




        $('#cat').change(function(e){
            $("#sub").empty();
            $.get('{{url('admin/traersub/')}}/'+e.target.value,function(res,estado){

                if(res !='' ) {
                    $("#sub").append("<option value=''>Ahora escoge el la sub categoria</option>");
                }else{
                    $("#sub").append("<option value=''>No existe sub categoria para esta categoria</option>");
                }
                for(i=0; i<res.length; i++){
                    $("#sub").append("<option value='"+res[i].id+"'>"+res[i].nombre+"</option>");
                }
            })

        });

        function onAddTag(tag) {
            alert("Agrega a un tag: " + tag);
        }
        function onRemoveTag(tag) {
            alert("Eliminar tag: " + tag);
        }
        function onChangeTag(input, tag) {
            alert("Cambiar a tag: " + tag);
        }
        $(document).ready(function() {
            $('#tags_1').tagsInput({
                width: 'auto'
            });
        });





        var limite_title = 60;
        var limite_description = 155;
        var limite_keywords = 800;

        //title

        $('#meta_title').keyup(function(e){
            var box = $(this).val();
            var resta = limite_title - box.length;
            if(box.length <= limite_title)
            {
                $('#res_title').html('Te restan ' +resta+ ' caracteres.');
            }
        });


        //desciption
        $('#meta_description').keyup(function(e){
            var box = $(this).val();
            var resta_description = limite_description - box.length;
            if(box.length <= limite_description)
            {
                $('#res_description').html('Te restan ' +resta_description+ ' caracteres.');
            }
        });

        //keywords
        $('#meta_keywords').keyup(function(e){
            var box = $(this).val();
            var resta_keywords = limite_keywords - box.length;
            if(box.length <= limite_keywords)
            {
                $('#res_keywords').html('Te restan ' +resta_keywords+ ' caracteres.');
            }
        });





    </script>
@endsection