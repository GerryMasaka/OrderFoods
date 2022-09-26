<?php
require_once('/path/to/MailchimpTransactional/vendor/autoload.php');

function run(){
 try {
    $mailchimp = new MailchimpTransactional\ApiClient();
    $mailchimp->setApiKey('1d4d8ef0e1005fcfb60ea47728b331f3-us1');
    $response = $mailchimp->users->ping();
    print_r($response);
  } catch (Error $e) {
        echo 'Error: ',  $e->getMessage(), "\n";
  }
}
run();