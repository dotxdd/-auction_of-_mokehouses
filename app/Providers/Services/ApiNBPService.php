<?php

namespace App\Providers\Services;
use GuzzleHttp\Client;

class ApiNBPService
{
    public static function getEuroPln(){

        $client = new Client();

        $response = $client->request('GET', 'http://api.nbp.pl/api/exchangerates/rates/a/eur/');
        $exchangeRate = json_decode($response->getBody()->getContents(), true)['rates'][0]['mid'];

       return $exchangeRate;
    }
    public static function getPlnUsd(){
        $client = new Client();

        $response = $client->request('GET', 'http://api.nbp.pl/api/exchangerates/rates/a/USD/');
        $exchangeRate = json_decode($response->getBody()->getContents(), true)['rates'][0]['mid'];
        return $exchangeRate;
    }

}
