<?php


namespace Onetech\Oauth2Zparcel\Provider;


use League\OAuth2\Client\Provider\AbstractProvider;
use League\OAuth2\Client\Provider\Exception\IdentityProviderException;
use League\OAuth2\Client\Provider\ResourceOwnerInterface;
use League\OAuth2\Client\Token\AccessToken;
use League\OAuth2\Client\Tool\BearerAuthorizationTrait;
use Psr\Http\Message\ResponseInterface;

class Zparcel extends AbstractProvider
{
    use BearerAuthorizationTrait;

    protected $appId;

    public function getBaseAuthorizationUrl()
    {
        return sprintf('https://ship.amazon.cn/freight-puma/spectrum/consent/%s', $this->appId);
    }

    public function getBaseAccessTokenUrl(array $params)
    {
        return 'https://api.amazon.cn/auth/O2/token';
    }

    public function getResourceOwnerDetailsUrl(AccessToken $token)
    {
        return '';
    }

    protected function getDefaultScopes()
    {
        return [];
    }

    protected function checkResponse(ResponseInterface $response, $data)
    {
        if (isset($data['error'])) {
            $statusCode = $response->getStatusCode();
            $error = $data['error'];
            $errorDescription = $data['error_description'];
            throw new IdentityProviderException(
                $statusCode . ' - ' . $errorDescription . ': ' . $error,
                $response->getStatusCode(),
                $response->getBody()->getContents()
            );
        }
    }

    protected function createResourceOwner(array $response, AccessToken $token)
    {
        // TODO: Implement createResourceOwner() method.
    }
}