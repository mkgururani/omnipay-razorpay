# Omnipay: Razorpay

[![Travis branch](https://travis-ci.org/razorpay/omnipay-razorpay.svg?branch=master)]()
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)
<!-- [![Packagist](https://img.shields.io/packagist/v/symfony/symfony.svg)]() -->

**Razorpay driver for the Omnipay PHP payment processing library**

[Omnipay](https://github.com/thephpleague/omnipay) is a framework agnostic, multi-gateway payment
processing library for PHP. This package implements Razorpay support for Omnipay.

To know more about Razorpay payment flow and steps involved, please read up here:
<https://docs.razorpay.com/docs>

## Requirements
`PHP >= 5.6.0`

## Installation

Omnipay is installed via [Composer](http://getcomposer.org/). To install, simply add it
to your `composer.json` file: Add following lines your composer.json

```json
"repositories" : [{
			"type" : "composer",
			"url" : "https://packagist.org"
		},
		{
			"type" : "git",
			"url" : "https://github.com/mkgururani/omnipay-razorpay",
			"reference": "master"
		}
	],
	"require-all": true,
	
	in composer.json file: 
	"require" : {
		"razorpay/omnipay-razorpay": "~1.0"
		}
```

And run composer to update your dependencies:

	$ composer update

## Basic Usage

The following code is required for razor-pay api communication:	
 $gateway->setKeyID($merchantkey);	
		    $gateway->setKeySecret($merchantSecret);	
		    if ($billing_address != null && sizeof($billingAddress) > 0) {	
		        $country = $billingAddress->country;	
		        $state = $billingAddress->state;	
		        $address = $billingAddress->address;	
		        $city = $billingAddress->city;	
		        $zip = $billingAddress->zip;	
		    } else {	
		        throw new ItemNotFoundException(true, null, 200, 'Billing details are mandatory.');	
		    }	
		    $cards = array('email' => $emailId, 'first_name' => $fname, 'last_name' => $lname, 'country' => $country,
		        'city' => $city, 'address' => $address, 'state'=> $state, 'zip' => $zip, 'address1' => $address, 'city1' => $city,
		        'country1' => $country, 'fname'=>$fname, 'lname'=> $lname, 'state1'=>$state, 'zip1' => $zip, 'phone_no' => $phoneNo);	
		    $gateway->setCard($cards);	
		    $token = 'TRN-'.str_random(10);	
		    $gateway->setTransactionId($token);		
		    $gateway->setReturnUrl(<YOUR-URL>);		
		    $gateway->setCancelUrl(<YOUR-URL>);		
		    $gateway->setTestMode(<MODE-OF-YOUR-PAYMENT>);		
	
For general usage instructions, please see the main [Omnipay](https://github.com/thephpleague/omnipay)
repository.


If you are having general issues with Omnipay, we suggest posting on
[Stack Overflow](http://stackoverflow.com/). Be sure to add the
[omnipay tag](http://stackoverflow.com/questions/tagged/omnipay) so it can be easily found.

If you want to keep up to date with release announcements, discuss ideas for the project,
or ask more detailed questions, there is also a [mailing list](https://groups.google.com/forum/#!forum/omnipay) which
you can subscribe to.

If you believe you have found a bug, please report it using the [GitHub issue tracker](https://github.com/razorpay/omnipay-razorpay),
or better yet, fork the library and submit a pull request.
