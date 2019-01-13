<?php

class WalletAPI
{
    public function Request($method = 'GET', $url, $header = false, $data = false)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_USERAGENT, 'okhttp/3.8.0');
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        if ($header) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        }
        if ($data) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        }

        return curl_exec($ch);
    }

    public function GetToken($user, $pass, $type = 'email')
    {
        $url = 'https://mobile-api-gateway.truemoney.com/mobile-api-gateway/api/v1/signin';
        $header = array('Host: mobile-api-gateway.truemoney.com', 'Content-Type: application/json');
        $data = array('username' => $user, 'password' => sha1($user.$pass), 'type' => $type);

        return @json_decode($this->Request('POST', $url, $header, json_encode($data)), true)['data']['accessToken'];
    }

    public function Logout($token)
    {
        $url = "https://mobile-api-gateway.truemoney.com/mobile-api-gateway/api/v1/signout/{$token}";
        $header = array('Host: mobile-api-gateway.truemoney.com');

        return @json_decode($this->Request('GET', $url, $header, false), true);
    }

    public function GetCurrentBalance($token)
    {
        $url = "https://mobile-api-gateway.truemoney.com/mobile-api-gateway/api/v1/profile/balance/{$token}";
        $header = array('Host: mobile-api-gateway.truemoney.com');

        return @json_decode($this->Request('GET', $url, $header, false), true)['data'];
    }

    public function GetProfile($token)
    {
        $url = "https://mobile-api-gateway.truemoney.com/mobile-api-gateway/api/v1/profile/{$token}";
        $header = array('Host: mobile-api-gateway.truemoney.com');

        return @json_decode($this->Request('GET', $url, $header, false), true)['data'];
    }

    public function FetchActivities($token, $start, $end, $limit = 25)
    {
        $url = "https://mobile-api-gateway.truemoney.com/mobile-api-gateway/api/v1/profile/transactions/history/{$token}/?startDate={$start}&endDate={$end}&limit={$limit}";
        $header = array('Host: mobile-api-gateway.truemoney.com');

        return @json_decode($this->Request('GET', $url, $header, false), true)['data']['activities'];
    }

    public function FetchTxDetail($token, $id)
    {
        $url = "https://mobile-api-gateway.truemoney.com/mobile-api-gateway/api/v1/profile/activities/{$id}/detail/{$token}";
        $header = array('Host: mobile-api-gateway.truemoney.com');

        return @json_decode($this->Request('GET', $url, $header, false), true)['data'];
    }

    public function CashcardTopup($token, $cashcard)
    {
        $time = time();
        $url = "https://mobile-api-gateway.truemoney.com/mobile-api-gateway/api/v1/topup/mobile/{$time}/{$token}/cashcard/{$cashcard}";
        $header = array('Host: mobile-api-gateway.truemoney.com');

        return $this->Request('POST', $url, $header, true);
    }

    public function CashcardBuyRequest($token, $mobile, $amount)
    {
        $url = "https://mobile-api-gateway.truemoney.com/mobile-api-gateway/api/v1/buy/e-pin/draft/verifyAndCreate/{$token}";
        $data = array('recipientMobileNumber' => $mobile, 'amount' => $amount);
        $header = array('Host: mobile-api-gateway.truemoney.com', 'Content-Type: application/json');

        return @json_decode($this->Request('POST', $url, $header, $data), true);
    }

    public function CashcardBuyComfirm($token, $draft, $mobile, $otpString, $otpRefCode)
    {
        $url = "https://mobile-api-gateway.truemoney.com/mobile-api-gateway/api/v1/buy/e-pin/confirm/{$draft}/{$token}";
        $data = array('mobileNumber' => $mobile, 'otpString' => $otpString, 'otpRefCode' => $otpRefCode, 'timestamp' => time());
        $header = array('Host: mobile-api-gateway.truemoney.com', 'Content-Type: application/json');

        return @json_decode($this->Request('PUT', $url, $header, $data), true);
    }
}
