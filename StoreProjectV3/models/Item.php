<?php

class Item {

    private $sku;
    private $name;
    private $quantity;
    private $price;

    public function __construct($sku, $name, $quantity, $price) {
        $this->sku = $sku;
        $this->name = $name;
        $this->set_quantity($quantity);
        $this->set_price($price);
    }

    public function get_sku() {
        return $this->sku;
    }

    public function get_name() {
        return $this->name;
    }

    public function get_quantity() {
        return $this->quantity;
    }

    public function get_price() {
        return $this->price;
    }

    public function set_quantity($quantity): void {
        if ($quantity > 0) {
            $this->quantity = $quantity;
        } else {
            $this->quantity = 0;
        }
    }

    public function set_price($price): void {
        if ($price > 0) {
            $this->price = $price;
        } else {
            $this->price = 0;
        }
    }

}
