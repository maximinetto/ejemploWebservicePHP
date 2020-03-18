<?php


    
    final class AudioVisualConverter{
        private $idVideo;
        private static $client;
        private $url;
        private $apikey;
        private $response;

        public function __construct(string $idVideo, $apikey)
        {
            $this->idVideo = $idVideo;
            $this->url = "http://www.omdbapi.com/";
            $this->apikey = $apikey;
            self::$client = new GuzzleHttp\Client();
        
        }

        public function __invoke()
        {
            $response = self::$client->get($this->url, [
                'query' => ['i' => $this->idVideo, 'apikey' => $this->apikey]
            ]);
            $json_response = json_decode($response->getBody(), true);        
            $this->response = $json_response;
            $tipo = $json_response['Type'];
            $audiovisual = self::getClase($tipo);
            return $audiovisual;
        }

        private function getClase($tipo){
            if($tipo == "movie")
                return new Film($this->response);
            else if($tipo == "series")
                return new Serie($this->response);

            return new Episode($this->response);   
        }
    }