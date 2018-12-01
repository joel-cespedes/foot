<?php

Route::group(['middleware' => 'auth'], function () {


    Route::get('noticias_visistadas','estadisticasController@noticias_visitas');
    Route::get('empresas_visistadas','estadisticasController@empresas_visitas');
    Route::get('ver_detalle/{id}', 'pedidosController@ver_detalle');
    Route::resource('/', 'estadisticasController');
    Route::resource('cproducto', 'CproductoController');
    Route::resource('cnoticia', 'CnoticiaController');
    Route::resource('comentario', 'ComentariosController');
    Route::resource('correos', 'CorreosController');
    Route::resource('dat', 'DatoController');
    Route::resource('rede', 'RedesController');
    Route::resource('producto', 'ProductoController');
    Route::resource('faq', 'FaqsController');
//    Route::resource('img', 'ImgController');
    Route::resource('noticia', 'NoticiaController');
    Route::resource('politicaPrivacidad', 'PoliticaPrivacidadController');
    Route::resource('politicaCookie', 'PoliticaCookiesController');
    Route::resource('slider', 'SliderController');
    Route::resource('seo', 'SeoController');
    Route::resource('emails', 'CorreosController');
    Route::resource('users', 'UserController');
    Route::resource('tag', 'TagController');
    Route::resource('cupon', 'CuponController');
    Route::resource('entrega', 'EntregaFacilController');
    Route::resource('newsletter', 'NewsletterController');
    Route::resource('newsletter_mayorista', 'NewsletterMayoristaController');


    Route::resource('mayorista', 'mayoristaController');
    Route::resource('como_comprar', 'comoComprarController');
    Route::resource('como_pagar', 'comoPagarController');
    Route::resource('metodo_envio', 'metodoEnvioController');


    Route::resource('pagos', 'PedidosController');
    Route::resource('pedidos','PedidosController');
    Route::get('ver_detalle/{id}', 'PedidosController@ver_detalle');
    Route::post('actualizar_dato/{id}', 'DatoController@update');






    Route::resource('redes_sociales', 'RedesSocialesController');

    Route::resource('nosotros', 'NosotrosController');




    Route::get('borrar_bene/{id}', 'ProductoController@borrar_bene');

    Route::resource('tag', 'TagController');



    Route::get('iconos',function (){
        return view('admin.iconos');
    });


    Route::post('orden_cempresa', 'CproductoController@order');
    Route::post('orden_cnoticia', 'CnoticiaController@order');
    Route::post('orden_comentarios', 'ComentariosController@order');
    Route::post('orden_empresa', 'ProductoController@order');
    Route::post('orden_faqs', 'FaqsController@order');
    Route::post('orden_img', 'ImgController@order');
    Route::post('orden_noticias', 'NoticiaController@order');
    Route::post('orden_redes', 'RedesController@order');
    Route::post('orden_slider', 'SliderController@order');

    Route::get('cambiar_comentario/{id}', 'comentariosController@cambiar_comentario');


    Route::get('cambiar_pedido/{id}', 'PedidosController@cambiar_pedido');
    Route::get('cambiar_despachado/{id}', 'PedidosController@cambiar_despachado');
    Route::get('cambiar_entregado/{id}', 'PedidosController@cambiar_entregado');
    Route::get('dele_img/{id}', 'ProductoController@dele_img');


});







//cambiar orden

//Route::post('orden_contenido', 'contenidosController@order');


Route::post('subir_imagen', 'frontController@subir_imagen');
