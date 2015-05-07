<?php

class MY_Cart extends CI_Cart {

    public function __construct($params = array()) {
        parent::__construct($params);
        $this->product_name_rules = '\d\D';
    }

}