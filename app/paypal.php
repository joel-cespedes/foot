<?php

namespace App;

use Anouar\Paypalpayment\PaypalPayment;
use PayPal\Api\Payee;


use PayPal\Api\Payment;
use PayPal\Api\Payer;
use PayPal\Api\PaymentExecution;
use PayPal\Api\amount;
use PayPal\Api\transaction;
use PayPal\Api\redirectUrls;
use PayPal\Api\itemList;
use PayPal\Api\FlowConfig;
use PayPal\Api\Presentation;
use PayPal\Api\InputFields;
use PayPal\Api\WebProfile;


class paypal
{

    private $_apiContext;
    private $shoping_cart;
    private $_ClientId='Ad1dsNYEVA-pdEfv2S8dnJYc-velnFyZi2xzMGBwLedz2cijGqPc4OZduVXINtmSlfXpe69Z6iSaWk2Q';
    private $_ClientSecret='ED3YWTNtkrj_tWCiUipNflIniDqvt5UpejEhrsUbIYFa6XoWS1dSLem__b8oEJDiUrUS_QlUxQuIihkR';

    public function __construct($shoping_cart)
    {
        $this->_apiContext = \Paypalpayment::ApiContext($this->_ClientId,$this->_ClientSecret);
        $config= config('paypal_payment');
        $flatConfig = array_dot($config);
        $this->_apiContext->setConfig($flatConfig);

        $this->shoping_cart=$shoping_cart;
    }
    public function generate(){

        $payment = new payment;
        $payment->setIntent('sale');
        $payment->setPayer($this->payer()) ;
        $payment->setTransactions([$this->transaction()]);
        $payment->setRedirectUrls($this->redirectURLs());

        try{
            $payment->create($this->_apiContext);
        } catch(\Exception $ex){
            dd($ex);
            exit(1);
        }
        return $payment;
    }
    public function generate2(){
        $payment = \Paypalpayment::payment;
        $payment->setIntent('sale');
        $payment->setPayer($this->payer());
        $payment->setTransactions([$this->transaction()]);
        $payment->setRedirectUrls($this->redirectURLs());
//           $payment->setExperienceProfileId($this->profid());
        try{
            $payment->create($this->_apiContext);
        } catch(\Exception $ex){
            dd($ex);
            exit(1);
        }
        return $payment;
    }

    public function payer(){
        $payer = \Paypalpayment::payer();
        $payer->setPaymentMethod('paypal');
        return  $payer;
    }
    public function transaction(){
        $transaction = \Paypalpayment::transaction();
        $transaction->setAmount($this->amount());
        $transaction->setItemList($this->items());
        $transaction->setDescription("Your purchase in pheroflame.com");
        $transaction->setInvoiceNumber(uniqid());

        return $transaction;
    }
    public function items(){
        $items = [];
        foreach($this->shoping_cart as $produc):
            array_push($items,$produc->paypalItem());
        endforeach;

        $todos_items = \Paypalpayment::itemList();
        $todos_items->setItems($items);
        return  $todos_items;
    }

    public function amount(){
        $total = 0;
        foreach ($this->shoping_cart as $c) {
            $total += ($c->precio * $c->cantidad);
        }
        $cantidad = \Paypalpayment::amount();
        $cantidad->setCurrency('USD');
        $cantidad->setTotal($total);
        return  $cantidad;

    }
    public function redirectURLs(){
        $baseURL = url('/');
        $url =\Paypalpayment::redirectUrls();
        $url->setReturnUrl("$baseURL/payments/store/");
        $url->setCancelUrl("$baseURL/cart-carro");
        return  $url;
    }

    public function execute($paymentId,$PayerID){

        $payment =\Paypalpayment::getById($paymentId,$this->_apiContext);

        $execution = new PaymentExecution;
        $execution->setPayerId($PayerID);
        return $payment->execute($execution,$this->_apiContext);
    }

    public function profid(){

        $flow = \Paypalpayment::FlowConfig();
        $flow->setLandingPageType('Billing');
        $presentation = \Paypalpayment::Presentation();
        $presentation->setLogoImage('http://pheroflame.com/img/pheroflames-main.png')
            ->setBrandName('pheroflames')
            ->setLocaleCode('GB');
        $inputFields = \Paypalpayment::InputFields();
        $inputFields->setNoShipping(1)
            ->setAddressOverride(0);
        $webProfile =  \Paypalpayment::WebProfile();
        $webProfile->setName('joel' . uniqid())
            ->setFlowConfig($flow)
            ->setPresentation($presentation)
            ->setInputFields($inputFields);
        try {
            $createProfileResponse = $webProfile->create($this->_apiContext);
        } catch (\PayPal\Exception\PayPalConnectionException $ex) {
            die($ex);
        }
        return $profileId = $createProfileResponse->getId();
    }

}