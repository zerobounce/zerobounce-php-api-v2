Zerobounce PHP API wrapper v2
=====================

[ZeroBounce](https://www.zerobounce.net) PHP API v2

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
$validation = $zba->validate('email@address.com, 'IP');
echo $validation['address'];
echo $validation['status'];

```

#### Additional User Contributed Wrappers in PHP

NoMoreHours: (Laravel) https://github.com/CoupleCo/knowmore-zerobounce


**Properties and possible values returned by:**
1. <b><i>ValidateEmail</b></i> method
  
|<b>Property</b>|<b>Possible Values</b> 
|:--- |:--- 
address  | The email address you are validating. 
status | valid /invalid /catch-all /unknown /spamtrap /abuse /do_not_mail 
sub_status  |antispam_system /greylisted /mail_server_temporary_error /forcible_disconnect /mail_server_did_not_respond /timeout_exceeded /failed_smtp_connection /mailbox_quota_exceeded /exception_occurred /possible_traps /role_based /global_suppression /mailbox_not_found /no_dns_entries /failed_syntax_check /possible_typo /unroutable_ip_address /leading_period_removed /does_not_accept_mail /role_based_catch_all /disposable /toxic
account | The portion of the email address before the "@" symbol.
domain | The portion of the email address after the "@" symbol.
did_you_mean | Suggestive Fix for an email typo or [null]
domain_age_days | Age of the email domain in days or [null].
free_email | [true/false] If the email comes from a free provider.
mx_found | [true/false] Does the domain have an MX record.
mx_record | The preferred MX record of the domain or [null]
smtp_provider | The SMTP Provider of the email or [null] (BETA).
firstname | The first name of the owner of the email when available or [null].
lastname  |The last name of the owner of the email when available or [null].
gender |The gender of the owner of the email when available or [null].
country |The country the email signed up when ip address is provided or [null].
region |The region the email signed up when ip address is provided or [null].
city |The city the email signed up when ip address is provided or [null].
zipcode |The zipcode the email signed up when ip address is provided or [null].
processed_at |The UTC time the email was validated.

2. <b><i>GetCredit</b></i> method
  
|<b>Property</b>|<b>Possible Values</b> 
|:--- |:--- 
credits  | The number of credits left in account for email validation.

**Any of the following email addresses can be used for testing the API, no credits are charged for these test email addresses:**
+ disposable@example.com
+ invalid@example.com
+ valid@example.com
+ toxic@example.com
+ donotmail@example.com
+ spamtrap@example.com
+ abuse@example.com
+ unknown@example.com
+ catch_all@example.com
+ antispam_system@example.com
+ does_not_accept_mail@example.com
+ exception_occurred@example.com
+ failed_smtp_connection@example.com
+ failed_syntax_check@example.com
+ forcible_disconnect@example.com
+ global_suppression@example.com
+ greylisted@example.com
+ leading_period_removed@example.com
+ mail_server_did_not_respond@example.com
+ mail_server_temporary_error@example.com
+ mailbox_quota_exceeded@example.com
+ mailbox_not_found@example.com
+ no_dns_entries@example.com
+ possible_trap@example.com
+ possible_typo@example.com
+ role_based@example.com
+ timeout_exceeded@example.com
+ unroutable_ip_address@example.com
+ free_email@example.com

**You can this IP to test the GEO Location in the API.**

+ 99.110.204.1
