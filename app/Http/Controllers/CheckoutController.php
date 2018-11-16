<?php

namespace projetoweb2\Http\Controllers;

use Illuminate\Http\Request;
use projetoweb2\Checkout;
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

    	$checkout = Checkout::find($id);

    	return view('checkout.index', ['total' => $total]);
    }

    public function validationCheckout(Request $request, $id) {
    	$request->validate([
    		'name'=>'required|string|max:30',
    		'card'=>'required|integer',
    		'expiration'=>'required|string|max:5'
    	]);

    	if ($checkout = Checkout::find($id)) {
	    	$checkout->name = $request->get('name');
	    	$checkout->card = $request->get('card');
	    	$checkout->expiration = $request->get('expiration');
	    	$checkout->save();
    	}
    	else {
    		Checkout::create($request->all());
    	}

    	return redirect()->route('product.index')->with('success', 'Compra efetuada com sucesso!');
    }
}
