<h1 align="center"> oauth2-zparcel </h1>

<p align="center"> .</p>


## Installing

```shell
$ composer require onetech/oauth2-zparcel -vvv
```

## Usage

```
$provider = new \Onetech\Oauth2Zparcel\Provider\Zparcel([
    'appId' => 'your appId',
    'clientId' => 'your clientId',
    'clientSecret' => 'your clientSecret',
    'redirectUri' => 'your redirectUri'
]);
//生成授权url
echo $provider->getAuthorizationUrl([
        'state' => mt_rand(10000, 99999),
        'version' => 'draft'
    ]) . PHP_EOL;

//授权成功后，浏览器回跳地址中的参数spapi_oauth_code值
try {
    $oauth = $provider->getAccessToken('authorization_code', [
        'code' => $_GET['spapi_oauth_code']
    ]);
    var_dump($oauth->getToken());
    var_dump($oauth->getRefreshToken());
    var_dump($oauth->getExpires());

    //    $token = $provider->getAccessToken('refresh_token', [
    //        'refresh_token' => ''
    //    ]);
    //    echo $token;
} catch (\League\OAuth2\Client\Provider\Exception\IdentityProviderException $e) {
}
```

## Contributing

You can contribute in one of three ways:

1. File bug reports using the [issue tracker](https://github.com/onetech/oauth2-zparcel/issues).
2. Answer questions or fix bugs on the [issue tracker](https://github.com/onetech/oauth2-zparcel/issues).
3. Contribute new features or update the wiki.

_The code contribution process is not very formal. You just need to make sure that you follow the PSR-0, PSR-1, and PSR-2 coding guidelines. Any new code contributions must be accompanied by unit tests where applicable._

## License

MIT