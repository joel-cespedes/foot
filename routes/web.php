<?php


Route::get('/k',  'khipuController@pago');
Route::post('/compra_khipu',  'khipuController@form');

Route::get('/recibir','khipuController@recibir');

Route::get('/', 'frontController@index');
Route::get('/gracias', function (){
    return view('gracias');
});

Route::get('/cantidad','cartController@envio');



Route::get('compra','cartController@show1');
Route::get('cart-show','cartController@show');
Route::get('cart_solicitud','cartController@show2');
Route::get('cart-add/{producto}/{cantidad}', 'cartController@add');
Route::get('cart-borrar/{producto}', 'cartController@delete');
Route::get('cart_actualizar/{producto}/{cantidad}','cartController@up');
Route::get('traer_subtotal','cartController@subTotal');
Route::get('traer_total','cartController@total');
Route::get('conteo_carrito','cartController@conteo_carrito');
Route::get('borrar_todo','cartController@trash');
Route::get('restar_cupon/{cantidad}/{type}','cartController@update');
Route::get('enviar_cupon/{cupon}','cartController@procesarCupon');


Route::post('pedido', 'frontController@email_cotizacion');



Route::get('traer_envio','cartController@envio');


Route::get('cookies/', 'frontController@politicaCookies');
Route::get('tag/{slug}', 'frontController@tag');

Route::post('comentario_producto', 'frontController@comentario_producto');
Route::post('comentario_truco', 'frontController@comentario_noticia');
Route::get('nosotros', 'frontController@nosotros');

Route::get('/preguntas-frecuentes', 'frontController@faq');
Route::get('/contacto', 'frontController@contacto');
Route::get('politica-privacidad', 'frontController@politicaPrivacidad');
Route::get('/politica-de-cookies', 'frontController@politicaCookies');
Route::get('/entrega-facil', 'frontController@entrega');


Route::get('distribuidor', 'frontController@mayorista');
Route::get('como_comprar', 'frontController@como_comprar');
Route::get('como_pagar', 'frontController@como_pagar');
Route::get('metodo_envio', 'frontController@metodo_envio');



Route::post('email','frontController@email');
Route::post('email2','frontController@email2');
Route::post('newsletter','frontController@newsletter');
Route::post('newsletter_mayorista','frontController@newsletter_mayorista');

Route::get('administracion',function (){
    return view('login');
});



// route for view/blade file
Route::get('paywithpaypal', [
    'as' => 'paywithpaypal',
    'uses' => 'PaypalController@payWithPaypal']);
// route for post       
Route::get('paypal_pago', [
    'as' => 'paypal_pago',
    'uses' => 'PaypalController@postPaymentWithpaypal']);
// route for check status responce
Route::get('paypal', [
    'as' => 'status',
    'uses' => 'PaypalController@getPaymentStatus']);






Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


Route::get('/buscar', 'frontController@buscador');
Route::get('/buscar_truco', 'frontController@buscadorTruco');

Route::get('/noticia-salud/{slug}', 'frontController@truco');
Route::get('/noticias-de-salud/{slug}', 'frontController@trucos');
Route::get('/salud', 'frontController@ctruco');


Route::get('/tienda', 'frontController@tienda');

Route::get('/{categorira}', 'frontController@producto');
Route::get('/{producto}/', 'frontController@filtro_cempresa');