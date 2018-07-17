Zerobounce PHP API wrapper
=====================

[ZeroBounce](https://www.zerobounce.net) PHP API

This is a PHP wrapper class example for the ZeroBounce API.

* TLS V1.2 is required -  This is available from PHP 5.5.19 and up.

#### Example usage:

The validation methods return objects on which you call get methods which return the relevant information. Please see the code for all getters and below for a sample:

```php
<?php
require_once("zerobounce.php");

$zba = new ZeroBounceAPI('YOUR_API_KEY');

//print the credit balance
print_r($zba->get_credits());

//instantiate a validation object following a call to /validate and print individual elements
$validation = $zba->validate('email@address.com');
echo $validation['address'];
echo $validation['status'];

//instantiate a validation object following a call to /validatewithip and print the whole object
print_r($zba->validatewithip('email@address.com', 'IP'));
```

#### Additional User Contributed Wrappers in PHP

NoMoreHours: (Laravel) https://github.com/CoupleCo/knowmore-zerobounce
