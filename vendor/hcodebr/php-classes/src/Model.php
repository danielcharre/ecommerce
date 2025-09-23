<?php 

    namespace Hcode;

    class Model {


        private $values = [];

        public function __call($name, $args) {

            $method = substr($name, 0, 3);
            $filed_name = substr($name, 3, strlen($name));

            #var_dump($method, $filed_name);
            #exit;


            switch ($method) {
                case 'get':
                    return $this->values[$filed_name];
                break;
                
                case 'set':
                    $this->values[$filed_name] = $args[0];
                break;
                
                
            }
        }


        public function setData($data = array()) {
            foreach ($data as $key => $value) {
                $this->{"set".$key}($value);
            }
        }

        public function getValues() {
            return $this->values;
        }

    }
?>