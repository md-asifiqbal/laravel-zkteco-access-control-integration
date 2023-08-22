<?php

namespace Asif160627\ZktecoAccessControl\Traits;

use Illuminate\Support\Facades\Http;

trait Connection
{
    protected $token, $headers;

    public function __construct()
    {
        $this->headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'JWT ' . $this->getToken(),
        ];
    }
    public function getConfig($key = null)
    {
        if ($key) {
            return config('access_control.' . $key);
        }

        return config('access_control');
    }

    public function getUsername()
    {
        return $this->getConfig('username');
    }

    public function getPassword()
    {
        return $this->getConfig('password');
    }

    public function setToken($token)
    {
        session()->put('access_control_token', $token);
        $this->token = $token;
    }

    public function getToken()
    {
        if (!session()->has('access_control_token')) {
            $this->setToken($this->getTokenFromApi());
        } else {
            $this->token = session()->get('access_control_token');
        }

        return $this->token;
    }

    public function getTokenFromApi()
    {
        $url = $this->getConfig('url') . '/jwt-api-token-auth/';
        $username = $this->getUsername();
        $password = $this->getPassword();
        $data = [
            'username' => $username,
            'password' => $password,
        ];
        try {
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ])->post($url, $data)->json();
            return $response['token'] ?? null;
        } catch (\Exception $e) {
            throw $e->getMessage();
        }
    }
}
