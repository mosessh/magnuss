<?php
/**
 * Splynx API v.1.0 demo script
 * Author: Ruslan Malymon (Top Net Media s.r.o.)
 * https://splynx.com/wiki/index.php/API - documentation
 */

include 'SplynxApi.php';

$api_url = 'http://splynx/'; // please set your Splynx URL

$key = "3d052b922dc2f44d1d03d957ff5691ba"; // please set your key
$secret = "4d944c2d4d55bd78a1af0f6b8d5958af"; // please set your secret

// don't forget to add permissions to API Key, for changing locations.

$api = new SplynxAPI($api_url, $key, $secret);

$locationsApiUrl = "admin/administration/locations";

print "<pre>";

print "List locations\n";
$result = $api->api_call_get($locationsApiUrl);
print "Result: ";
if ($result) {
    print "Ok!\n";
    print_r($api->response);
} else {
    print "Fail! Error code: $api->response_code\n";
    print_r($api->response);
}
print "\n-------------------------------------------------\n";

print "Create location\n";
$result = $api->api_call_post($locationsApiUrl,
    array(
        'name' => 'API test #' . rand()
    ));

print "Result: ";
if ($result) {
    print "Ok!\n";
    print_r($api->response);
    $locationId = $api->response['id'];
} else {
    print "Fail! Error code: $api->response_code\n";
    print_r($api->response);
    $locationId = false;
}
print "\n-------------------------------------------------\n";

if ($locationId) {

    print "Retrieve location " . $locationId . "\n";
    $result = $api->api_call_get($locationsApiUrl, $locationId);
    print "Result: ";
    if ($result) {
        print "Ok!\n";
        print_r($api->response);
    } else {
        print "Fail! Error code: $api->response_code\n";
        print_r($api->response);
    }
    print "\n-------------------------------------------------\n";


    print "Change created location name\n";
    $result = $api->api_call_put($locationsApiUrl, $locationId, array('name' => 'NAME CHANGED #' . mt_rand()));
    print "Result: ";
    if ($result) {
        print "Ok!\n";
        print_r($api->response);
    } else {
        print "Fail! Error code: $api->response_code\n";
        print_r($api->response);
    }
    print "\n-------------------------------------------------\n";

    print "Retrieve updated info\n";
    $result = $api->api_call_get($locationsApiUrl, $locationId);
    print "Result: ";
    if ($result) {
        print "Ok!\n";
        print_r($api->response);
    } else {
        print "Fail! Error code: $api->response_code\n";
        print_r($api->response);
    }
    print "\n-------------------------------------------------\n";

    print "Delete created location\n";
    $result = $api->api_call_delete($locationsApiUrl, $locationId);
    print "Result: ";
    if ($result) {
        print "Ok!\n";
        print_r($api->response);
    } else {
        print "Fail! Error code: $api->response_code\n";
        print_r($api->response);
    }
    print "\n-------------------------------------------------\n";

}