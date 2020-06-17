<?php
class Produto {
    private $data = array();
    
    public function __get($prop){
        return $this->data[$prop];
    }

    public function __set($prop, $value){
        $this->data[$prop] = $value;
    }

    public function getData(){
        return $this->data;
    }
}
