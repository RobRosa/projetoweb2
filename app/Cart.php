<?php

namespace projetoweb2;

use Session;

class Cart
{
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct() {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;

    	if ($oldCart) {
    		$this->items = $oldCart->items;
    		$this->totalQty = $oldCart->totalQty;
    		$this->totalPrice = $oldCart->totalPrice;
    	}

        session()->put('cart', $this);
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

    public function remove($id){
        if ($this->totalQty == 1) {
            session()->forget('cart');
        }
        elseif ($this->items[$id]['amount'] == 1) {
            $this->totalQty--;
            $this->totalPrice -= $this->items[$id]['item']->price;
            unset($this->items[$id]);
        }
        else {
            $this->items[$id]['amount']--;
            $this->items[$id]['price'] -= $this->items[$id]['item']->price;
            $this->totalQty--;
            $this->totalPrice -= $this->items[$id]['item']->price;
        }
    }

    public function removeProduct($id){
        $this->totalQty -= $this->items[$id]['amount'];
        $this->totalPrice -= $this->items[$id]['price'];
        unset($this->items[$id]);
        if (!$this->totalQty) {
            session()->forget('cart');
        }
    }
}
