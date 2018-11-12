<?php

namespace projetoweb2\Http\Controllers;

use Illuminate\Http\Request;
use projetoweb2\Product;
use projetoweb2\Cart;
use Session;

class CheckoutController extends Controller
{
    public function getCheckout() {
    	if (!Session::has('cart')) {
    		return view('cart.myCart');
    	}
    	$oldCart = Session::get('cart');
    	$cart = new Cart($oldCart);
    	$total = $cart->totalPrice;
    	return view('checkout.index', ['total' => $total]);
    }
}
