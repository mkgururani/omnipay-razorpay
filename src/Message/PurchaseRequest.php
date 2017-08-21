<?php

namespace Omnipay\Razorpay\Message;

use \Omnipay\Common\Message\AbstractRequest;


/**
 * Razorpay Complete Purchase Request - Auto Capture on by default. For Off-Site payment.
 */
class PurchaseRequest extends AbstractRequest
{
	public function getData()
	{
        if (!empty($this->getCard()))
        {
            $card = $this->getCard();
            $billing_address = null;
            if (isset($card['address1'])){
                $billing_address = $card['address1'];
            }
            $billing_city = null;
            if (isset($card['city1'])){
                $billing_city = $card['city1'];
            }
            $billing_country = null;
            if (isset($card['country1'])){
                $billing_country = $card['country1'];
            }
            $billing_fname = null;
            if (isset($card['fname'])){
                $billing_fname = $card['fname'];
            }
            $billing_lname = null;
            if (isset($card['lname'])){
                $billing_lname = $card['lname'];
            }
            $billing_state = null;
            if (isset($card['state1'])){
                $billing_state = $card['state1'];
            }
            $billing_zip = null;
            if (isset($card['zip1'])){
                $billing_zip = $card['zip1'];
            }
            $billing_country = null;
            if (isset($card['country1'])){
                $billing_country = $card['country1'];
            }
            
            $cust_address = null;
            if (isset($card['address'])){
                $cust_address = $card['address'];
            }
            $cust_zip = null;
            if (isset($card['zip'])){
                $cust_zip = $card['zip'];
            }
            $cust_phone_no = null;
            if (isset($card['phone_no'])){
                $cust_phone_no = $card['phone_no'];
            }
            $hmacKey = $this->getKeySecret();

            $data = array(
                    'x_account_id'                   => $this->getKeyID(),
                    'x_amount'                       => $this->getAmount(), // in paise
                    'x_currency'                     => $this->getCurrency(),
                    'x_customer_email'               => $card['email'],
                    'x_customer_phone'               => $cust_phone_no,
                    'x_customer_first_name'          => $card['first_name'],
                    'x_customer_last_name'           => $card['last_name'],
                    'x_customer_billing_country'     => $card['country'],
                    'x_customer_billing_city'        => $card['city'],
                    'x_customer_billing_address'     => $cust_address,
                    'x_customer_billing_state'       => $card['state'],
                    'x_customer_billing_zip'         => $cust_zip,
                    'x_customer_shipping_address1'   => $billing_address,
                    'x_customer_shipping_city'       => $billing_city,
                    'x_customer_shipping_country'    => $billing_country,
                    'x_customer_shipping_first_name' => $billing_fname,
                    'x_customer_shipping_last_name'  => $billing_lname,
                    'x_customer_shipping_state'      => $billing_state,
                    'x_customer_shipping_zip'        => $billing_zip,
                    'x_description'                  => $this->getDescription(),
                    'x_invoice'                      => '#' . $this->getTransactionId(),
                    'x_reference'                    => $this->getTransactionId(),
                    'x_shop_country'                 => $billing_country,
                    'x_signature'                    => '',
                    'x_test'                         => $this->getTestMode(), 
                    'x_url_callback'                 => $this->getReturnUrl(),
                    'x_url_cancel'                   => $this->getCancelUrl(),
                    'x_url_complete'                 => $this->getReturnUrl()
                );
            $razorpaySignature = new Signature($hmacKey);
            $signature = $razorpaySignature->getSignature($data);
            $data['x_signature'] = $signature;
            return $data;
        }

        // Default case
        return $this->getParameters();
	}

	// To send the data for our
    public function sendData($data)
    {
        return $this->createResponse($data);
    }

    protected function createResponse($data)
    {
        return $this->response = new PurchaseResponse($this, $data);
    }

    public function getKeyID()
    {
        return $this->getParameter('key_id');
    }
    //getCard

    public function setKeyID($value)
    {
        return $this->setParameter('key_id', $value);
    }

    public function getKeySecret()
    {
        return $this->getParameter('key_secret');
    }

    public function setKeySecret($value)
    {
        return $this->setParameter('key_secret', $value);
    }
    
    public function getCard()
    {
        return $this->getParameter('card');
    }
    
    public function setCard($value)
    {
        return $this->setParameter('card', $value);
    }
    //getTransactionId
    public function getTransactionId()
    {
        return $this->getParameter('transaction_id');
    }
    
    public function setTransactionId($value)
    {
        return $this->setParameter('transaction_id', $value);
    }
    //getReturnUrl
    public function getReturnUrl()
    {
        return $this->getParameter('return_url');
    }
    
    public function setReturnUrl($value)
    {
        return $this->setParameter('return_url', $value);
    }
    //getCancelUrl
    public function getCancelUrl()
    {
        return $this->getParameter('cancel_url');
    }
    
    public function setCancelUrl($value)
    {
        return $this->setParameter('cancel_url', $value);
    }
}
