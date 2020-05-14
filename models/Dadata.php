<?php

namespace app\models;
use yii\base\Model;
use Yii;

class Dadata extends Model {
    private $base_url = "https://suggestions.dadata.ru/suggestions/api/4_1/rs/findById/party";
    private $token;
    private $handle;

    public function __construct($token) {
        $this->token = $token;
    }

    public function init() {
        $this->handle = curl_init();
        curl_setopt($this->handle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($this->handle, CURLOPT_HTTPHEADER, array(
            "Content-Type: application/json",
            "Accept: application/json",
            "Authorization: Token ".$this->token
        ));
        curl_setopt($this->handle, CURLOPT_POST, 1);
    }


    public function getData($inn) {
        $url = $this->base_url;
        $fields = array(
          "query" => $inn
        );
        return $this->executeRequest($url, $fields);
    }

    public function close() {
        curl_close($this->handle);
    }

    private function executeRequest($url, $fields) {
        curl_setopt($this->handle, CURLOPT_URL, $url);
        curl_setopt($this->handle, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($this->handle);
        //$result = json_decode($result, true);
        return $result;
    }
}
