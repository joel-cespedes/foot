<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use App\pago;
use App\dato;
use Illuminate\Http\Request;
use PayPal\Api\FlowConfig;
use PayPal\Api\InputFields;
use PayPal\Api\Presentation;
use PayPal\Api\WebProfile;
use Validator;
use URL;
use Session;
use Redirect;


use App\pedidos;
use App\dpedidos;

/** All Paypal Details class **/
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;

class PaypalController extends HomeController
{
    private $_api_context;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        /** setup PayPal api context **/
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));
        $this->_api_context->setConfig($paypal_conf['settings']);
    }

    /**
     * Show the application paywith paypalpage.
     *
     * @return \Illuminate\Http\Response
     */
    public function payWithPaypal()
    {
        return view('paywithpaypal');
    }

    /**
     * Store a details of payment with paypal.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postPaymentWithpaypal(Request $request)
    {
        
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $todos = [];
        foreach(Session::get('cart') as $produc):
                $pror = new Item();

                $pror->setName($produc->nombre) /** item name **/
                ->setCurrency('USD')
                    ->setQuantity($produc->cantidad)
                    ->setPrice($produc->precio/dato::find(1)->tasa);
                    array_push($todos,$pror);
            endforeach;



        $item_list = new ItemList();
        $item_list->setItems($todos);




        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal($this->total());

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Your transaction description');

        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::route('status')) /** Specify return URL **/
        ->setCancelUrl(URL::route('status'));

        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
//            ->setExperienceProfileId($this->profid());
        /** dd($payment->create($this->_api_context));exit; **/
        try {
            $payment->create($this->_api_context);
        } catch (\PayPal\Exception\PPConnectionException $ex) {
            if (\Config::get('app.debug')) {
                \Session::put('error','Connection timeout');
                return Redirect::route('paywithpaypal');
                /** echo "Exception: " . $ex->getMessage() . PHP_EOL; **/
                /** $err_data = json_decode($ex->getData(), true); **/
                /** exit; **/
            } else {
                \Session::put('error','Some error occur, sorry for inconvenient');
                return Redirect::route('paywithpaypal');
                /** die('Some error occur, sorry for inconvenient'); **/
            }
        }

        foreach($payment->getLinks() as $link) {
            if($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }


        /** add payment ID to session **/
        Session::put('paypal_payment_id', $payment->getId());

        if(isset($redirect_url)) {
            /** redirect to paypal **/
            return Redirect::away($redirect_url);
        }

        \Session::put('error','Unknown error occurred');
        return Redirect::route('paywithpaypal');
    }

    public function getPaymentStatus(Request $query)
    {
        /** Get the payment ID before session clear **/
        $payment_id = Session::get('paypal_payment_id');
        /** clear the session payment ID **/
        Session::forget('paypal_payment_id');

        if (empty($query->PayerID) || empty($query->token)) {
            \Session::put('error','Payment failed');
            return Redirect::route('paywithpaypal');
        }
        $payment = Payment::get($payment_id, $this->_api_context);
        /** PaymentExecution object includes information necessary **/
        /** to execute a PayPal account payment. **/
        /** The payer_id is added to the request query parameters **/
        /** when the user is redirected from paypal back to your site **/
        $execution = new PaymentExecution();
        $execution->setPayerId($query->PayerID);
        /**Execute the payment **/
        $result = $payment->execute($execution, $this->_api_context);
        /** dd($result);exit; /** DEBUG RESULT, remove it later **/
        if ($result->getState() == 'approved') {

            /** it's all right **/
            /** Here Write your database logic like that insert record or value in database if you want **/


         
            $pedido = new pedidos;
            $pedido->nombre =$query->nombre ;
            $pedido->email =$query->email ;
            $pedido->total =$this->total();
            $pedido->save();

            foreach (Session::get('cart') as $producto){
                $this->detalle_pedido($producto,$pedido->id);
            }
            $pago = new pago;
            $pago->tipo= 'Paypal' ;
            $pago->pedido_id= $pedido->id;
            $pago->email=$result->payer->payer_info->email;
            $pago->first_name=  $result->payer->payer_info->first_name;
            $pago->last_name= $result->payer->payer_info->last_name;
            $pago->payer_id=  $result->payer->payer_info->payer_id;
            $pago->country_code=$result->payer->payer_info->country_code;
            $pago->total= $result->transactions[0]->amount->total;
            $pago->merchant_id= $result->transactions[0]->payee->merchant_id;
            $pago->email_original=  $result->transactions[0]->payee->email;
            $pago->payment_mode= $result->transactions[0]->related_resources[0]->payment_mode;
            $pago->recipient_name= $result->payer->payer_info->shipping_address->recipient_name;
            $pago->line1= $result->payer->payer_info->shipping_address->line1;
            $pago->city= $result->payer->payer_info->shipping_address->city;
            $pago->state=  $result->payer->payer_info->shipping_address->state;
            $pago->postal_code=  $result->payer->payer_info->shipping_address->postal_code;
            $pago->description=   $result->payer->payer_info->shipping_address->country_code;
            $pago->save();



            \Session::put('success','El págo se hizo correctamente');
            $datos = dato::find(1);
            return view('gracias',compact('pedido','datos'));
        }
        \Session::put('error','El pago ha fallado');

        return Redirect::route('paywithpaypal');
    }

    public function profid(){

        $flow = new FlowConfig();
        $flow->setLandingPageType('Billing');
        $presentation = new Presentation();
        $presentation->setLogoImage('https://facilfood.cl/admin/images/logo_paypal.png')
            ->setBrandName('Facil Food')
            ->setLocaleCode('GB');
        $inputFields = new InputFields();
        $inputFields->setNoShipping(1)
            ->setAddressOverride(0);
        $webProfile =  new WebProfile();
        $webProfile->setName('FacilFood' . uniqid())
            ->setFlowConfig($flow)
            ->setPresentation($presentation)
            ->setInputFields($inputFields);
        try {
            $createProfileResponse = $webProfile->create($this->_api_context);
        } catch (\PayPal\Exception\PayPalConnectionException $ex) {
            dd($ex);
        }
        return $profileId = $createProfileResponse->getId();
    }


    protected function detalle_pedido ($producto, $pdi_id)
    {
        $critem =  new dpedidos;
        $critem->nombre = $producto->nombre;
        $critem->cantidad = $producto->cantidad;
        $critem->precio_unidad = $producto->precio;
        $critem->precio = $producto->precio*$producto->cantidad;
        $critem->pedido_id =$pdi_id;
        $critem->save();

    }

    public function total(){
        $total = 0;
        $cart = \Session::get('cart');
        foreach($cart as $ca){
            $total += ($ca->precio * $ca->cantidad);
        }
        return $total/dato::find(1)->tasa;
    }

}