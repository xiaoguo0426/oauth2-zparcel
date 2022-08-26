<?php

require 'vendor/autoload.php';

$provider = new \Onetech\Oauth2Zparcel\Provider\Zparcel([
    'app_id' => '12312323',
    'client_id' => '',
    'client_secret' => '',
    'redirectUri' => 'https://www.baidu.com'
]);

echo $provider->getAuthorizationUrl([
    'state' => '233333',
    'version' => 'draft'
]);

echo $provider->getState();


//try {
//    $token = $provider->getAccessToken('authorization_code', [
//        'code' => $_GET['code']
//    ]);
//    echo $token;
//
//    $token = $provider->getAccessToken('refresh_token', [
//        'refresh_token' => ''
//    ]);
//    echo $token;
//} catch (\League\OAuth2\Client\Provider\Exception\IdentityProviderException $e) {
//}