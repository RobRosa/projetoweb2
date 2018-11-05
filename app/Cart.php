<?php

namespace projetoweb2;

class Cart
{
    public $items 	= null;
    public $tQty 	= 0;
    public $tPrice 	= 0;

    public function __construct($oldCart) {
    	if ($oldCart) {
    		$this->items 	= $oldCart->items;
    		$this->tQty 	= $oldCart->tQty;
    		$this->tPrice 	= $oldCart->tPrice;
    	}
    }

    public function add($item, $id) {
    	$cookiesItem = ['qty' => 0, 'price' => $item->price, 'item' => $item];
    	if ($this->items) {
    		if (array_key_exists($id, $this->items)) {
    			$cookiesItem = $this->item[$id];
    		}
    	}
    	$cookiesItem['qty']++;
    	$cookiesItem['price'] = $item->price * $cookiesItem['qty'];
    	$this->item[$id] = $cookiesItem;
    	$this->tQty++;
    	$this->tPrice += $item->price;
    }
}
