<?php
    ini_set("soap.wsdl_cache_enabled", 0);
    class Client {

        public function __construct(){
            $params = [
                'location' => 'http://phpsoap/server.php',
                'uri' => 'urn://phpsoap/server.php',
                'trace' => 1,
                'cache_wsdl' => WSDL_CACHE_NONE
            ];
            $this -> instance = new SoapClient(NULL, $params);

            // set the header
            $auth_params = new stdClass();
            $auth_params -> username = 'Olesadg';
            $auth_params -> password = 'root';

            $header_params = new SoapVar($auth_params, SOAP_ENC_OBJECT);
            $header = new SoapHeader('phpsoap', 'authenticate', $header_params, false);

            $this -> instance -> __setSoapHeaders([$header]);
        }

        public function getName($ids){

            return $this -> instance -> __soapCall('getStudentName', [$ids]);

        }
    }

    $client = new Client;