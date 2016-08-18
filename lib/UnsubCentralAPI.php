<?php

namespace torchlighttechnology;

class UnsubCentralAPI
{
	protected $username;
	protected $password;
	protected $api_host = 'http://go.unsubcentral.com/api/service';

	public function __construct($username, $password)
	{
		$this->username = $username;
		$this->password = $password; 
	}

	public function emailAddressCheck($email, $aff_key, $aff_salt)
	{
		$endpoint = '/addresses/check';
		$payload = array(
			'email' => $email,
			'key' => $aff_key,
			's' => $aff_salt
		);

		return $this->api_request($endpoint, $payload)
	}

    protected function build_path($endpoint) {
        $path = sprintf('/%s', $endpoint);

        $path = sprintf('%s%s',
            $this->api_host,
            $path
        );

        return $path;
    }

	protected function api_request($endpoint, $payload)
	{
		$path = $this->build_path($endpoint);

		$http_headers = array(
			'Authorization: Basic '. base64_encode($username.':'.$password)
		);

		$ch = curl_init($path);
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $http_headers);
		curl_setopt($ch, CURLOPT_TIMEOUT, 5);

		$result = curl_exec($ch);
		$error = curl_error($ch);
		$errorno = curl_errno($ch);

		curl_close($ch);

		return $result;
	}
}