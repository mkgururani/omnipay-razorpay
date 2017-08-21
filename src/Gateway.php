<?php

namespace Omnipay\Razorpay;

use Omnipay\Common\AbstractGateway;

/**
 * Razorpay Payment Gateway
 */
class Gateway extends AbstractGateway
{
    // Gateway name
    public function getName()
    {
        return 'Razorpay';
    }

    public function getDefaultParameters()
    {
        return array(
            'key_id' => '',
            'key_secret' => ''
        );
    }

    public function getKeyID()
    {
        return $this->getParameter('key_id');
    }

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
    
    /**
     * Creating the Purchase Request
     */
    public function purchase(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Razorpay\Message\PurchaseRequest', $parameters);
    }

    /**
     * Verifying the Purchase Request
     */
    public function completePurchase(array $parameters = array())
    {
        $parameters['key_secret'] = $this->getKeySecret();
        return $this->createRequest('\Omnipay\Razorpay\Message\CompletePurchaseRequest', $parameters);
    }
}
