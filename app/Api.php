<?php

namespace App;

use GuzzleHttp\Client as GuzzleHttpClient;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7;

class Api{
    //
    public function getAllNews($data)
    {

        $channel = $data['channel'];
        $keyword = $data['keyword'];
        $qry="";
        if($keyword !=''){
            $qry="q=$keyword&";

        }
        $curlSession = curl_init();
        curl_setopt($curlSession, CURLOPT_URL, 'https://newsapi.org/v2/top-headlines?sources='.$channel.'&'.$qry.'apiKey=d6da863f882e4a1a89c5152bd3692fb6');
        curl_setopt($curlSession, CURLOPT_BINARYTRANSFER, true);
        curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);

        $jsonData = json_decode(curl_exec($curlSession));
        $jsonData =  $jsonData;
        curl_close($curlSession);
        return ($jsonData->articles);


    }

    public function getAllSources()
    {

        try {

            $client = new GuzzleHttpClient();

            $apiRequest = $client->request('GET', 'https://newsapi.org/v1/sources?apiKey=d6da863f882e4a1a89c5152bd3692fb6'
            );


            $content = json_decode($apiRequest->getBody()->getContents(), true);

            return $content['sources'];

        } catch (RequestException $e) {
            //For handling exception
            echo Psr7\str($e->getRequest());
            if ($e->hasResponse()) {
                echo Psr7\str($e->getResponse());
            }
        }
    }
}


