<?php

namespace App;

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
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\FundingInstrument;
use PayPal\Api\CreditCard;
use PayPal\Api\ShippingAddress;
use PayPal\Api\Address;

class paypal_tres
{

    private $_apiContext;
    private $_query;
    private $_pay;
    private $shoping_cart;
    private $_ClientId='AR57Z8McfHk8M9wu3T7KBidwPxZ94aTk2gV_G28q1UDs921bF1accr2-TqcKdH9xflky4F59FJvd66mL';
    private $_ClientSecret='EDkePabSwiHJCtIunJ68gPCv1lMOJTbJa-jU5PBwxOhGlhDEi96NARdGC28O3kK8KvXHkdAul5cl-aGs';

    public function __construct($shoping_cart, $pay, $query)
    {
        $this->_apiContext = \Paypalpayment::ApiContext($this->_ClientId,$this->_ClientSecret);
        $config= config('paypal_payment');
        $flatConfig = array_dot($config);
        $this->_apiContext->setConfig($flatConfig);
        $this->shoping_cart=$shoping_cart;
        $this->_pay=$pay;
        $this->_query=$query;

    }

    public function billing_address()
    {



        $billing_address = new Address();
        $billing_address->setLine1($this->_pay['setLine1']);
        $billing_address->setCity($this->_pay['setCity']);
        $billing_address->setState($this->_pay['setState']);
        $billing_address->setPostalCode($this->_pay['setPostalCode']);
        $billing_address->setCountryCode($this->_pay['setCountryCode']);
        return $billing_address;
    }

    public function card()
    {
        $card = new CreditCard();
        $card->setType('visa')
        ->setNumber($this->_query->creditCardNumber)
        ->setExpireMonth($this->_query->mont)
        ->setExpireYear($this->_query->year)
        ->setCvv2($this->_query->cvv2Number)
        ->setFirstName($this->_query->first_name)
        ->setLastName($this->_query->last_name)
        ->setBillingAddress($this->billing_address());


        return $card;
    }

    public function funding(){
        $fi = new FundingInstrument();
        $fi->setCreditCard($this->card());
        return $fi;    }

    public function generate2()
    {
        $payment = new Payment();
        $payment->setIntent("sale")
        ->setPayer($this->payer())
        ->setTransactions(array($this->transaction()));

        try{
            $payment->create($this->_apiContext);
        } catch(\Exception $ex){
            dd($ex);
            exit(1);
        }
        return $payment ;
    }
    public function payer()
    {   $payer = new Payer();

        $payer->setPaymentMethod("credit_card")
            ->setFundingInstruments(array($this->funding()));

        return $payer;   }

    public function shippingAddress()
    {
        $shippingAddress = new ShippingAddress();
        $shippingAddress->setCity($this->_pay['city']);
        $shippingAddress->setCountryCode($this->_pay['country']);
        $shippingAddress->setDefaultAddress(false);
        $shippingAddress->setPreferredAddress(false);
        $shippingAddress->setLine1($this->_pay['address1']);
        $shippingAddress->setLine2($this->_pay['address2']);
        $shippingAddress->setPostalCode($this->_pay['zip']);
        $shippingAddress->setState($this->_pay['state']);
        $shippingAddress->setRecipientName($this->_pay['firstName']);
        $shippingAddress->setPhone($this->_pay['phone']);
          return   $shippingAddress;
    }
    public function transaction()
    {    return \Paypalpayment::Transaction()
        ->setAmount($this->amount())
        ->setItemList($this->itemList())
        ->setDescription("Compra en pheroflame")
        ->setInvoiceNumber(uniqid());
}

    public function amount()
    {
      return \Paypalpayment::Amount()
       ->setCurrency("USD")
            ->setTotal($this->_pay['total_tax_shipping'])
            ->setDetails($this->details());
    }
    public function details()
    {

        $details = new Details();
        $details->setShipping($this->_pay['shipping'])
            ->setTax($this->_pay['tax'])
            ->setSubtotal($this->_pay['subtotal']);
        return $details; }

    public function itemList()
    {
        $posicion = 0;
        foreach($this->shoping_cart as $producto):
                      $item[$posicion] = \Paypalpayment::Item()
                ->setName($producto->nombre)
                ->setDescription($producto->nombre)
                ->setCurrency('USD')
                ->setQuantity($producto->cantidad)
                ->setTax($producto->tax)
                ->setPrice($producto->precio);;
            $posicion++;
            endforeach;



        return\Paypalpayment::ItemList()
        	->setItems($item)
            ->setShippingAddress($this->shippingAddress());
         }


}