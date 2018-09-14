<?php


namespace BotDelive;

/**
 * BotDelive is a Push Notification and 2-factor authentication API service that works over the chat bots (Telegram and Messenger).
 *
 * @author Farid Babayev
 * @documentation https://botdelive.com/docs
 * @version 1.0
 */

class BotDelive
{
    /**
     * @var string
     */
    private $appId;

    /**
     * @var string
     */
    private $secretKey;

    public function __construct($appId,$secretKey)
    {
        $this->appId = $appId;
        $this->secretKey = $secretKey;
    }

    /**
     *  Verify the "Access Code"
     * @param null $accessCode
     * @return mixed
     * @throws BotDeliveException
     */
    public function verify($accessCode = null)
    {
        if (isset($accessCode) && !empty($accessCode))
        {
            return $this->_sendRequest(['accessCode' => $accessCode],Constants::VerifyUserUrl);
        }
        else
        {
            throw new BotDeliveException('Access Code must be required');
        }
    }

    /**
     *  Send 2-factor authentication request (long polling)
     * @param null $userId
     * @return mixed
     * @throws BotDeliveException
     */
    public function auth($userId = null)
    {
        if (isset($userId) && !empty($userId))
        {
            return $this->_sendRequest(['userId' => $userId],Constants::AuthenticateUrl);
        }
        else
        {
            throw  new BotDeliveException('User ID must be required');
        }
    }

    /**
     *  Send Push Notification request
     * @param null $userId
     * @param null $message
     * @return mixed
     * @throws BotDeliveException
     */
    public function push($userId = null ,$message = null)
    {
        if (isset($userId) && !empty($userId))
        {
            if (isset($message) && !empty($message))
            {
                $params = ['userId' => $userId, 'message' => $message];
                return $this->_sendRequest($params,Constants::PushNotificationUrl);
            }
            else
            {
                throw new BotDeliveException('Message must be required');
            }
        }
        else
        {
            throw new BotDeliveException('User ID must be required');
        }
    }

    /**
     *  Send GET request to BotDelive url with query string
     * @param null $params
     * @param $requestUrl
     * @return mixed
     * @throws BotDeliveException
     */
    private function _sendRequest($params = null,$requestUrl)
    {
        $params = (!is_array($params)) ? array() : $params;
        $params['appId'] = $this->appId;
        $params['secretKey'] = $this->secretKey;
        $params['platform'] = 'php';
        $query = http_build_query($params,'', '&');
        $url = $requestUrl. "?" . $query;
        if (extension_loaded('curl'))
        {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            $json = curl_exec($ch);
            curl_close($ch);
            $result = json_decode($json);
            return $result;
        }
        else
        {
            throw  new BotDeliveException('CURL-extension not loaded');
        }
    }
}