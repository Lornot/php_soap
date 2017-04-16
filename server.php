<?php
    ini_set("soap.wsdl_cache_enabled", 0);
    class Server {

        public $conn;

        public static function authenticate($header_params){

            if($header_params -> username == 'Oleg' && $header_params -> password == 'root')
                return true;
            else
                throw new SoapFault('Wrong user/pass combination', 401);
            
        }

//        public function __construct(){
//            $this -> conn = is_null($this -> conn) ? self::connect() : $this -> conn;
//        }
//
//        public function connect(){
//            $dsm = 'mysql:dbname=testdb;host=localhost';
//            //return new PDO($dsm, 'user', '');
//        }

        public $students = [
            1 => 'Oleg',
            2 => 'Andriy',
            3 => 'Mariana',
            4 => 'Tarik',
            5 => 'Veronika',
            6 => 'Yuria'
        ];

        public function getStudentName($ids){

            $return_arr = [];
            
            foreach ($ids as $id) {
                if (array_key_exists($id, $this -> students))
                    $return_arr[] = $this -> students[$id];
            }

            return $return_arr;
        }
    }


//    $server = new Server();
//    $students = $server -> getStudentName([2,5]);
//    echo "<pre>";
//    print_r($students);
//    echo "</pre>";


    $params = ['uri' => 'phpsoap/server.php'];
    $server = new SoapServer(NULL, $params);
    $server -> setClass('Server');
    $server -> handle();
