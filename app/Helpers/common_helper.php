<?php

if ( ! function_exists('calc_fees'))
{
    function calc_fees($amount, $fees, $type = "") {
        return $type=="PERCENT"? (float)$amount*$fees/100 : ($fees);
    }
}

if (!function_exists('supported_resolutions'))
{
    function supported_resolutions() {
        return [1, 5, 15, 60, '4H', 'D', 'W'];
    }
}

if (!function_exists('coinMarketCap'))
{
    function coinMarketCap() {

/**
 * Requires curl enabled in php.ini
 **/

        $url = 'https://sandbox-api.coinmarketcap.com/v1/cryptocurrency/listings/latest';
        $parameters = [
            'start' => '1',
            'limit' => '5000',
            'convert' => 'USD'
        ];

        $headers = [
            'Accepts: application/json',
            'X-CMC_PRO_API_KEY: b54bcf4d-1bca-4e8e-9a24-22ff2c3d462c'
        ];
        $qs = http_build_query($parameters); // query string encode the parameters
        $request = "{$url}?{$qs}"; // create the request URL


        $curl = curl_init(); // Get cURL resource
        // Set cURL options
        curl_setopt_array($curl, array(
            CURLOPT_URL => $request,            // set the request URL
            CURLOPT_HTTPHEADER => $headers,     // set the headers
            CURLOPT_RETURNTRANSFER => 1         // ask for raw response instead of bool
        ));

        $response = curl_exec($curl); // Send the request, save the response
        $return = json_decode($response); // print json decoded response
        curl_close($curl); // Close request
        return $return;
    }
}