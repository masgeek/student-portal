<?php
/**
 *  [auth_cv_result] => M
[req_card_number] => xxxxxxxxxxxx1111
[req_locale] => en
[signature] => x4RrlvZoyHWD3DDVwLflJ+waG3wcksOX2m0KPHljcx4=
[req_card_type_selection_indicator] => 1
[auth_trans_ref_no] => 5381423541176564204002
[req_bill_to_surname] => Barasa
[req_bill_to_address_city] => Thika
[req_card_expiry_date] => 02-2019
[req_bill_to_phone] => 254713196504
[reason_code] => 100
[auth_amount] => 10.00
[auth_response] => 00
[bill_trans_ref_no] => 5381423541176564204002
[req_bill_to_forename] => Sammy
[req_payment_method] => card
[request_token] => Ahj//wSTI7pBBrI50EHiTSzVm4YtGTNq0YsW7Zq2aMmDRgwZJcJpqMqoClwmmoyqsoK+iBPhk0kyxdfA7eAMCcmR3SCDWRzoIPEAsUZf
[auth_time] => 2018-09-28T134554Z
[req_amount] => 10.00
[req_bill_to_email] => barsamms@gmail.com
[auth_avs_code_raw] => Y
[transaction_id] => 5381423541176564204002
[req_currency] => KES
[req_card_type] => 001
[decision] => ACCEPT
[message] => Request was processed successfully.
[signed_field_names] => transaction_id,decision,req_access_key,req_profile_id,req_transaction_uuid,req_transaction_type,req_reference_number,req_amount,req_currency,req_locale,req_payment_method,req_bill_to_company_name,req_bill_to_forename,req_bill_to_surname,req_bill_to_email,req_bill_to_phone,req_bill_to_address_line1,req_bill_to_address_city,req_bill_to_address_country,req_card_number,req_card_type,req_card_type_selection_indicator,req_card_expiry_date,message,reason_code,auth_avs_code,auth_avs_code_raw,auth_response,auth_amount,auth_code,auth_cv_result,auth_cv_result_raw,auth_trans_ref_no,auth_time,request_token,bill_trans_ref_no,signed_field_names,signed_date_time
[req_transaction_uuid] => 5bae304e49efe
[auth_avs_code] => Y
[auth_code] => 831000
[req_bill_to_company_name] => Tsobu Enterprise
[req_bill_to_address_country] => KE
[req_transaction_type] => sale
[req_access_key] => f9fc9a33baba35bd8066da9d5c45fde1
[auth_cv_result_raw] => M
[req_profile_id] => 066620B5-2B5D-49FD-88DC-C4CBA247122A
[req_reference_number] => P52/85958/2016
[signed_date_time] => 2018-09-28T13:45:54Z
[req_bill_to_address_line1] => PO Box 9 Thika
 */
// Map the above values to a database table
$root_dir = dirname(dirname(__FILE__));

require_once $root_dir . '/vendor/autoload.php';

$postData = $_POST;
// Tell log4php to use our configuration file.
Logger::configure($root_dir . '/config/config.xml'); //check logs folder for how the response look like

$callbackParams = serialize($postData);

// Fetch a logger, it will inherit settings from the root logger
$log = Logger::getLogger('myLogger');

// Start logging
$log->info($postData);
