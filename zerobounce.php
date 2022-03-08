<?php
class ZeroBounceAPI {
  private $key;
  private $baseURL = "https://api.zerobounce.net/v2/";
  function __construct($key){
    $this->key = $key;
  }
  /**
  *  this function is used for authentication and http api calls
  */
  private function api_call($method, array $params){
    $params['api_key'] = $this->key;
    $paramsURI = http_build_query($params);
    $url = "{$this->baseURL}{$method}?{$paramsURI}";
    if(!isset($this->ch)){
      $this->ch = curl_init();
      curl_setopt($this->ch, CURLOPT_SSLVERSION, 6);
      curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($this->ch, CURLOPT_CONNECTTIMEOUT, 15);
      curl_setopt($this->ch, CURLOPT_TIMEOUT, 150);
    }
    curl_setopt($this->ch, CURLOPT_URL, $url);
    $response = curl_exec($this->ch);
    $responseJSON = json_decode($response, true);
    if(json_last_error() !== JSON_ERROR_NONE){
      throw new \Exception("Invalid Response", 1);
    }
    if(isset($response['error'])){
      throw new \Exception($response['error'], 2);
    }
    return $responseJSON;
  }
  /**
  * wrapper for api_call/getcredits
  */
  public function get_credits(){
    return $this->api_call("getcredits",[]);
  }

  /**
  *  wrapper for api_call/validate
  */
  public function validate($email, $ip){
    return $this->api_call("validate",["email" => $email, "ip_address" => $ip]);
  }
}
