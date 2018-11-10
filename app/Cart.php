<?php

namespace projetoweb2;

class Cart
{
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($oldCart) {
    	if ($oldCart) {
    		$this->items = $oldCart->items;
    		$this->totalQty = $oldCart->totalQty;
    		$this->totalPrice = $oldCart->totalPrice;
    	}
    }

    public function add($item, $id) {
    	$cookiesItem = ['amount' => 0, 'price' => $item->price, 'item' => $item];
    	if ($this->items) {
    		if (array_key_exists($id, $this->items)) {
    			$cookiesItem = $this->items[$id];
    		}
    	}
    	$cookiesItem['amount']++;
    	$cookiesItem['price'] = $item->price * $cookiesItem['amount'];
    	$this->items[$id] = $cookiesItem;
    	$this->totalQty++;
    	$this->totalPrice += $item->price;
    }
}
