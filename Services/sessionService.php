<?php

namespace app\Services;

class sessionService {

    private $data = [];

    public function MARCHEBORDEL(){

        return 'toto';

    }
    public function __construct(){
        $this->data = $_SESSION;
    }

    public function __get($name){
        if(isset($this->data[$name])){
            return unserialize($this->data[$name]);
        }
    }

    public function __set($name, $value){
        $this->data[$name] = $value;
        $_SESSION = $this->data;

    }

    public function __isset($name) {
        return isset($this->data[$name]);
    }

    public function __unset($name) {
        unset($this->data[$name]);
    }

    public function __destruct(){

        $_SESSION = $this->data;

    }
}

